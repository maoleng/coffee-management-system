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
}
