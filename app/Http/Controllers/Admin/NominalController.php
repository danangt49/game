<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Nominal;
use Illuminate\Http\Request;

class NominalController extends Controller
{
    public function index()
    {
        $nominal = Nominal::all();
        return view('admin.nominal.nominal', compact('nominal'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'nominal'                 => 'required|numeric',
            ],
            [
                'nominal.required'        => 'Harus Di isi dengan angka',
            ]
        );

        $data           = new Nominal;
        $data->nominal  = $request->nominal;
        $data->save();

        return redirect('admin/nominal')->with('success', 'Data added successfully');
    }

    public function edit($id)
    {
        $nominal       = Nominal::find($id);
        $nominals      = Nominal::get();
        return view('admin.nominal.editnominal', [
            'nominal'  => $nominal,
            'nominals' => $nominals
        ]);
    }

    public function update(Request $request, $id)
    {
        $nominal = Nominal::find($id);
        $nominal->update($request->all());
        return redirect('admin/nominal')->with('success', 'Data updated successfully');
    }


    public function delete($id)
    {
        $nominal = Nominal::find($id);
        $nominal->delete();
        return redirect('admin/nominal');
    }
}
