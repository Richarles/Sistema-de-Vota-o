<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCandidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'contact' => 'required|numeric',
            'email' => 'required|email|max:255|unique:candidates,email,'.$this->id.'',
            'date_birth' => 'required|date',
            'vote_number' => 'required',
            'profile_photo' => 'required|file'
        ];
    }
}
