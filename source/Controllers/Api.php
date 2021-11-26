<?php

    namespace Source\Controllers;

    require __DIR__ . '/../../vendor/autoload.php';
    use Psr\Http\Message\RequestInterface;
    use Psr\Http\Message\ResponseInterface;

    final class Api
    {
        public function login(RequestInterface $request, 
        ResponseInterface $response): ResponseInterface
        {
            $data = $request->getParsedBody();

            if($data['email'] == "admin@email.com" && $data['senha'] == "12345")
                return $response->withJson(["message" => "Success", "user" => $user])->withStatus(200);
        
            return $response->withJson(["message" => "Email ou senha inválido"])->withStatus(200);
        }

        public function products(RequestInterface $request, 
        ResponseInterface $response): ResponseInterface
        {
            return $response->withJson([
                "data" => PRODUCTS,
            ])->withStatus(200);
        }
    }
