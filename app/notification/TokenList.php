<?php

namespace app\notification;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class TokenList {

    private $tokens = [];

    public function __construct() {
        
    }

    public function listTokens(Request $request, Response $response, $args) {
        
        $response->getBody()->write(json_encode([
            "status" => true,
            "data" => $this->tokens,
        ]));

        return $response;
    }
}

?>