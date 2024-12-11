<?php

namespace App\Http\Requests;

use App\Models\Url;
use Illuminate\Foundation\Http\FormRequest;

class ShowUrlRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $url = Url::findOrFail($this->route('url'));
        $user = $this->user();
        
        return $url->user_id === $user->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
