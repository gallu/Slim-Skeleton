<?php

namespace App\Libs;

use App\Model\PhpSessions;

/*
前提になるテーブル

CREATE TABLE `php_sessions` (
  `php_session_id` varbinary(128) NOT NULL COMMENT 'セッションID' ,
  `data` longblob NOT NULL COMMENT 'セッションデータ',
  `updated_at` datetime NOT NULL COMMENT 'データ更新日',
  PRIMARY KEY (`php_session_id`)
)CHARACTER SET 'utf8mb4', ENGINE=InnoDB, COMMENT='１レコードが「１ユーザのセッションデータ」なテーブル';
 */

class SessionHandler implements \SessionHandlerInterface
{

    /**
     * open: なにもしない
     */
    public function open($save_path, $name)
    {
        return true;
    }

    /**
     * close: なにもしない
     */
    public function close()
    {
        return true;
    }

    /**
     * read: セッションデータの読み込み
     */
    public function read($session_id)
    {
        $obj = PhpSessions::find($session_id);
        if (null === $obj) {
            return '';
        }
        // else
        return $obj->data;
    }

    /**
     * write: セッションデータの書き込み
     */
    public function write($session_id, $session_data)
    {
        $obj = PhpSessions::find($session_id);
        if (null === $obj) {
            PhpSessions::insert(['php_session_id' => $session_id, 'data' => $session_data]);
        } else {
            $obj->update(['data' => $session_data]);
        }
        return true;
    }

    /**
     * destroy: セッションの破棄
     */
    public function destroy($session_id)
    {
        $obj = PhpSessions::find($session_id);
        if (null !== $obj) {
            $obj->delete();
        }
        return true;
    }

    /**
     * gc: 時間経過によるセッションのお掃除
     */
    public function gc($maxlifetime)
    {
        $dbh = \DB::getHandle();
        $r = $dbh->preparedQuery('DELETE FROM php_sessions WHERE updated_at < :time', [':time' => time() - $maxlifetime]);
        return true;
    }
}
