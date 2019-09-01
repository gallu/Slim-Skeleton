<?php
/**
 * 「環境によって差異のない」設定値用のファイル
 */

return [
    'settings' => [
        //'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // 「middlewareからのルーティングパラメタへのアクセス」を有効にする
        'determineRouteBeforeAppMiddleware' => true,

        // Renderer settings
        'renderer' => [
            'template_path' => BASEPATH . '/templates/',
        ],

        // Cookie
        'cookie' => [
            'httponly' => true,
            //'secure' => true,
        ],

        // メール
        'mail' => [
            'from' => "hoge@hoge.com", // デフォルトのfrom
        ],

	],
];
