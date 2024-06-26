<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table="contacts";
    protected $fillable = [
        'user_name',
        'email',
        'mobile',
        'message',
        'added_on',
    ];
}
