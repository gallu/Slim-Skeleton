<?php

namespace App\Middleware;

/**
 * エラーで「管理画面」「Web管理画面」「front」毎にエラーを出すためのラッパー
 */

class CsrfGuard extends \SlimLittleTools\Middleware\CsrfGuard
{
    /**
     */
    public function setRendererName($s)
    {
        $this->renderer = $s;
        return $this;
    }

    /**
     */
    public function getRendererName()
    {
        return $this->renderer;
    }


//
    private $renderer;
}
