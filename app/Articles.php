<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected function getDateFormat()
    {
        return time();
    }

//    protected function asDateTime($value)
//    {
//        return date('Y-m-d H:i:s',$value);
//    }
    public function cat()
    {
        return $this->hasOne('App\Cats', 'id', 'cat_id');
    }

    public function next()
    {
        return Articles::find($this->id + 1);
    }

    public function pre()
    {
        return Articles::find($this->id - 1);
    }

    public function getYear()
    {
        return date('Y', $this->getAttributes()['created_at']);
    }

    public function tags()
    {
        return $this->belongsToMany(
            'App\Tags',
            'article_tag',
            'article_id',
            'tag_id');
//        return $this->belongsToMany('App\Tags')->withTimestamps()->using('App\Article_tag');
    }

}