<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\FAQ;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $data_faq            = FAQ::all();
        return view('admin.faq.Faq', ['data_faq' => $data_faq]);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title'         => 'required|string|max:191',
                'deskripsi'     => 'required|string'

            ],
            [
                'title.required'            => 'This Title field is required',
                'deskripsi.required'        => 'This Desciption field is required',

            ]
        );

        $data = [
            'title'               => $request->title,
            'deskripsi'              => $request->deskripsi
        ];

        FAQ::create($data);
        return redirect('admin/faq')->with('success', 'Successfully Added Data');
    }

    public function edit($id)
    {
        $faq_id             = FAQ::find($id);
        return view('admin.faq.editFaq', ['faq' => $faq_id]);
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'title'         => 'required',
                'deskripsi'     => 'required'

            ],
            [
                'title.required'            => 'This Title field is required',
                'deskripsi.required'        => 'This Deskripsi Name field is required',

            ]
        );

        $data = [
            'title'               => $request->title,
            'deskripsi'              => $request->deskripsi
        ];
        FAQ::where('id', $id)->update($data);
        return redirect('admin/faq')->with('success', 'Successfully Updated Data');
    }


    public function delete($id)
    {
        $faq = FAQ::find($id);
        $faq->delete();
        return redirect('admin/faq');
    }
}
