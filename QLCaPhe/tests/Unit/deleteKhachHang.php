<?php

$client = new http\Client;
$request = new http\Client\Request;

$body = new http\Message\Body;

$request->setRequestUrl('http://quanlicaphe.test/khachang/delete?id=?');
$request->setRequestMethod('DELETE');
$request->setBody($body);

$request->setHeaders(array(
    'cache-control' => 'no-cache',
    'Connection' => 'keep-alive',
    'Content-Length' => '523',
    'Cookie' => 'XSRF-TOKEN=eyJpdiI6ImJza3NKRmpUZnh5TVhCQU9TZXJlT0E9PSIsInZhbHVlIjoibms5NlwvN3grOXVZRmhWWWdCbHNkTDVBXC9WbmhGVCtkNVk3RUQzcFlwbk5PK0ZSc1F6czR3YWlLOGowNUpnZVdMIiwibWFjIjoiMzA5YjcwMWY1MjZhOTExNDQ5ODIxMWZhYzkwNWRhYmMxODcwNzQ1Mzk3NTA3OTRhOTQwYWMzOThmYTFjODdhNSJ9; laravel_session=eyJpdiI6IjlYZEFSMDMycVVXXC81NkFLMlB3MmRBPT0iLCJ2YWx1ZSI6InhWdndpaEdQWDNyOTVlWTZTVEtZZ2RwaVErMGJCaERaVEhsd09qVWsyam02UFMrSjJEc1RITmhuMGVvUnVCSmMiLCJtYWMiOiI1Mjc3NjUyNDM1MWRjMzNlMzY3YTQ2ODU0Mzc0Nzc4NjllMWJhZDViYWM5MmM2NDM3NDNlMTNlMzA2NGQ0YjUwIn0%3D',
    'Accept-Encoding' => 'gzip, deflate',
    'Content-Type' => 'multipart/form-data; boundary=--------------------------938615894888801573573568',
    'Host' => 'quanlicaphe.test',
    'Cache-Control' => 'no-cache',
    'Accept' => '*/*',
    'User-Agent' => 'PostmanRuntime/7.20.1'
));

$client->enqueue($request)->send();
$response = $client->getResponse();

echo $response->getBody();

