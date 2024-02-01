<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TitleRuleRequest;


class AnnouncementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
            return [
                'title'=>'required' ,
                'content'=>'required|string',
                'user_id' => 'raquired',
                'compagnie_id' => 'required'
                 
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
    

