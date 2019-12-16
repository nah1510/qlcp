<?php

$client = new http\Client;
$request = new http\Client\Request;

$request->setRequestUrl('http://quanlicaphe.test/khachhang/list');
$request->setRequestMethod('GET');
$request->setHeaders(array(
    'cache-control' => 'no-cache',
    'Connection' => 'keep-alive',
    'Cookie' => 'XSRF-TOKEN=eyJpdiI6IjZnOXN5bEMzQWJWNUZ3MzNyc3Q3UVE9PSIsInZhbHVlIjoiRXhSVFZaNFZWMlpBUFwvUlRYSlNUMHZCQjZIbDJcL2NSMmc1eG5YalhyN0szRGlLNlgwV0ZwQWJcL2JWSmRnOVVkZyIsIm1hYyI6ImU3Yjg0NjZkNzZkZGE3ODkyMjAzYmEyYzBmNjVhZWQ4NTdjYjMyMDNjYTg3YmE5NDBiNThkYzY3N2RmZmQ1N2UifQ%3D%3D; laravel_session=eyJpdiI6InBoSk9Wb3I1U1Jlb09sMjh2S1FNd3c9PSIsInZhbHVlIjoiSkUrWGdIaldZcWxUQllWanFZV2doZEIzTlU1NG9oTjhGclRjWmNtWmpVQWFNclgzTEVTbzExODVzWjZNZlpxYSIsIm1hYyI6ImUzZWE2NGNiNTAxMTA1OWI2ZDJmZmRlNmNkODNlZWMzNmFjYjIwY2JmOGMyNTg1YzEzMGYyOTIwZGI4ZDM0YTAifQ%3D%3D',
    'Accept-Encoding' => 'gzip, deflate',
    'Host' => 'quanlicaphe.test',
    'Postman-Token' => '51360e24-1cb2-44c5-a31c-f77f1fa12dd3,f354f1de-c1fa-4abd-91c0-a729c64f5f66',
    'Cache-Control' => 'no-cache',
    'Accept' => '*/*',
    'User-Agent' => 'PostmanRuntime/7.20.1'
));

$client->enqueue($request)->send();
$response = $client->getResponse();

echo $response->getBody();
