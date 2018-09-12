<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

// 1 forma de hacerlo
//$response = $client->request(
//        'GET', 'http://jsonplaceholder.typicode.com/posts?userId=1'
//);

// 2 forma de hacerlo
//$response = $client->request(
//        'GET', 'http://jsonplaceholder.typicode.com/posts',
//        [
//            'query' => 'userId=1'
//        ]
//);

//3 forma de hacerlo (y la mejor forma)
$response = $client->request(
        'GET', 'http://jsonplaceholder.typicode.com/posts',
        [
            'query' => [
                'userId' => 1
            ]
        ]
);

var_dump($response);
echo $response->getBody();
echo $response->getStatusCode();
