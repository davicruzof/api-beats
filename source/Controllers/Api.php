<?php

    namespace Source\Controllers;

    require __DIR__ . '/../../vendor/autoload.php';
    use Psr\Http\Message\RequestInterface;
    use Psr\Http\Message\ResponseInterface;

    final class Api extends DataLayer
    {
        public function login(RequestInterface $request, 
        ResponseInterface $response): ResponseInterface
        {
            $data = $request->getParsedBody();

            if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL))
                return $response->withJson(["message" => "Email inválido, tente com outro!"])->withStatus(200);

            $list_users = USERS;

            foreach ($list_users as $user)
            {
                if($data['email'] == $user->email && $data['senha'] == $user->senha)
                    return $response->withJson(["message" => "Success", "user" => $user])->withStatus(200);
            }

            return $response->withJson(["message" => "Email ou senha inválido"])->withStatus(200);
        }

        public function products(ResponseInterface $response): ResponseInterface
        {
            return $response->withJson([
                "data" => PRODUCTS,
            ])->withStatus(200);
        }
    }