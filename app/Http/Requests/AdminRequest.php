<?php

namespace App\Http\Requests;

class AdminRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
            ],
            'role' => [
                'required',
            ],
            'is_send_mail' => [
                'required',
            ],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'role' => (int) $this->role,
            'is_send_mail' => $this->is_send_mail === 'on',
        ]);
    }
}
