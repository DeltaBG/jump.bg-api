<?php

$curl_url = 'https://api.jump.bg/api.php';

$curl_post = [
	'api_userid' => 'username',
	'api_password' => 'password',
	'type' => 'domain',
	'action' => 'register',
	'domain' => 'example.com',
	'reg_period' => 1,
];

$curl = curl_init();
curl_setopt_array($curl, [
	CURLOPT_URL => $curl_url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => $curl_post,
]);

$response = curl_exec($curl);
curl_close($curl);

var_dump($response); //It will return the result in JSON