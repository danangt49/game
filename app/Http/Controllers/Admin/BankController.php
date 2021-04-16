<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BankController extends Controller
{
    public function index()
    {
        $bank = Bank::all();
        return view('admin.bank.bank', compact('bank'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name'      => 'required|string',
                'rekening'  => 'required|max:20',
                'pemilik'   => 'required|string',
                'picture'   => 'required'
            ],
            [
                'name.required'     => 'Must be filled !!',
                'rekening.required' => 'Must be filled !!',
                'pemilik.required'  => 'Must be filled !!',
                'picture.required'  => 'Must be filled !!'
            ]
        );

        if ($request->hasFile('picture')) {
            $request->file('picture')->move('public/asset/bank/', $request->file('picture')->getClientOriginalName());
            $picture = $request->file('picture')->getClientOriginalName();
            $data = [
                'name'          => $request->name,
                'rekening'      => $request->rekening,
                'pemilik'      => $request->pemilik,
                'picture'     => $picture,
            ];
        } else {
            $data = [
                'name'          => $request->name,
                'rekening'      => $request->rekening,
                'pemilik'      => $request->pemilik,
                'picture'     => '',
            ];
        }
        Bank::create($data);
        return redirect('admin/bank')->with('success', 'Data added successfully');
    }

    public function edit($id)
    {
        $bank       = Bank::find($id);
        $banks      = Bank::get();
        return view('admin.bank.editbank', [
            'bank'  => $bank,
            'banks' => $banks
        ]);
    }

    public function update(Request $request, $id)
    {
        $picturelama = $request->picturelama;
        if ($request->hasFile('picture')) {
            $request->file('picture')->move('public/asset/bank/', $request->file('picture')->getClientOriginalName());
            $picture = $request->file('picture')->getClientOriginalName();
            $data = [
                'name'          => $request->name,
                'rekening'      => $request->rekening,
                'pemilik'      => $request->pemilik,
                'picture'    => $picture,
            ];
        } else {
            $data = [
                'name'          => $request->name,
                'rekening'      => $request->rekening,
                'pemilik'      => $request->pemilik,
                'picture'     => $picturelama,
            ];
        }

        Bank::where('id', $id)->update($data);
        return redirect('admin/bank')->with('success', 'Data updated successfully');
    }


    public function delete($id)
    {
        $bank = Bank::find($id);
        File::delete('public/asset/bank/' . $bank->picture . '');
        $bank->delete();
        return redirect('admin/bank');
    }
}
