<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

// 基準になるディレクトリ(最後の / はない形式で)
define('BASEPATH', realpath(__DIR__ . '/..'));

// オートローダ
require(BASEPATH . '/vendor/autoload.php');

// 初期処理(testでも同じ手順で読み込みをするので、重複しないようにまとめる)
require(BASEPATH . '/src/init.php');

// 全体に設定するmiddlewareの設定
require(BASEPATH . '/src/middleware.php');

// ルーティングの設定
require(BASEPATH . '/src/routes.php');

// sessionの設定
require(BASEPATH . '/src/session.php');

// Run app
$app->run();

