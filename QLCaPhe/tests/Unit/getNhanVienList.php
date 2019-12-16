<?php

$client = new http\Client;
$request = new http\Client\Request;

$request->setRequestUrl('http://quanlicaphe.test/nhanvien/list');
$request->setRequestMethod('GET');
$request->setHeaders(array(
    'cache-control' => 'no-cache',
    'Connection' => 'keep-alive',
    'Cookie' => 'XSRF-TOKEN=',
    'Accept-Encoding' => 'gzip, deflate',
    'Host' => 'quanlicaphe.test',
    'Cache-Control' => 'no-cache',
    'Accept' => '*/*',
    'User-Agent' => 'PostmanRuntime/7.20.1'
));

$client->enqueue($request)->send();
$response = $client->getResponse();

echo $response->getBody();
