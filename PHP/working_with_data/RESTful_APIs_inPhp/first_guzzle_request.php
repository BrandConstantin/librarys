<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request(
        'GET', 'http://jsonplaceholder.typicode.com/posts/1'
);

var_dump($response);
echo $response->getBody();
echo $response->getStatusCode();