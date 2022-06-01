<?php

namespace App\Http\Requests\Admin;

use App\Constants\RequestRuleConstant;
use Illuminate\Foundation\Http\FormRequest;

class DepartemenForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    protected $stopOnFirstFailure = true;

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
        return RequestRuleConstant::departemenTable();
    }
}
