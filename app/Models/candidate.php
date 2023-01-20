<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidate extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name','contact','email','date_birth','vote_number','profile_photo','checked'];

    public function countVotes()
    {
        return $this->hasMany(CountVote::class,'candidate_id');
    }
}
