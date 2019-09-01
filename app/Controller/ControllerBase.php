<?php

namespace App\Controller;

class ControllerBase
{
    /*
     */
    public function __construct($container)
    {
        // コンテナインスタンスの受け取り
        $this->container = $container;
    }
    
    // テンプレート用インスタンスの取得とrenderの発行
    protected function render($name, array $context = array())
    {
        // デフォで使う値を追加する
        $context['hoge'] = 'hoge'; // サンプル

        return $this->container->get('renderer')->render($name, $context);
    }

//
    protected $container;
}
