<?php

namespace App\Http\Requests;

use Carbon\Carbon;

class PromotionRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'name' => [
                'required',
            ],
            'percent' => [
                'required',
            ],
            'code' => [
                'required',
            ],
            'expired_at' => [
                'required',
                function ($attribute, $value, $fail)
                {
                    if (now()->gt($value)) {
                        return $fail('Expired date must be greater than now');
                    }
                }
            ],
            'description' => [
                'required',
            ],
            'active' => [
                'required',
            ],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'active' => $this->active === 'on',
            'expired_at' => Carbon::make($this->expired_at),
        ]);
    }
}
