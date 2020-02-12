<?php

// 基準になるディレクトリ(最後の / はない形式で)
define('BASEPATH', __DIR__);

// オートローダ
require(BASEPATH . '/vendor/autoload.php');

// 初期処理(testでも同じ手順で読み込みをするので、重複しないようにまとめる)
require(BASEPATH . '/src/init.php');

// クラスを直接callして処理はそちらに任せる
\SlimLittleTools\Libs\MakeModelDetail::exec($argv);

