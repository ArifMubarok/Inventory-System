<?php

namespace App\Constants;

class RequestRuleConstant
{
    public static function ValidasiLaporanBarangForm()
    {
        return[
            'status' => 'required',
            'keterangan' => 'required',
        ];
    }

    public static function LaporTableForm()
    {
        return [
            'barang_id' => 'required',
            'laporan' => 'required',
            'judul_laporan' => 'required',
        ];
    }

    public static function nonaktifTable()
    {
        return [
            'kondisi' => 'required',
            'keterangan' => 'required',
        ];
    }

    public static function opnameTable()
    {
        return [
            'kondisi' => 'required',
            'tanggal_opname' => 'required',
            'keterangan' => 'required'
        ];
    }
    
    public static function mutasiLokasiTable()
    {
        return [
            'penempatan_id' => 'required',
            'lokasi_id' => 'required',
        ];
    }

    public static function depresiasiTable()
    {
        return [
            'penempatan_id' => 'required',
        ];
    }

    public static function penempatanTable()
    {
        return [
            'penempatan_id' => 'required',
            'bagian_id' => 'required',
            'lokasi_id' => 'required',
            'tanggal_penempatan' => 'required'
        ];
    }

    public static function pengadaanTable()
    {
        return [
            'databarang_id' => 'required',
            'supplier_id' => 'required',
            'kondisi' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'tanggal_pengadaan' => 'required',
            'code' => 'min:3'
        ];
    }

    public static function lokasiTable()
    {
        return [
            'name' => 'required|min:3',
            'status_aktif' => 'required',
            'keterangan' => 'required'
        ];
    }

    public static function barangTable()
    {
        return [
            'name' => 'required|min:3',
            'satuan_id' => 'required',
            'merk_id' => 'required',
            'kategori_id' => 'required',
            'barcode' => 'required|min:3',
            'image' => 'file|image|max:3072'
        ];
    }

    public static function departemenTable()
    {
        return [
            'name' => 'required|min:3',
            'status_aktif' => 'required',
            'keterangan' => 'required'
        ];
    }

    public static function bagianTable()
    {
        return [
            'name' => 'required|min:3',
            'departemen_id' => 'required',
            'status_aktif' => 'required',
            'keterangan' => 'required'
        ];
    }

    public static function satuanTable()
    {
        return [
            'nama_satuan' => 'required|min:2|max:50'
        ];
    }

    public static function merkTable()
    {
        return [
            'nama_merk' => 'required|min:2|max:50'
        ];
    }

    public static function kategoriTable()
    {
        return [
            'name' => 'required|min:2|max:50'
        ];
    }

    public static function userTable()
    {
        return [
            'user_name' => 'required|min:3',
            'user_email' => 'required|min:7|max:15',
            'user_password' => 'sometimes|required|min:6|confirmed',
        ];
    }

    public static function userProfileTable()
    {
        return [
            'user_profile_nik_ektp' => 'required',
            'user_profile_gender' => 'required|in:laki-laki,perempuan',
            'user_profile_tempat_lahir' => 'required',
            'user_profile_tanggal_lahir' => 'required',
            'user_profile_alamat' => 'required',
            'user_profile_no_telp' => 'required',
        ];
    }

    public static function supplierTable()
    {
        return [
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'fax' => 'required',
            'email' => 'required',
            'cp' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
        ];
    }

    public static function settingTable()
    {
        return [
            'name' => 'required|unique:settings,name,' . request()->route('setting') . 'id',
            'value' => 'required'
        ];
    }

    public static function accountTable()
    {
        return [
            'account_name' => 'required|min:2',
            'account_number' => 'required|min:3|integer',
            'account_opening_balance' => 'sometimes|required',
            'account_bank_name' => 'nullable',
            'account_bank_address' => 'nullable',
            'account_bank_phone' => 'nullable',
            'account_enabled' => 'sometimes|required',
        ];
    }

    public static function paymentMethodTable()
    {
        return [
            'pm_name' => 'required|min:3',
        ];
    }

    public static function shippingTable()
    {
        return [
            'shipping_name' => 'required|min:3',
            'shipping_office_phone' => 'nullable',
            'shipping_office_address' => 'nullable',
        ];
    }

    public static function shipperTable()
    {
        return [
            'shipper_name' => 'required|min:3',
            'shipper_phone' => 'nullable',
            'shipper_address' => 'nullable',
        ];
    }
}
