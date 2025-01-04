<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocialPostRequest extends FormRequest
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
    public function rules(): array
    {
        /** @var int $socialPostMaxContentLength */
        $socialPostMaxContentLength = config('app.custom.social_post.max_content_length');

        return [
            'content' => 'bail|required|string|max:'.(string) $socialPostMaxContentLength,
        ];
    }
}
