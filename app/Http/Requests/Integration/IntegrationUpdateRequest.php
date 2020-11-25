<?php

namespace App\Http\Requests\Integration;

use App\Models\Integration;
use App\Models\Customer;
use App\Models\IntegrationType;
use App\Rules\SushiRules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class IntegrationUpdateRequest extends FormRequest
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
            'integration_type_id'=> [
                'required',
                SushiRules::exists(IntegrationType::class,'id'),
            ],
            'customer_id'=> [
                'required',
                Rule::exists(Customer::class, 'id')
            ],
            'username'=> [
                'required',
            ],
            'passport'=> [
                'required',
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributes()
    {
        return Integration::$labels;
    }
}
