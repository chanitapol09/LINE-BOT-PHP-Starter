<?php
$access_token = '1OZId+sFxEGTDwVCcggP4aC+02i2aEsD3K0cVwHM8T1jzPz7IHgwuDPSTgePqcn0OyiWvIVCRsWWPIqhpni3EvOhTfFIUGb7m0JYVDOXtl94+VR+AlAsKXzsMQ0emuumJ+4g4V4Mp6qCi+RAYY+E0AdB04t89/1O/w1cDnyilFU='

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: 1498244502 ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
