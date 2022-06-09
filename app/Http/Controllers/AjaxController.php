<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;

class AjaxController extends Controller
{
    public function getProvince()
    {
        // Ambil semua data provinsi Indonesia
        $provinces = Province::all();
        return view('pages.customer.form.province')->with([
            'provinces' => $provinces
        ]);
    }

    public function getRegency($province_id)
    {
        // Ambil semua kabupaten yang berelasi dengan id provinsi yang dipilih
        $regency = Regency::where('province_id', $province_id)->get();
        return view('pages.customer.form.regency')->with([
            'regency' => $regency
        ]);
    }

    public function getDistrict($regency_id)
    {
        // Ambil semua kecamatan yang berelasi dengan id kabupaten yang dipilih
        $district = District::where('regency_id', $regency_id)->get();
        return view('pages.customer.form.district')->with([
            'district' => $district
        ]);
    }

    public function getVillage($district_id)
    {
        // Ambil semua desa yang berelasi dengan id kecamatan yang dipilih
        $village = Village::where('district_id', $district_id)->get();
        return view('pages.customer.form.village')->with([
            'village' => $village
        ]);
    }
}
