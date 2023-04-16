<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;


    protected $table = 'websits';
    protected $fillable = ['actv', 'Description_ar', 'Description_en'];
}
