<?php

use GuzzleHttp\Client;
require 'vendor/autoload.php';
require 'config.php';

$client = new Client([
    'base_uri' => 'https://api.kakaobrain.com/v1/inference/kogpt/generation',
    'timeout'  => 30.0,
]);

$response = $client->request('POST', '', [
    'headers' => [
        'Authorization' => 'KakaoAK ' . API_KEY,
        'Content-Type' => 'application/json',
    ],
    'json' => [
        'prompt' => '오늘은 날씨가 맑습니다.',
        'max_tokens' => 500,
        'temperature' => 0.1,
        'top_p' => 0.1,
        'n' => 1
    ]
]);

echo $response->getBody();