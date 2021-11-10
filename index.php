<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;

require 'vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath('/Interface');

// Routing: Melyik végpont melyik végpontra menjen...
$app->get('/', function (ServerRequestInterface $request,
    ResponseInterface $response) {

        $response->getBody()->write('Hello world!');

        return $response;

    });

$app->get('/maidatum', function (ServerRequestInterface $request,
        ResponseInterface $response) {

            $datum = new DateTime();
            $response->getBody()->write($datum->format('Y-m-d'));

            return $response;
            
        });

$app->get('/lista', function (ServerRequestInterface $request,
        ResponseInterface $response) {

            $response->getBody()->write('
            
            <html>
            <body>
            <ul>
            <li>Elso</li>
            <li>Masodik</li>
            </ul>
            </body>
            </html>
            
            ');

            return $response;
            
        });

        // / után keretrendszerek elérése, ezek a végpontok/enpoints
$app->get('/api/lista', function (ServerRequestInterface $request,
        ResponseInterface $response) {

            $user = ['User1', 'User2'];
            $userJson = json_encode($user);
            $response->getBody()->write($userJson);

            return $response->withHeader('Content-Type', 'application/json');
            
        });

$app->get('/api/lista/{id}', function (ServerRequestInterface $request,
        ResponseInterface $response, array $args) {

            $userId = $args['id'];
            // userId validálás: szám-e...
            $userek = ['User1', 'User2', 'User3'];
            $user = $userek[$userId];
            $userJson = json_encode(['user' => $user]);

            $response->getBody()->write($userJson);
            return $response->withHeader('Content-Type', 'application/json');
            
        });

$app->run();