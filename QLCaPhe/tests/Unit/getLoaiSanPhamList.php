<?php

$client = new http\Client;
$request = new http\Client\Request;

$request->setRequestUrl('http://quanlicaphe.test/loaisanpham/list');
$request->setRequestMethod('GET');
$request->setHeaders(array(
    'cache-control' => 'no-cache',
    'Connection' => 'keep-alive',
    'Cookie' => 'XSRF-TOKEN=eyJpdiI6IkxoTlB6U25qYjJadHk2dFpXOFhuUFE9PSIsInZhbHVlIjoiUEpcL2toeEROSUU1dHhlTVVQVm9La25DNVhJSDVzZ2Y3U3hwR0NNNmVpQ1ZkbVdEZVlLMlwvSHp3TmJvSkp2QkhpIiwibWFjIjoiMjNhZWVmNzIwNjliNTc2ODBjM2FjOTdlNjM1Y2Y2MmU2MGNmYzg2Y2E4NjQyMjMzNGY5YWVjODhlOWQ1N2ZmOCJ9; laravel_session=eyJpdiI6InNvYmV4R0dXYW01ZzdORndDK1lOXC9nPT0iLCJ2YWx1ZSI6IjJETUJcL3ZHNEJkY3pUNE5WTjErcDcxb0R6cmxBbzFqaXVSU2VvU0FydVprMWpoc0g1U3NhV0FPMVlzUDd5Mm9rIiwibWFjIjoiNjA5YTdjNjAwYTVmYTY1NWJkNmNhZGVkZThlM2M5ZGVkZGQyNzA3ZjQ4OGFlNWI5YzA0MGJkZjBiMmE0YzYyZSJ9',
    'Accept-Encoding' => 'gzip, deflate',
    'Host' => 'quanlicaphe.test',
    'Cache-Control' => 'no-cache',
    'Accept' => '*/*',
    'User-Agent' => 'PostmanRuntime/7.20.1'
));

$client->enqueue($request)->send();
$response = $client->getResponse();

echo $response->getBody();
