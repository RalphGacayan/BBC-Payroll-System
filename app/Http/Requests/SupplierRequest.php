<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
        $rules =  [
            'Supplier' => [
                  'required',
                  'string',
                  'max:200'
            ],
            'Address' => [
                'required',
                'string',
                'max:200'
            ],
          'Attention' => [
            'required',
            'string',
            'max:200'
          
            
           
            ],
            


        ];
        return $rules;
    }
}
