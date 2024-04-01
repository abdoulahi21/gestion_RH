<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:250',
            'email' => 'required|string|email:rfc,dns|max:250|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'required',
            'adresse'=> 'required|string|max:250',
            'telephone'=> 'required|string|max:250',
            'date_naissance'=> 'required|date',
            'lieu_naissance'=> 'required|string|max:250',
            'sexe'=> 'required|string|max:250',
            'situation_matrimoniale'=> 'required|string|max:250',
            'nombre_enfants'=> 'required|integer',
            'nationalite'=> 'required|string|max:250',
            'numero_identite'=> 'required|string|max:250',
            'langue' => 'required',
            'skill' => 'required',
            'certification' => 'required',
        ];
    }
}
