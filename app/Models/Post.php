<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table="posts";
    protected $fillable = [
        'image',
        'title',
        'slug',
        'short_discr',
        'long_discr',
        'post_date',
        'status',
        'added_on',
    ];

    public function comments(){

        return $this->hasMany(Comment::class,'post_id','id');
    }

}
