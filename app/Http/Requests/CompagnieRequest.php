<?php

namespace App\Http\Requests;

use App\Rules\TitleRuleRequest;
use Illuminate\Foundation\Http\FormRequest;

class CompagnieRequest extends FormRequest
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
            'name'=>['required', new TitleRuleRequest ],
            'address'=>'required|string',
            'contact'=>'required|string',
            'field_of_activity' => 'required|string'
        ];
    }
    public function messages(){
        return [
            'title.required' => 'vous devez remplire le champ du title' ,
            'title.min' => 'vous devez ajouter des lettres' ,
            'title.max' => 'vous devez minimiser votre texte' ,


        ];
    }
}
