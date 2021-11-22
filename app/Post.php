<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'comments';
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function buku(){
        return $this->belongsTo('App\Buku', 'book_id', 'id');
    }
}