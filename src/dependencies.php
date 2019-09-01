<?php
// DIC configuration

$container = $app->getContainer();

// Request
$container['request'] = function ($c) {
    return \SlimLittleTools\Libs\Http\Request::createFromEnvironment($c->get('environment'));
};

// CSRF
$container['csrf'] = function ($c) {
    // 引数のブラックリストはどこかで適当に保持している前提(今は空配列)
    $csrf = (new \App\Middleware\CsrfGuard())->setNotCoveredList([]);
    $csrf->setRendererName('renderer');
    //
    $csrf->setFailureCallable(function ($request, $response, $next) use ($c, $csrf) {
        return $response->write($c->get($csrf->getRendererName())->render('csrf_error.html'));
    });
    //
    return $csrf;
};

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    $twig = new \Twig\Environment(new \Twig\Loader\FilesystemLoader($settings['template_path']));

	//
	$csrf_obj = $c->get('csrf');
	$twig->addFunction(
        new \Twig_SimpleFunction('csrf', function () use ($csrf_obj) {
            echo <<< EOL
<input type="hidden" id ="csrf_token_name" name="{$csrf_obj->getTokenNameKey()}" value="{$csrf_obj->getTokenName()}">
<input type="hidden" id="csrf_token_value" name="{$csrf_obj->getTokenValueKey()}" value="{$csrf_obj->getTokenValue()}">
EOL;
        })
    );

    //
    return $twig;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// mail
$container['mailer'] = function ($c) {
    //XXX
    $mailer = new \App\Libs\Mailer($c->get('settings')['from']);
    return $mailer;
};
