<?php
namespace App\Services;

use App\Models\candidate;
use App\Models\CountVote;
use App\Models\voter;

class VotingService
{
    public function votacionCandidate()
    {
        $searchCandidates = candidate::with('countVotes')->where('checked',1)->get();
    
        return $searchCandidates;
    }

    public function VerificEmailVoter($data)
    {
        $verification = voter::where('email',$data['email'])->where('voted',0)->first();

        return $verification;
    }

    public function countVoto($dataId)
    {
        $count = CountVote::find($dataId)->increment('votes',1);;

        return $count;
    }

    public function votosCandidates()
    {
        $showNumberVotos = CountVote::with('candidates')->get();

        return $showNumberVotos;
    }
}