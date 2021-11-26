<?php

    require __DIR__ . '/vendor/autoload.php';

    use Source\Controllers\User;
    use Psr\Http\Message\ResponseInterface;

    $app = new \Slim\App([
        'settings' => [
            'displayErrorDetails' => true,
        ],
    ]);

    $app->group('/auth', function () use ($app){
        $app->post('/login', User::class . ":login");
    });

    $app->group('/products', function () use ($app) {
        $app->get('/list', function (ResponseInterface $response){
            return $response->withJson([
                "data" => ["12",1],
            ])->withStatus(200);
        });
    });

    $app->run();