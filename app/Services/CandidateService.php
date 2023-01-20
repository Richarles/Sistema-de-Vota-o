<?php
namespace App\Services;

use App\Models\candidate;

class CandidateService
{
    public function listCandidate($data)
    {
        $candidates = candidate::when($data['nameCandidate'] != null &&  $data['select'] == 'first_Name', function ($query) use ($data) {
            return $query->where('first_name','like','%'.$data['nameCandidate'].'%');
        })->when($data['nameCandidate'] &&  $data['select'] == 'last_Name', function ($query) use ($data) {
            return $query->where('last_name',$data['nameCandidate']);
        })->when($data['nameCandidate'] &&  $data['select'] == 'telephone', function ($query) use ($data) {
            return $query->where('contact',$data['nameCandidate']);
        })->when($data['nameCandidate'] &&  $data['select'] == 'email', function ($query) use ($data) {
            return $query->where('email',$data['nameCandidate']);
        })->paginate(2);
        
        return $candidates;
    }

    public function uploadPhoto($data)
    {
        $file = $data['profile_photo'];
        $path = $file->store('imagens/candidatos','public');

        return $path;
    }
}