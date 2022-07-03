<?php

namespace App\Http\Requests\Admin;

use App\Constants\RequestRuleConstant;
use Illuminate\Foundation\Http\FormRequest;

<<<<<<<< HEAD:app/Http/Requests/Admin/OpnameForm.php
class OpnameForm extends FormRequest
========
class LaporForm extends FormRequest
>>>>>>>> origin/cek:app/Http/Requests/Admin/LaporForm.php
{
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
        return RequestRuleConstant::LaporTableForm();
    }
}
