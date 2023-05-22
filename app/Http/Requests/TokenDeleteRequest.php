<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TokenDeleteRequest extends FormRequest
{
    public function rules()
    {
        return [
            'token' => 'required|string',
        ];
    }
}
