<?php
namespace app\notification;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PushNotification{

    public function notify(Request $request, Response $response, $args){
        $requestBody = $request->getBody();
        $requestBody = json_decode($requestBody);

        if(!isset($requestBody->token) || !isset($requestBody->title) || !isset($requestBody->message)){
            $response->getBody()->write(json_encode([
                "status" => false,
                "data"=> "title, message, token, são campos obrigatórios!"
            ]), 400);
            
            return $response;
        }

       try{
            $channelName = isset($requestBody->channelName) ?? 'example';
            $recipient= $requestBody->token;

            $expo = \ExponentPhpSDK\Expo::normalSetup();

            $expo->subscribe($channelName, $recipient);

            $notification = ['body' => $requestBody->message, 'title'=> $requestBody->title];

            $expo->notify([$channelName], $notification);

            $response->getBody()->write(json_encode([
                "status" => true,
                "data"=> "Menssagem enviada com sucesso!"
            ]));
            
            return $response;
        }catch(Exception $e){
            $response->getBody()->write(json_encode([
                "status" => true,
                "data"=> $e->getMessage()
            ]));
            
            return $response;
        }

    }
}

?>