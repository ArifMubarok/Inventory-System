<?php

namespace App\Http\Requests\Admin;

use App\Constants\RequestRuleConstant;
use App\Traits\FillableRequestTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UserForm extends FormRequest
{
    use FillableRequestTrait;

    protected $mapPrefix = ['user', 'user_profile'];

    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return RequestRuleConstant::userTable();
    }
}
