<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = in_array($this->method(), ['PUT', 'PATCH']);
        $required = $isUpdate ? 'sometimes' : 'required';

        return [
            'title' => [
                $required, 'string', 'max:255',
                Rule::unique('media', 'title')->ignore($this->route('media')),
            ],
            'type' => [$required, Rule::in(['anime', 'drama', 'manga', 'light novel'])],
            'genre' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul media wajib diisi',
            'title.unique' => 'Judul media sudah ada',
            'type.required' => 'Jenis media wajib diisi',
            'type.in' => 'Jenis media harus anime, drama, manga, atau light novel',
        ];
    }
}
