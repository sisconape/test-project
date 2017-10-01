<?php
$access_token = 'oJmfE8Hb44GBIXwxzd+tjJFiuNhO4Wiz0hsE6BFpt+uoQtuE9B6wCsHyp4Kb39mXV2G7Qh/kTvjLQe62yC71sDDWMxdAHghNB7QdM1vuX6/2VVji+Y5tI8tVlmYOhx6OiVhK1O+99ce4mttQPdxumQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, $url); 
      // SSL USE 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
