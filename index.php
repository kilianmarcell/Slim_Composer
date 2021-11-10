<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;

require 'vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath('/Interface');

$app->get('/', function (ServerRequestInterface $request,
    ResponseInterface $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

$app->run();