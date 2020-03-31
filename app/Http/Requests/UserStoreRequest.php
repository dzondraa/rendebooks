<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->header('APP_KEY') == config('PUSHER_APP_KEY')) return true;
        else return false;

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
            'username' => 'unique:users|max:25|required',
            'phone_number' => 'unique:users|required',
            'email' => 'email',
        ];
    }
}
