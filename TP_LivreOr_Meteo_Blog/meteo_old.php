<?php
$curl = curl_init('https://api.openweathermap.org/data/2.5/weather?q=Paris&appid=41c935ead9356a3c9346370423096c14&units=metric&lang=fr');
// activer un certificat ssl
// 1. desactivation totale de la verif
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// 2. verification avec un certif importé
// curl_setopt($curl,CURLOPT_CAINFO, __DIR__ . DIRECTORY_SEPARATOR . 'cert.cer.crt');
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// 2.2 mettre plusieurs parrametres curl_setopt
curl_setopt_array($curl,
[
    CURLOPT_CAINFO => __DIR__ . DIRECTORY_SEPARATOR . 'cert.cer.crt',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 1,
]);

$data = curl_exec($curl);
if($data === false){
    var_dump(curl_error($curl));
}else{
    if(curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200){
        $data = json_decode($data,true);
        echo 'Il fait ' . $data['main']['temp'] . ' degrés celsius';
    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    }
    
}
curl_close($curl);