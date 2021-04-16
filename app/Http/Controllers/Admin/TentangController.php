<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Tentang;

class TentangController extends Controller
{
    public function index()
    {
        $data_tentang = Tentang::Find(1);
        return view('admin.tentang.tentang', ['data_tentang' => $data_tentang]);
    }

    public function store(Request $request)
    {
        $tentang = Tentang::Find(1);
        $tentang->nama_organisasi   = $request->nama_organisasi;
        $tentang->deskripsi         = $request->deskripsi;
        $tentang->email             = $request->email;
        $tentang->alamat            = $request->alamat;
        $tentang->no_telp           = $request->no_telp;
        $tentang->save();

        return redirect('admin/tentang')->with('success', 'Data updated successfully');
    }
}
