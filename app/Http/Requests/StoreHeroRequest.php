<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreHeroRequest extends FormRequest
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
            'name'=> 'required|max:255',
            'kind_id'=> 'required|max:255',
            'user_id'=> 'required|max:255',
            'current_health_points'=> 'required|max:255',
            'max_health_points'=> 'required|max:255',
            'current_strength_points'=> 'required|max:255',
            'current_money'=> 'required|max:255',
            'items_possessed'=> 'required|max:255',
            'performed_fights'=> 'required|max:255',
            'money_tranfers'=> 'required|max:255',
            'power'=> 'required|max:255',
            'attack_points' => 'required|max:255',
        ];
    }
}
