<?php

/**
 * 「環境によって差異のある」設定値用のファイル
 */

// デバッグ表示をonにしておく
// XXX本番用の設定ならoffに
ini_set('display_errors', 1);
error_reporting(-1);

//
// Noticeであろうとも、エラーが出たら速やかに例外をぶん投げる
set_error_handler(
  function ($errno, $errstr, $errfile, $errline) {
    if (0 !== $errno & error_reporting()) {
        throw new ErrorException( $errstr, 0, $errno, $errfile, $errline);
    }
  }
);

// 設定本体
return [
    'settings' => [
        // 開発環境のみtrueに
        'displayErrorDetails' => true, // set to false in production // デフォルトのエラーハンドラには、詳細なエラー診断情報を含めることもできます。 これを有効にするには、displayErrorDetails設定をtrueに設定する必要があります。

        // DBの設定サンプル
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            //'port' => '',
            'database' => 'slim_skeleton',
            'user' => 'slim_skeleton',
            'pass' => 'slim_skeleton',
            'charset' => 'utf8mb4',
            'options' => [\PDO::ATTR_EMULATE_PREPARES => false, \PDO::MYSQL_ATTR_MULTI_STATEMENTS => false],
        ],
        // Monolog settings
        // level: DEBUG, INFO, NOTICE, WARNING, ERROR, CRITICAL, ALERT, EMERGENCY
        'logger' => [
            'name' => 'sample',
            /*
            // 普通のログ
            'Stream' => [
                'rotating' => 'on', // ログのローテーション。デフォルトon
                'path' => BASEPATH . '/logs/app.log', // ログファイル名
                'level' => \Monolog\Logger::DEBUG, // ログ出力レベル
            ],
            */
            // 「何かあったらlevelをさかのぼる」ログ
            'FingersCrossed' => [
                'rotating' => 'on', // ログのローテーション。デフォルトon
                'path' => BASEPATH . '/logs/app.log', // ログファイル名
                'activationStrategy_level' => \Monolog\Logger::WARNING, // ログ出力レベル「なにかあったら」
                'level' => \Monolog\Logger::DEBUG, // ログ出力レベル: 「ここまでさかのぼる」
            ],
            /*
            // mailで発砲させるログ
            'mail' => [
                'level' => \Monolog\Logger::ERROR, // ログ出力レベル
                'from' => '',   // mail from
                'to' => '',     // mail to
                'subject' => '',        // mail subject
            ],
            */

        ],
    ],
];


