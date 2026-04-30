<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */

    //* cutomized rules
    public function rules(): array
    {
        return [
            //define the rules
            'username'=>"required",
            'useremail'=>"required|email",
            'userage'=>"required|numeric|between:18,26",
            'city'=>"required",
        ];
    }

    //* cutomized message
    public function message(){
        [
            'username.required'=>"User Name is mandatory.",
            'username.string'=>"User Name should be string only.",
            'username.max:20'=>"User Name length should not exceed 20.",
            'useremail.required'=>"User Email is required.",
            'useremail.email'=>"Enter the correct emial address.",
            'userage.required'=>"User Age is required.",
            'userage.numeric'=>"User Age must be a number.",
            'userage.between:18,26'=>"User Age should be not less than 18.",
        ];
    }

    //* customized attributes
    public function attributes(){
        return[
            'username'=>"UserName",
            'useremail'=>"UserEmail",
            'userage'=>"UserAge",
            'city'=>"City",
        ];
    }

    protected function prepareForValidation():void
    {
        $this->merge([
            'username'=>strtoupper($this->username),
            'city'=>strtoupper($this->city)
            //? strtoupper => convert to uppercase
        ]);
    }
}
