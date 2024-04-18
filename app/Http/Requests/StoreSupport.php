<?php

namespace App\Http\Requests;

use App\Models\Support;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSupport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Support $support): array
    {
        $keysStatus = array_keys($support->statusOptions);

        return [
            'lesson' => ['required', 'exists:lessons,id'],
            'status' => ['required', Rule::in($keysStatus)],
            'description' => ['required', 'min:3', 'max:10000']
        ];
    }
}
