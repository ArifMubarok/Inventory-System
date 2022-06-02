<?php

namespace App\Http\Requests\Admin;

use App\Constants\RequestRuleConstant;
use Illuminate\Foundation\Http\FormRequest;

class MerkForm extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return RequestRuleConstant::merkTable();
    }
}
