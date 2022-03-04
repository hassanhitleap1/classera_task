<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends \App\Http\Requests\Api\FormRequest
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
     * @return array
     */
    public function rules()
    {
        return  [
            'email' => 'required',
            'password' => 'required|string|min:6|max:50'
        ];

    }


    /*
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
