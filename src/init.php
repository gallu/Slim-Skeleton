<?php

/*
 * バッチとWebで共通になる処理の記述
 */

// 基準になるディレクトリ(最後の / はない形式で)
if (false === defined('BASEPATH')) {
    define('BASEPATH', realpath(__DIR__ . '/..'));
}

// 設定の読み込み: 環境個別、のほうが優先順位高い
$settings = array_merge_recursive(require(BASEPATH . '/src/settings.php'), require(BASEPATH . '/src/by_environment_settings.php') );

// appインスタンスの生成
$app = new \Slim\App($settings);

// container への追加設定
require(BASEPATH . '/src/dependencies.php');

// DBとConfigを使うための準備
// XXX DBとConfigだけは「どこからでも」触りたいので
\SlimLittleTools\Libs\DB::setContainer($app->getContainer());
\SlimLittleTools\Libs\Config::setContainer($app->getContainer());
\SlimLittleTools\Libs\Container::setContainer($app->getContainer());

// class のエイリアス
class_alias('\\SlimLittleTools\\Libs\\DB', 'DB');
class_alias('\\SlimLittleTools\\Libs\\Config', 'Config');
class_alias('\\SlimLittleTools\\Libs\\Container', 'Container');

