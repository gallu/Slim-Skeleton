<?php

namespace App\Model;

use App\Model\ModelBase;

class PhpSessions extends ModelBase
{
    // テーブル名
    protected $table = 'php_sessions';
    // PKカラム
    protected $pk = 'php_session_id'; // 通常の主キー

    // いわゆるcreated_at / updated_atがあるとき、ここに指定があればそのカラム名に日付を追加で入れる
    protected $updated_at = 'updated_at'; // insert 及び update時
}
