<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdatePublicadorRequest extends FormRequest
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

        $rules = [
            'nome' => 'required|min:1|max:255',
            'obs' => ['min:1']
        ];

        if($this->method() === 'PUT'){
            $rules['nome'] = [
                'required',
                'min:1',
                'max:255',
                //'unique:publicadores,nome,{$this->id},id'
                Rule::unique('publicadores')->ignore($this->id)
            ];
        }

        return $rules;
    }
}
