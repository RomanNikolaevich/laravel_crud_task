<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * We keep the uniqueness of the email for new users and at the same time allow editing the email
     * for an already registered user
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules():array
    {
        $rules = [
            'name'  => 'required| min:3| max:255',
            'email' => [
                'required',
                'email',
                'min:3',
                'max:255',
            ],
        ];

        if (!empty($this->user)) {
            $rules['email'][] = Rule::unique('users')->ignore($this->user->id);
        } else {
            $rules['email'][] = Rule::unique('users');
        }

        return $rules;
    }
}
