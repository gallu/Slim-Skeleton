<?php
namespace App\Model\Detail;

/*
 * XXX このファイルは自動生成なので書き込みをしないでください
 */

// sample_table
// サンプル用テーブル
trait SampleTableDetail
{
    // pk
    protected $pk = 'sample_id';
    // テーブル名
    protected $table = 'sample_table';
    // カラム一覧
    protected $colmuns = [
        'sample_id',	// 	bigint(20) unsigned
        'sample_name',	// サンプル名	varchar(128)
        'sample_string_lock',	// サンプル文字列(UPDATE不可)	varchar(128)
        'sample_num',	// サンプル量	int(11)
        'sample_detail',	// サンプル詳細	text
        'created_at',	// 作成日時	datetime
        'updated_at',	// 更新日時	datetime%
    ];

    // 全カラム取得
    public static function getAllColmuns()
    {
        return (new static())->colmuns;
    }
    // PKを除く全カラム取得
    public static function getAllColmunsWithoutPk()
    {
        // カラム取得
        $colmuns = (new static())->colmuns;

        // pk把握
        $pk = static::getPkName();
        if (is_string($pk)) {
            $pk = [$pk];
        }

        // diffして整理
        $colmuns = array_values(array_diff($colmuns, $pk));

        //
        return $colmuns;
    }
}
