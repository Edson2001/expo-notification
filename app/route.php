<?php 


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;
use Psr\Http\Server\RequestHandlerInterface;

$app = AppFactory::create();


$app->add(function (Request $request, RequestHandlerInterface $handler) {
    $response = $handler->handle($request);
    $response = $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response;
});

$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('EXPO NOTIFICATION SERVER NOTIFICATION');
    return $response;
});

$app->post("/notify", "app\\notification\PushNotification:notify");
$app->post("/registerToken", "app\\notification\RegisterToken:registerToken");
$app->get("/tokens", "app\\notification\TokenList:listTokens");

$app->run();


?>