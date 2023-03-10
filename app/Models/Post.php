<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'slug',
        'image'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
  
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
