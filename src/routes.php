<?php
// Routes

// Controllerの指定が楽なので、この名前空間にしておく
namespace App\Controller;
//
use App\Middleware\MiddlewareSample;

//
$app->get('/', Home::class . ':index');

/* 以下、サンプル */
$app->group('/sample', function() use ($app) {
    // 表示だけ
    $app->get('', Sample::class . ':index')->setName('sample_index');
    // json出力
    $app->get('/json', Sample::class . ':json');
    // CSV出力
    $app->get('/csv', Sample::class . ':csv');
    // location(内部)
    $app->get('/location', Sample::class . ':locationLocal');
    // location(外部)
    $app->get('/location/google', Sample::class . ':locationGoogle');
    // データの受取
    $app->get('/request', Sample::class . ':request');
    // データの受取(GET)
    $app->get('/request/get', Sample::class . ':requestFin');
    // データの受取(POST)
    $app->post('/request/post', Sample::class . ':requestFin');
    // データの受取(PUT)
    $app->put('/request/put', Sample::class . ':requestFin');

    // データの受取、validate、insert
    $app->get('/post', Sample::class . ':postInput')->setName('post_input');
    $app->post('/post', Sample::class . ':postDo');
    $app->get('/post_fin', Sample::class . ':postFin')->setName('post_fin');
    // データの一覧
    $app->get('/list', Sample::class . ':list')->setName('post_list');
    // データの表示(URIでパラメタ受け取り)
    $app->get('/detail/{id}', Sample::class . ':detail')->setName('post_detail');
    // データの修正
    $app->get('/edit/{id}', Sample::class . ':edit')->setName('post_edit');
    $app->post('/edit/{id}', Sample::class . ':editDo');

    // session
    $app->get('/session', Sample::class . ':session');
    // Cookie
    $app->get('/cookie', Sample::class . ':cookie');

    // middleware付き(middlewareは空でよいかなぁ...)
    $app->group('', function() use ($app) {
        //
        $app->get('/middle', Sample::class . ':middle');
    })->add(new MiddlewareSample($app->getContainer()));
});
