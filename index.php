<?php

    require __DIR__ . '/vendor/autoload.php';

    use Source\Controllers\Api;

    $app = new \Slim\App([
        'settings' => [
            'displayErrorDetails' => true,
        ],
    ]);

    $app->group('/api', function () use ($app){
        $app->post('/login', Api::class . ":login");
        $app->post('/products', Api::class . ":products");
    });

    $app->run();