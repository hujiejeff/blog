<?php

namespace App;


use Illuminate\Database\Eloquent\Relations\Pivot;

class Article_tag extends Pivot
{
    protected $table = 'article_tag';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected function getDateFormat()
    {
        return time();
    }
}