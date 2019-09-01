<?php
namespace App\Middleware;

class MiddlewareBase
{
    /*
     */
    public function __construct($container)
    {
        // コンテナインスタンスの受け取り
        $this->container = $container;
    }

//
    protected $container;
}
