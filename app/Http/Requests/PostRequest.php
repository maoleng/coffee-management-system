<?php

namespace App\Http\Requests;

class PostRequest extends BaseRequest
{

    public function rules(): array
    {
        $rules = [
            'title' => [
                'required',
            ],
            'category' => [
                'required',
            ],
            'tags' => [
                'required',
            ],
            'banner' => [
                'required',
            ],
            'content' => [
                'required',
            ],
        ];

        $method = request()->route()->getActionMethod();
        if ($method === 'update') {
            $rules['banner'] = ['nullable'];
        }

        return $rules;
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
