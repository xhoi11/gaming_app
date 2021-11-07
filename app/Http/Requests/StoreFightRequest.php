<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreFightRequest extends FormRequest
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
        //TODO-Validate host ID to be one of the heroes of auth users.
        return [
            'host_id' => 'required|max:255|exists:heroes,id',
            'guest_id' => 'required|max:255|exists:heroes,id',
        ];
    }
}
