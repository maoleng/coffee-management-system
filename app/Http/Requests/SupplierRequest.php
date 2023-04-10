<?php

namespace App\Http\Requests;

class SupplierRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'name' => [
                'required',
            ],
            'address' => [
                'required',
            ],
            'phone' => [
                'required',
            ],

        ];
    }
}
