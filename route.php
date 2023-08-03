<?php 


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;
use Psr\Http\Server\RequestHandlerInterface;

$app = AppFactory::create();

/* $app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
}); */

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
    $response->getBody()->write('EXPO NOTIFICATION BY RED-EVELOPER');
    return $response;
});

/* $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->notFoundHandler; 
    return $handler($req, $res);
}); */

$app->post("/notify", "app\Notification:notify");

$app->run();


?>