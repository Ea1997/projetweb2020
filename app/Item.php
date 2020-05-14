<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'titre','description','image','categorie_id'
    ];
    public function categorie()
    {
    	return $this->belongsTo(Categorie::class);
    }
    public function post()
    {
        return $this->hasMany(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
      }
}
