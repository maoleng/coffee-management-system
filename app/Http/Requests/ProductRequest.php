<?php

namespace App\Http\Requests;

class ProductRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'name' => [
                'required',
            ],
            'category_id' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'price' => [
                'required',
            ],
            'expire_month' => [
                'required',
            ],
            'images' => [
                'required',
            ],
        ];
    }

    public function prepareForValidation(): void
    {
        $price = str_replace(',', '', $this->price);
        $this->merge([
            'price' => (int) $price,
            'expire_month' => (int) $this->expire_month,
        ]);
    }
}
