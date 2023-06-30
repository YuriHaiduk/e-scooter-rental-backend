<?php

namespace App\Http\Requests\Api\V1\Driving;

use App\Models\Scooter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StartDrivingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'scooter_id' => ['required', 'integer', Rule::exists(Scooter::class, 'id')],
        ];
    }
}
