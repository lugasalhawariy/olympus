<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
     # KEBUTUHAN DATA DENGAN JQUERY
    public function getAllData()
    {
        // $data = DB::tables('customer')->get();
        $data = Customer::with('user')->get();
        return response()->json($data);
    }


    # KEBUTUHAN ROUTE DEFAULT
    public function index()
    {
        $users = User::all();
        return view('pages.customer.index', compact('users'));
    }

    public function edit($id)
    {
        $data = Customer::findOrFail($id);
        return view('pages.customer.edit', compact('data'));
    }

    public function store(Request $request)
    {
        Customer::create([
            'user_id' => $request->user_id,
            'referral_id' => 'CS_'.Str::random(10),
            'address' => $request->address,
            'kelurahan' => 'Tamanan Wetan',
            'kecamatan' => 'Banguntapan',
            'kota' => 'Bantul',
            'provinsi' => 'Yogyakarta',
            'latitude' => 200,
            'longitude' => -200,
            'kode_pos' => $request->kode_pos,
            'no_rekening' => mt_rand(1000000000, 9999999999),
            'buku_rekening' => mt_rand(1000000000, 9999999999)
        ]);

        return redirect()->route('customer.index');
    }

    public function update(Request $request)
    {
        $data = Customer::findOrFail($request->id);
        $user = User::findOrFail($request->user_id);

        $user->update([
            'first_name' => $request->first_name,
            'phone' => $request->phone
        ]);

        $data->update([
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return redirect()->route('customer.index');
    }

    public function show($id)
    {
        $data = Customer::findOrFail($id);
        return view('pages.customer.show', compact('data'));
    }
}
