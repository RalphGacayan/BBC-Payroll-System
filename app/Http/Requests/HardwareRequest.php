<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HardwareRequest extends FormRequest
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
            'Asset' => [
                  'required',
                  'string',
                  'max:200'
            ],
            'Model' => [
                'required',
                'string',
                'max:200'
            ],
          'Serial_no' => [
            'required',
            'string',
            'max:200'
          
            
           
            ],
            'Status' => [
                'required',
                'string'
                
            ],
            'Date' => [
                'required'
               
            ],
           
            'Unit' => [
                'required'
               
            ],

            'image' => [

                 'required',
                'mimes:jpeg,png,jpg'
               
            ],

            'Company' => [
                'required'
               
            ],

            'Manufacturer' =>[
                'required'
            ],

             
            'Remarks' =>[
                'required'
            ],

             
            'Assigned' =>[
                'required'
            ]


        ];
        return $rules;
    }
}
