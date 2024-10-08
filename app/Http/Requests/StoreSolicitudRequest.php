<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSolicitudRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> 'required',
            'email'=> 'required|unique:users,email',
            'apellido'=>'required',
            'telefono'=>'required',
            'rut'=>'required|unique:users,rut',
            'password'=>'required',
            'password_confirmation'=> 'required|same:password',
            'id_centro'=>'required', 
            
        ];
    }
}
