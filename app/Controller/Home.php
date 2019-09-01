<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Controller\ControllerBase;

class Home extends ControllerBase
{
    public function index(ServerRequestInterface $request, ResponseInterface $response, $routeArguments)
    {
        // 出力
        return $response->write($this->render('index.twig', []));
    }
}
