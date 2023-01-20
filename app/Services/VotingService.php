<?php
namespace App\Services;

use App\Models\candidate;
use App\Models\CountVote;
use App\Models\voter;

class VotingService
{
    public function votacionCandidate()
    {
        $searchCandidates = CountVote::with('candidates')->get();
    
        return $searchCandidates;
    }

    public function listCandidatesChecked()
    {
        $list = CountVote::with('candidates')->get();

        return $list;
    }

    public function listSearchVoter($data) //Não é necessário
    {
        if ($data['name'] && $data['str'] == 'a') {
            //dd($data);
            //$searchVoters = CountVote::with('candidates')->where('first_name',$data['name'])->get();
            $searchVoters = voter::where('first_name',$data['name'])->get();
            return $searchVoters;
        }else{
            //$voters = CountVote::with('candidates')->get();
            $voters = voter::get();
            return $voters;
        }
        //$searchCandidates = CountVote::with('candidates')->get();
        //dd($searchCandidates);

       // return $searchCandidates;
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