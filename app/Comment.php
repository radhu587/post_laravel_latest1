<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['commentBody','blog_id','body','user_id','user_name'];
    public function  user(){
        return $this->hasMany(User::class);
    }
}
