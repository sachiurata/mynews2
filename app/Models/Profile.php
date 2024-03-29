<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ProfileHistory;

class Profile extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
        );
    public function profile_histories()
    {
        return $this->hasMany('App\Models\ProfileHistory');
        
        // ver.9 での書き方
        // return $this->hasMany(ProfileHistory::class);
    }
}
