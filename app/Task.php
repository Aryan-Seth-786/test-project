<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    protected $fillable=[
        'title',
        'content'
    ];
    public function scopeOf(Builder $query,$usr)
    {
        return $query->where('user_id' , '=' ,$usr->id)->orderBy('status','asc')->orderBy('updated_at','desc');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
