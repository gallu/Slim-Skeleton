<?php

// session

// バージョン依存がある設定
if (version_compare(PHP_VERSION, '7.1.0') >= 0) {
    ini_set('session.sid_length', 64); // セッション ID 文字列の長さを指定
    ini_set('session.sid_bits_per_character', 6); // セッション ID 文字の種類の指定( '4' (0-9, a-f)、'5' (0-9, a-v)、'6' (0-9, a-z, A-Z, "-", ",") )
} else {
    ini_set('session.entropy_file', '/dev/urandom'); //  セッションIDを作成する際の別のエントロピーソースとして使用する 外部リソースへのパス
    ini_set('session.entropy_length', 32); // entropy_fileから読み込むバイト数
    ini_set('session.hash_function', 1); // セッション ID を生成するために使用されるハッシュアルゴリズム
    ini_set('session.hash_bits_per_character', 5); // バイナリの時の使用可能な文字の指定
}
if (version_compare(PHP_VERSION, '7.0.0') >= 0) {
    ini_set('session.lazy_write', 1); // 「セッションのデータが変更されたときにだけ再書き込みを行う」制御の有無
}
if (version_compare(PHP_VERSION, '5.5.2') >= 0) {
    ini_set('session.use_strict_mode', 1); // 厳格なセッション ID モードを利用するかどうか
}

// バージョン依存のない設定
// ガーベッジコレクションルーチン関連
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100); // gc_probability/gc_divisor の確率でガベコレが発生する
ini_set('session.gc_maxlifetime', 6*60*60); // データが消される秒数
/*
ini_set('session.save_path', ); // セッションファイルの保存先
// Cookie関連
ini_set('session.name', ); // セッション用Cookie名
ini_set('session.cookie_lifetime', ); // セッション用Cookieの寿命
ini_set('session.cookie_path', ); // セッション用Cookieのpath
ini_set('session.cookie_httponly', ); // セッション用Cookieのhttponly
ini_set('session.cookie_domain', ); // セッション用Cookieのdomain
ini_set('session.cookie_secure', ); // セッション用Cookieのsecure
ini_set('session.use_cookies', ); // セッションID保持にCookieを使うか
ini_set('session.use_only_cookies', ); // セッションID保持にCookie"のみ"を使うか
//
ini_set('session.referer_check', ); // HTTP Referer に おいて確認を行う文字列を指定
ini_set('session.cache_limiter', ); // セッションページにおけるキャッシュ制御の方法を指定
ini_set('session.cache_expire', ); // キャッシュされた セッションページの有効期間(分単位)
*/

// ユーザー定義のセッション保存関数を設定
//session_set_save_handler(new \App\Libs\SessionHandler());

// セッション開始
session_start();
