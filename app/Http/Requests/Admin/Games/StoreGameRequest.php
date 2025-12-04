<?php

namespace App\Http\Requests\Admin\Games;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() && $this->user()->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'title'        => ['required', 'string', 'max:255'],
            'slug'         => ['nullable', 'string', 'max:255', 'unique:games,slug'],
            'developer'    => ['nullable', 'string', 'max:255'],
            'publisher'    => ['nullable', 'string', 'max:255'],
            'genres'       => ['nullable', 'string'],
            'storyline'    => ['nullable', 'string'],
            'release_year' => ['nullable', 'integer', 'min:1950', 'max:' . (date('Y') + 1)],
            'age_rating'   => ['nullable', 'string', 'max:50'],
            'platforms'    => ['nullable', 'string'],
            'modes'        => ['nullable', 'string'],
            'size_gb'      => ['nullable', 'integer', 'min:1', 'max:500'],
            'languages'    => ['nullable', 'string'],
            'rating'       => ['nullable', 'numeric', 'min:0', 'max:10'],
            'cover'        => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'screenshots'  => ['nullable', 'array', 'max:10'],
            'screenshots.*'=> ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}
