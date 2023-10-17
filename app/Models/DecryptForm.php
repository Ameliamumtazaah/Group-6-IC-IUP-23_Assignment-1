<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DecryptForm extends Model
{
    protected $table = 'forms'; 
    protected $fillable = ['username', 'password', 'email', 'NIK', 'phonenumber', 'image', 'file', 'video'];
}
