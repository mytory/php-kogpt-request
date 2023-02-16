<?php

use GuzzleHttp\Client;
require 'vendor/autoload.php';
require 'config.php';

if ($argc != 6) {
    echo "usage) php {$argv[0]} {prompt} {max_tokens} {temperature} {top_p} {n}\n";
    echo "ex) php {$argv[0]} '오늘은 날씨가 맑습니다' 200 0.1 0.1 1\n";
    exit;
}

$prompt = (string) $argv[1];
$max_tokens = (int) $argv[2];
$temperature = (float) $argv[3];
$top_p = (float) $argv[4];
$n = (int) $argv[5];

$client = new Client([
    'base_uri' => 'https://api.kakaobrain.com/v1/inference/kogpt/generation',
    'timeout'  => 60.0,
]);

$response = $client->request('POST', '', [
    'headers' => [
        'Authorization' => 'KakaoAK ' . API_KEY,
        'Content-Type' => 'application/json',
    ],
    'json' => [
        'prompt' => $prompt,
        'max_tokens' => $max_tokens,
        'temperature' => $temperature,
        'top_p' => $top_p,
        'n' => $n,
    ]
]);

echo $response->getBody();