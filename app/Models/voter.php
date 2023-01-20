<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voter extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name','contact','email','date_birth','voted'];
}
