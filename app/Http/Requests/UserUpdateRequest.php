<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
            return [
                'name'=>[
                    'required',
                    'min:3',
                    'max:50',
                    'unique:users,name,'.$this->route()->parameter('user')??0
                    ],
                'email'=>[
                    'required',
                    'email',
                    'unique:users,email,'.$this->route()->parameter('user')??0
                ],
                'password'=>['required','confirmed','min:5'],
                'is_admin'=>['required'],
            ];
    }
}
