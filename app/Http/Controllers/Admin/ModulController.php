<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Modul;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function index()
    {
        return view('admin.modul.home');
    }

    public function json()
    {
        $data = Modul::get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '
                    <a class="btn btn-warning btn-xs" href="'.url('admin/modul-update/' . $row->id . '').'"><i class="fas fa-tools"></i></a>
                    <button data-id="' . $row->id . '"class="btn-xs btn btn-danger delete-modul"><i class="fas fa-trash-restore"></i></button>
                    ';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $modul  = Modul::get();
        return view('admin.modul.create', compact('modul'));
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->validate(
            $request,
            [
                'nama'              => 'required',
                'url_modul'         => 'required',
            ],
            [
                'nama.required'     => 'Must be filled !!!',
                'url_modul.required' => 'Must be filled !!!',
            ]
        );

        $data['nama']            = $request->nama;
        $data['url_modul']         = $request->url_modul;

        $id                        = $request->id;
        $d                        = Modul::where('id', '=', $id);

        if ($d->count() > 0) {
            Modul::where('id', '=', $id)->update($data);
            return redirect('admin/modul')->with('success', 'Data updated successfully');
        } else {
            Modul::create($data);
            return redirect('admin/modul')->with('success', 'Data added successfully');
        }
    }

    public function edit($id)
    {
        $modul     = Modul::find($id);
        return view('admin.modul.edit', compact('modul'));
    }

    public function update(Request $request, $id)
    {
        $modul = [
            'nama'          => $request->nama,
            'url_modul'      => $request->url_modul,
        ];
        Modul::where('id', $id)->update($modul);
        return redirect('admin/modul')->with('success', 'Data updated successfully');
    }

    public function destroy(Request $request)
    {
        $id                         = $request['id'];
        $modul                      = Modul::find($id);
        $modul->delete();
        return redirect('admin/modul')->with('success', 'Data Deleted Successfully');
    }
}
