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
        $validation = $request->validate([
            'kode_barang' => 'required|max:10|min:3',
            'nama_barang' => 'required|max:10|min:3'
        ],

        [
            'kode_barang.required' => 'Harus diisi!',
            'kode_barang.min' => 'Karakter minimal 3',
            'nama_barang.required' => 'Harus diisi!',
            'nama_barang.min' => 'Karakter minimal 3'
        ]
    );

        DB::table('data_barang')->insert([
            ['kode_barang' => $request->kode_barang, 'nama_barang' => $request->nama_barang]
        ]);
        return redirect()->route('crud')->with('message','Data Berhasil disimpan!');
    }

    public function delete($id)
    {
        DB::table('data_barang')->where('id', $id)->delete();

        return redirect()->back()->with('message','Data Berhasil dihapus!');
    }
}
