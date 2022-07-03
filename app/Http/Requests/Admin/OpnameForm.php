<?php

namespace App\Http\Requests\Admin;

use App\Constants\RequestRuleConstant;
use Illuminate\Foundation\Http\FormRequest;

<<<<<<<< HEAD:app/Http/Requests/Admin/DataBarangForm.php
class DataBarangForm extends FormRequest
========
class OpnameForm extends FormRequest
>>>>>>>> origin/cek:app/Http/Requests/Admin/OpnameForm.php
{
    protected $stopOnFirstFailur = true;

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
<<<<<<<< HEAD:app/Http/Requests/Admin/DataBarangForm.php
        return RequestRuleConstant::barangTable();
========
        return RequestRuleConstant::opnameTable();
>>>>>>>> origin/cek:app/Http/Requests/Admin/OpnameForm.php
    }
}
