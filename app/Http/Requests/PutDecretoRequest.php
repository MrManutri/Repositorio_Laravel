<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PutDecretoRequest extends FormRequest
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
            'numero' => "required|integer|max:99999",
            'fecha' => "required|date",
            'materia' => "required",
            'firmador' => "required",
            'interesado' => "required",
            //'nombre_archivo' => "required",
            'id_tipo_documento' => "required|integer",
            'id_cr' => "required|integer",
            //'vistos' => "required",
            'id_restringido' => "required|integer",
            'creador' => "required",
            //'conciderando' => "required",
        ];
    }
}
