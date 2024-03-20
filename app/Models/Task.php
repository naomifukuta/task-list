<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
//入力したいとこは格納しなければいけない
    protected $fillable = ['title','description','long_description'];
    // ↓は$fillableの逆
    // protected $guarded = ['secret'];
}


