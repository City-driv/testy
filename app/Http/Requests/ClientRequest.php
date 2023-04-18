<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|between:3,20',
            'prenom' => 'required|between:3,20',
            'telephone' => 'required',
            'email' => 'required|email',
            'genre' => 'required',
            'hebergement' => 'required',
            'situation_familiale' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'departement' => 'required',
            'montant_facture' => 'required',
            'reste_a_vivre' => ''
        ];
    }
}
