-- PHPセッション用テーブル
CREATE TABLE `php_sessions` (
  `php_session_id` varbinary(128) NOT NULL COMMENT 'セッションID',
  `data` longblob NOT NULL COMMENT 'セッションデータ',
  `updated_at` datetime NOT NULL COMMENT 'データ更新日',
  PRIMARY KEY (`php_session_id`),
  KEY `idx_updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='１レコードが「１ユーザのセッションデータ」なテーブル'

