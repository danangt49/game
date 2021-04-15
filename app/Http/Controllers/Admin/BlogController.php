<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\CategoryMenu;
use App\Blog;
use App\Category;
use App\Setting;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.home');
    }

    public function json()
    {
        $data = Blog::get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '
                    <a class="btn btn-warning btn-xs" href="'.url('admin/blog-update/' . $row->id . '').'"><i class="fas fa-tools"></i></a>
                    <button data-id="' . $row->id . '"class="btn-xs btn btn-danger delete-blog"><i class="fas fa-trash-restore"></i></button>
                    ';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $kategori  = CategoryMenu::get();
        $blog      = Blog::all();
        return view('admin.blog.create', compact('kategori', 'blog'));
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->validate(
            $request,
            [
                'judul'                         => 'required',
                'kategori'                      => 'required',
                'konten'                        => 'required',
                'caption'                       => 'required',
                'image'                         => 'mimes:jpeg,png,jpg|max:4096',
                'penulis'                       => 'required',
                'statuspublish'                 => 'required',
                'statusshow_penulis'            => 'required',
            ],
            [
                'judul.required'                => 'Must be filled !!!',
                'kategori.required'             => 'Must be filled !!!',
                'konten.required'               => 'Must be filled !!!',
                'caption.required'              => 'Must be filled !!!',
                'image.required'                => 'Must be filled !!!',
                'penulis.required'              => 'Must be filled !!!',
                'statuspublish.required'        => 'Must be filled !!!',
                'statusshow_penulis.required'   => 'Must be filled !!!',
            ]
        );

        $file                                   = $request->file('image');
        $imglama                                = $request->imagelama;
        if ($file) {
            $filename                           = time() . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $path                               = 'public/asset/blog';
            $file->move($path, $filename);
            $data = [
                'judul'                         => $request->judul,
                'slug'                          => Str::slug($request->judul, '-'),
                'kategori'                      => $request->kategori,
                'konten'                        => $request->konten,
                'penulis'                       => $request->penulis,
                'caption'                       => $request->caption,
                'show_penulis'                  => $request->statusshow_penulis,
                'publish'                       => $request->statuspublish,
                'gambar'                        => $filename,
                'meta_keyword'                  => $request->meta_keyword,
                'meta_deskripsi'                => $request->meta_deskripsi
            ];
            File::delete(public_path('img/' . $imglama));
            $id                                 = $request->id;
            $d                                  = Blog::where('id', '=', $id);
        } else {
           $data = [
                'judul'                         => $request->judul,
                'slug'                          => Str::slug($request->judul, '-'),
                'kategori'                      => $request->kategori,
                'konten'                        => $request->konten,
                'penulis'                       => $request->penulis,
                'caption'                       => $request->caption,
                'show_penulis'                  => $request->statusshow_penulis,
                'publish'                       => $request->statuspublish,
                'gambar'                        => $imglama,
                'meta_keyword'                  => $request->meta_keyword,
                'meta_deskripsi'                => $request->meta_deskripsi
            ];
            $id                                 = $request->id;
            $d                                  = Blog::where('id', '=', $id);
        }
        if ($d->count() > 0) {
            Blog::where('id', '=', $id)->update($data);
            return redirect('admin/blog')->with('success', 'Data updated successfully');
        } else {
            Blog::create($data);
            return redirect('admin/blog')->with('success', 'Data added successfully');
        }
    }

    public function edit($id)
    {
        $kategori  = CategoryMenu::get();
        $blog     = Blog::find($id);
        return view('admin.blog.edit', compact('blog', 'kategori'));
    }

    public function update(Request $request,$id)
    {
        $this->validate(
            $request,
            [
                'judul'                         => 'required',
                'kategori'                      => 'required',
                'konten'                        => 'required',
                'caption'                       => 'required',
                'penulis'                       => 'required',
                'statuspublish'                 => 'required',
                'statusshow_penulis'            => 'required',
            ],
            [
                'judul.required'                => 'Must be filled !!!',
                'kategori.required'             => 'Must be filled !!!',
                'konten.required'               => 'Must be filled !!!',
                'caption.required'              => 'Must be filled !!!',
                'penulis.required'              => 'Must be filled !!!',
                'statuspublish.required'        => 'Must be filled !!!',
                'statusshow_penulis.required'   => 'Must be filled !!!',
            ]
        );
        // $id                                  = $request->id;
        $file                                   = $request->file('image');
        $imglama                                = $request->imagelama;

        if ($file) {
            $filename                           = time() . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $path                               = 'public/asset/blog';
            $file->move($path, $filename);
            $data = [
                'judul'                         => $request->judul,
                'slug'                          => Str::slug($request->judul, '-'),
                'kategori'                      => $request->kategori,
                'konten'                        => $request->konten,
                'penulis'                       => $request->penulis,
                'caption'                       => $request->caption,
                'show_penulis'                  => $request->statusshow_penulis,
                'publish'                       => $request->statuspublish,
                'gambar'                        => $filename,
                'meta_keyword'                  => $request->meta_keyword,
                'meta_deskripsi'                => $request->meta_deskripsi
            ];
            unlink('public/asset/blog/'.$imglama);
        } else {
            $data = [
                'judul'                         => $request->judul,
                'slug'                          => Str::slug($request->judul, '-'),
                'kategori'                      => $request->kategori,
                'konten'                        => $request->konten,
                'penulis'                       => $request->penulis,
                'caption'                       => $request->caption,
                'show_penulis'                  => $request->statusshow_penulis,
                'publish'                       => $request->statuspublish,
                'gambar'                        => $imglama,
                'meta_keyword'                  => $request->meta_keyword,
                'meta_deskripsi'                => $request->meta_deskripsi
            ];
        }
        Blog::where('id', '=', $id)->update($data);
        return redirect('admin/blog')->with('success', 'Data updated successfully');
    }

    public function destroy(Request $request)
    {

        $id                     = $request['id'];
        $blog                   = Blog::find($id);
        File::delete('public/asset/blog/' . $blog->gambar);
        $blog->delete();
        return redirect('admin/blog')->with('success', 'Data Deleted Successfully');
    }
}
