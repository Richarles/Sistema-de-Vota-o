<?php
namespace App\Services;

use App\Models\User;
use App\Models\voter;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function registerUser($data){
        $saveUser =  User::create([
            "name" => $data['name'],
            "email" => $data['email'],
            "password" => Hash::make($data['password'])
        ]);

        return $saveUser;
    }
}