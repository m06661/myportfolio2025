<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    Use HasFactory;

    protected $fillable = ['naam', 'email', 'onderwerp', 'bericht'];
}
