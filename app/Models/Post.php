<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
    public function getGetTitleAttribute()
    {
        return strtoupper($this->title);
    }
    public function setTitleAttribute($value)
    {
        return $this->attributes['title'] = strtolower($value);
    }
}
