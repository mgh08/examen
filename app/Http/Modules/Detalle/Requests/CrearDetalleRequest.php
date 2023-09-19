<?php

namespace App\Http\Modules\Detalle\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CrearDetalleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'cantidad'      =>   'integer|required',
            'precio'        =>   'integer|required',
            'producto_id'   =>   'integer|required',
            'factura_id'    =>   'integer|required'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw(new HttpResponseException(response()->json($validator->errors(), 422)));
    }
}