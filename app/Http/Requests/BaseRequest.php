<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

abstract class BaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        session()->flash('error', $validator->errors()->first());

        return redirect()->back();
    }

    public function attributes(): array
    {
        return [
            'email' => 'email address',
        ];
    }

    abstract public function rules();
}
