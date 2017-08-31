<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Tags  extends Model
{
    protected $table = 'tags';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected function getDateFormat()
    {
        return time();
    }

    public function articles()
    {
        return $this->belongsToMany(
            'App\Articles',
            'article_tag',
            'tag_id',
            'article_id');
//        return $this->belongsToMany('App\Articles')->withTimestamps()->using('App\Article_tag');
    }
}