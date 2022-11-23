<?php
namespace App;
use \DateTime;

use App\Exceptions\CurlException;
use App\Exceptions\HTTPException;
use App\Exceptions\UnauthorizedHTTPException;



class OpenWeather{
    private $apiKey;
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getToday(string $city): ?array
    {
        // try {
        $data = $this->callAPI("weather?q={$city}");
        // } catch(Exception $e){
        //     return [
        //         'temp' => 0,
        //         'description' => 'Météo indisponible',
        //         'date' => new DateTime()
        //     ];
        // } 

            return [
                'temp' => $data['main']['temp'],
                'description' => $data['weather'][0]['description'],
                'date' => new \DateTime()
            ];
        
    }

    public function getForecast(string $city): ?array
    {
        // try {
            $data = $this->callAPI("forecast/daily?q={$city}");
        // } catch(Exception $e){
        //     die($e->getMessage());
        //     return [];
        // }
        foreach($data['list'] as $day) {
            $results[] =[
                'temp' => $day['temp']['day'],
                'description' => $day['weather'][0]['description'],
                'date' => new \DateTime('@' . $day['dt'])
            ];
        }
        return $results;
    }
    private function callAPI(string $endpoint): ?array
    {

        $curl = curl_init("https://api.openweathermap.org/data/2.5/{$endpoint}&APPID={$this->apiKey}&units=metric&lang=fr");
        curl_setopt_array($curl,[
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CAINFO => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'cert.cer.crt',
            // CURLOPT_TIMEOUT_MS=> 10,
            CURLOPT_TIMEOUT=> 1,

        ]);
        $data = curl_exec($curl);
        if($data === false){
            
            throw new CurlException($curl);
        }
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if( $code !== 200) {
            curl_close($curl);
            if($code === 401){
                json_decode($data);
                throw new UnauthorizedHTTPException($data['message'], 401);
            }
            throw new HTTPException($data,$code);
        }
        curl_close($curl);
        return json_decode($data, true);
    }
}