@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', isset($data) ? 'Edit Pengguna' : 'Create Pengguna' )

@push('css')
<link href="{{ asset('/assets/plugins/smartwizard/dist/css/smart_wizard.css') }}" rel="stylesheet" />
@endpush

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item active">@yield('title')</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">@yield('title')</h1>
<!-- end page-header -->


<!-- begin panel -->
<form action="{{ isset($data) ? route('admin.settings.users.update', $data->id) : route('admin.settings.users.store') }}" id="form" name="form" method="POST" data-parsley-validate="true" redirect-back="true">
    @csrf
    @if(isset($data))
    {{ method_field('PUT') }}
    @endif
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">User Form</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body">
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-2 offset-md-1">Nama*</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control m-b-5" name="name" id="name" value="" placeholder="Nama" required="required" value="{{{ old('name') ?? $data->name ?? null }}}">
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-2 offset-md-1">Password*</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control m-b-5" name="user_password" id="user_password" value="" placeholder="Password" data-parsley-required="{{{ isset($data) ? 'false' : 'true' }}}" value="{{ old('user_password') }}" >
                        </div>
                    </div>
                        <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-2 offset-md-1">Ulangi Password*</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control m-b-5" name="user_password_confirmation" id="user_password_confirmation" value="" data-parsley-required="{{{ isset($data) ? 'false' : 'true' }}}" placeholder="Ulangi Password">
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-2 offset-md-1">Level*</label>
                        <div class="col-md-6">
                            <x-form.dropdown name="role" :options="$role" :selected="old('role') ?? (isset($data->role) ? $data->role : null)" placeholder="Pilih Roles" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-2 offset-md-1">Departemen*</label>
                        <div class="col-md-6">
                            <x-form.dropdown name="departemen_id" :options="$departemen" :selected="old('departemen_id') ?? (isset($data->departemen_id) ? $data->departemen_id : null)" placeholder="Pilih Departemen" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-2 offset-md-1">Email</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control m-b-5" name="email" id="email" value="" placeholder="Email" value="{{{ old('email') ?? $data->email ?? null }}}">
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-2 offset-md-1">No. HP</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control m-b-5" name="number" id="number" value="" placeholder="No. HP" value="{{{ old('number') ?? $data->number ?? null }}}">
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-2 offset-md-1">Aktif*</label>
                        <div class="col-md-6">
                            <select class="form-control" name="status" required="">
                                <option selected>{{{ old('status') ?? $data->status ?? 'Pilih Status' }}}</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="control-label col-md-2 offset-md-1"></label>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle"></i> Simpan</button>&nbsp;
                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-undo"></i> Kosongkan</button>&nbsp;
                        </div>
                    </div>
                </div>
            <!-- end panel-body -->
            </div>
            <!-- end panel -->

</form>
<a href="javascript:history.back(-1);" class="btn btn-success">
    <i class="fa fa-arrow-circle-left"></i> Kembali
</a>

@endsection

@push('scripts')
<script src="{{ asset('/assets/plugins/parsleyjs/dist/parsley.js') }}"></script>
<script src="{{ asset('/assets/js/custom/ajax-form-handler.js') }}"></script>
<script src="{{ asset('/assets/js/custom/datetime-picker.js') }}"></script>
@endpush