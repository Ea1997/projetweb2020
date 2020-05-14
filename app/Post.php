<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'item_id','prix','user_id','categorie_id'
    ];
    public function item()
    {
    	return $this->belongsTo(Item::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function comments()
      {
      	return $this->hasMany(Comment::class);
      }
}
