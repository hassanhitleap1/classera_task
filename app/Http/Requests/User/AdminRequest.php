<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdminRequest extends \App\Http\Requests\Api\FormRequest
{

    protected $createRules = [
        'name' => 'required|max:255',
         'email' => 'email|unique:users,email',
        
    ];


    protected $updateRules = [
        'name' => 'required|max:255',
         'email' => 'email|unique:users,email',
      
    ];

    protected $rules = [];

    public function createValidate(){
        return $this->createRules;
    }

    public function updateValidate(){
         $this->updateRules['email'] = "email|unique:users,email,$this->id";
    
        return $this->updateRules;
    }

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
     * @return array
     */
    public function rules()
    {
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return  $this->updateValidate();
        }else{
            return  $this->createValidate();
        }

    }




    /**
     * Returns validations errors.
     *
     * @param Validator $validator
     * @throws  HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'status' => 422
        ], 422));

        parent::failedValidation($validator);
    }
}
