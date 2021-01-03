<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index()
    {
        $data_barang = DB::table('data_barang')->paginate(5);
        return view('crud',['data_barang' => $data_barang]);
    }

    public function tambah()
    {
        return view('tambah_data');
    }

    public function simpan(Request $request)
    {
        DB::table('data_barang')->insert([
            ['kode_barang' => $request->kode_barang, 'nama_barang' => $request->nama_barang]
        ]);
        return redirect()->route('crud');
    }

    public function delete($id)
    {
        DB::table('data_barang')->where('id', $id)->delete();

        return redirect()->back();
    }
}
