<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return csrf_token();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'username' => 'max:25|required|unique:users,id,' . $this->get('id'),
            'phone_number' => 'required|unique:users,id,' . $this->get('id'),
            'email' => 'email|unique:users,id,' . $this->get('id'),
        ];
    }
}
