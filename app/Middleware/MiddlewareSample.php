<?php
//
namespace App\Middleware;

//
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Middleware\MiddlewareBase;

//
class MiddlewareSample extends MiddlewareBase
{
    /*
     */
    //
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        // コンテナの取得(何かに使うとき用)
        //$this->container

        // 前処理
        // XXX

        // 呼び出し
        $response = $next($request, $response);

        // 後処理
        // XXX

        //
        return $response;
    }

//
    protected $container;
}
