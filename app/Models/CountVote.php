<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountVote extends Model
{
    use HasFactory;

    protected $table = 'count_votes';


    protected $fillable = ['candidate_id','votes'];

    public function candidates()
    {
        return $this->belongsTo(candidate::class,'candidate_id');
    }
}
