<?php
/**
 * Created by PhpStorm.
 * User: hujie
 * Date: 17-7-20
 * Time: 下午4:55
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Cats extends Model
{
    protected $table = 'cats';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected function getDateFormat()
    {
        return time();
    }

    public function articles()
    {
        return $this->hasMany('App\Articles','cat_id','id');
    }
}