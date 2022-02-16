<?php

namespace App\Http\Requests\Admin;

use App\Rules\Tenant\TenantUnique;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Post extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => [
                'required',
                'min:3',
                'max:191',
                new TenantUnique('posts', $this->segment(2)),
            ],
            'autor' => 'required',
            'categoria' => 'required',
            'tipo' => 'required',
        ];
    }
}