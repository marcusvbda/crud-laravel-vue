<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListNewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'page' => 'nullable|min:1',
            'perPage' => 'nullable|min:1',
            'filter' => 'nullable|string|max:255',
        ];
    }
}
