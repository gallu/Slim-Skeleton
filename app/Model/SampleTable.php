<?php
namespace App\Model;

class SampleTable extends ModelBase
{
    //
    use Detail\SampleTableDetail;

    // (PK以外で)update時に変更を抑止したいカラム：このカラムがupdate時に「引数>で入っていて」「既存の値と異なる」場合は、例外を吐く
    protected $guard = ['sample_string_lock', 'created_at'];

    // いわゆるcreated_at / updated_atがあるとき、ここに指定があればそのカラム名に日付を追加で入れる
    protected $created_at = 'created_at'; // insert
    protected $updated_at = 'updated_at'; // insert 及び update時

    // PKがAUTO_INCREMENTのみのテーブルで、ここに明示的にtrueがあったら「insert>の時にPKが指定されていたら例外を吐く」「insert後、PDO::lastInsertIdでとれる値をPKのカラムに入れる」>を行う
    protected $auto_increment = true;

    // validate系設定
    // XXX https://github.com/gallu/SlimLittleTools#filterphp
    // insert / update共通
    protected $validate = [
        'sample_name' => 'required|max_length:128',
        'sample_string_lock' => 'max_length:128',
        'sample_num' => 'int|required',
    ];

    // filterルール設定
    // https://github.com/gallu/SlimLittleTools#filterphp
    // insert / update共通
    protected $filter = [
        //'カラム名' => 'ルール',
        //'カラム名' => 'ルール',
    ];
}
