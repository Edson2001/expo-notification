<?php
namespace app\notification;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RegisterToken{

    public function registerToken(Request $request, Response $response, $args){
        $requestBody = $request->getBody();
        $requestBody = json_decode($requestBody);

        if (!isset($requestBody->token)) {
            $response->getBody()->write(json_encode([
                "status" => false,
                "data" => "Token de notificação não fornecido."
            ]), 400);
            
            return $response;
        }


        $response->getBody()->write(json_encode([
            "status" => true,
            "data" => "Token de notificação registrado com sucesso."
        ]));
        
        return $response;
    }
}

?>