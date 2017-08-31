<?php
/**
 * Created by PhpStorm.
 * User: hujie
 * Date: 17-7-11
 * Time: 下午8:36
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //指定表名
    protected $table = 'student';
    //指定主键
    protected $primaryKey = 'id';
    //是否启用时间戳
    public $timestamps = true;
    //允许批量复制的字段
    protected $fillable = ['name', 'age'];
    //指定不批量赋值的字段
    protected $guarded = [];

    //时间戳
    protected function getDateFormat()
    {
        return time();
    }

    //时间格式化
    protected function asDateTime($value)
    {
        return $value;
    }

}