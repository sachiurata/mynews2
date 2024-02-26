<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array (
        'title' => 'required',
        'body' => 'required',
     );
     
     public function histories(): HasMany
     {
         return $this->hasMany('App\Models\History');
     }
     
     public function comments(): HasMany
     {
         return $this->hasMany(Comment::class);
     }
     
}
