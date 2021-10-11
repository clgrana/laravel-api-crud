<?php


namespace App\Http\Requests;


use App\Http\Requests\ApiRequest;

class UserRequest extends ApiRequest
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
            'name'       => 'required|max:255',
            'email'       => 'required|email|max:255|unique:users,email,'. request('id'),
            'address'       => 'required|max:255',
            'city'       => 'required|max:255',
            'uf'       => 'required|exists:uf,uf'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'email' => 'email',
            'address' => 'endereço',
            'city' => 'cidade',
            'uf' => 'uf'
        ];
    }

//    public function messages()
//    {
//    }
}
