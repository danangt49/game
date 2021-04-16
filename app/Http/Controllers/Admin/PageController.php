<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Page;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.page.home');
    }

    public function json()
    {
        $data = Page::get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '
                    <a class="btn btn-warning btn-xs" href="'.url('admin/page-update/' . $row->id . '').'"><i class="fas fa-tools"></i></a>
                    <button data-id="' . $row->id . '"class="btn-xs btn btn-danger delete-page"><i class="fas fa-trash-restore"></i></button>
                    ';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $page  = Page::get();
        return view('admin.page.create', compact('page'));
    }

    public function store(Request $request)
    {
        $data['nama_laman']             = $request['nama_laman'];
        $data['pages_seo']	            = Str::slug($request['nama_laman'],'-');
        $data['konten']                 = $request['konten'];
        $data['status']                 = $request['status'];
        $data['layout']                 = $request['layout'];
        $data['meta_keyword']           = $request['meta_keyword'];
        $data['meta_deskripsi']         = $request['meta_deskripsi'];
        $data['posisi']                 = $request['posisi'];

        $id                             = $request->id;
        $d                              = Page::where('id', '=', $id);

        if ($d->count() > 0) {
            Page::where('id', '=', $id)->update($data);
            return redirect('admin/page')->with('success', 'Data updated successfully');
        } else {
            Page::create($data);
            return redirect('admin/page')->with('success', 'Data added successfully');
        }
    }

    public function edit($id)
    {
        $page     = Page::find($id);
        return view('admin.page.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $page = [
            'nama_laman'                => $request->nama_laman,
            'pages_seo'	                => Str::slug($request->nama_laman,'-'),
            'konten'                    => $request->konten,
            'status'                    => $request->status,
            'layout'                    => $request->layout,
            'posisi'                    => $request->posisi,
            'meta_keyword'              => $request->meta_keyword,
            'meta_deskripsi'            => $request->meta_deskripsi,
        ];
        Page::where('id', $id)->update($page);
        return redirect('admin/page')->with('success', 'Data updated successfully');
    }


    public function destroy(Request $request)
    {
        $id                         = $request['id'];
        $pages                      = Page::find($id);
        $pages->delete();
        return redirect('admin/page')->with('success', 'Data Deleted Successfully');
    }
}
