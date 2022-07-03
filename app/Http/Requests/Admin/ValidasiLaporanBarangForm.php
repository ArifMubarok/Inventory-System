<?php

namespace App\Http\Requests\Admin;

use App\Constants\RequestRuleConstant;
use Illuminate\Foundation\Http\FormRequest;

<<<<<<<< HEAD:app/Http/Requests/Admin/DepartemenForm.php
class DepartemenForm extends FormRequest
========
class ValidasiLaporanBarangForm extends FormRequest
>>>>>>>> origin/cek:app/Http/Requests/Admin/ValidasiLaporanBarangForm.php
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
<<<<<<<< HEAD:app/Http/Requests/Admin/DepartemenForm.php
        return RequestRuleConstant::departemenTable();
========
        return RequestRuleConstant::ValidasiLaporanBarangForm();
>>>>>>>> origin/cek:app/Http/Requests/Admin/ValidasiLaporanBarangForm.php
    }
}
