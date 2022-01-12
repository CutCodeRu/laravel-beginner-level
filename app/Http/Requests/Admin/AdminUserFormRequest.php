<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property mixed $password
 */

class AdminUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth("admin")->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ["required"],
            "email" => ["required"],

            "password" => [
                Rule::when(
                    request()->isMethod('post'),
                    ["required", "confirmed"],
                    ["sometimes", "confirmed"]
                )
            ],
        ];
    }

    protected function prepareForValidation()
    {
        if(is_null($this->password)) {
            $this->request->remove('password');
        }
    }
}
