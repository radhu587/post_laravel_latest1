<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Blog extends Model
{
    protected $fillable = ['title','body','user_id','editTitle','editBody'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function addIt($body){
        Comment::create([
            'blog_id' => $this->id,
            'body' => $body,
            'user_id' => auth()->id(),
            'user_name' => auth()->user()->name    
       ]);
    }
}
