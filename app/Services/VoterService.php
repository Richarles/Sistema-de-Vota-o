<?php
namespace App\Services;

use App\Models\voter;

class VoterService
{
    public function listSearchVoter($data)
    {
        $voters = voter::when($data['nameVoter'] &&  $data['select'] == 'first_Name', function ($query) use ($data) {
            return $query->where('first_name',$data['nameVoter']);
        })->when($data['nameVoter'] &&  $data['select'] == 'last_Name', function ($query) use ($data) {
            return $query->where('last_name',$data['nameVoter']);
        })->when($data['nameVoter'] &&  $data['select'] == 'telephone', function ($query) use ($data) {
            return $query->where('contact',$data['nameVoter']);
        })->when($data['nameVoter'] &&  $data['select'] == 'email', function ($query) use ($data) {
            return $query->where('email',$data['nameVoter']);
        })->paginate(1);
            
        return $voters;
    }
}