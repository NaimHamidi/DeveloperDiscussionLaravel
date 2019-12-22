<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }
}
