-- サンプル用テーブル
DROP TABLE IF EXISTS sample_table;
CREATE TABLE sample_table (
  sample_id BIGINT UNSIGNED AUTO_INCREMENT,
  sample_name VARCHAR(128) NOT NULL DEFAULT '' COMMENT 'サンプル名',
  sample_string_lock VARCHAR(128) NOT NULL DEFAULT '' COMMENT 'サンプル文字列(UPDATE不可)',
  sample_num INT NOT NULL DEFAULT 0 COMMENT 'サンプル量',
  sample_detail TEXT NOT NULL COMMENT 'サンプル詳細',
  created_at DATETIME NOT NULL COMMENT '作成日時',
  updated_at DATETIME NOT NULL COMMENT '更新日時',
  PRIMARY KEY (sample_id)
)CHARACTER SET 'utf8mb4', ENGINE=InnoDB, COMMENT='サンプル用テーブル';

