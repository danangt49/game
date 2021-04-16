<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Game;
use App\Category;
use App\GameCategory;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

class GameController extends Controller
{
    public function index()
    {
        return view('admin.games.home');
    }

    public function json()
    {
        $data = Game::get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a class="btn btn-warning btn-xs" href="'.url('admin/games/' . $row->id .'').'"><i class="fas fa-tools"></i></a>
                <button data-id="' . $row->id . '"class="btn-xs btn btn-danger delete-game"><i class="fas fa-trash-restore"></i></button>
                ';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $kategori  = Category::get();
        return view('admin.games.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'category_id'           => 'required',
                'title'                 => 'required',
                'description'           => 'required',
                'picture'               => 'mimes:jpeg,png,jpg|max:2048'
            ],
            [
                'category_id.required'  => 'Must be filled !!!',
                'title.required'        => 'Must be filled !!!',
                'description.required'  => 'Must be filled !!!',
                'picture.required'      => 'Must be filled !!!',
            ]
        );

        $picture                        = $request->file('picture');
        if ($picture) {
            $gambar                     = time() . Str::slug($request->title) . '.' . $picture->getClientOriginalExtension();
            $path                       = 'public/asset/game';
            $picture->move($path, $gambar);

            $data = [
                'category_id'           => $request->category_id,
                'title'                 => $request->title,
                'slug'	                => Str::slug($request->title,'-'),
                'description'           => $request->description,
                'picture'               => $gambar,
            ];
        }
        $data_insert2 = new GameCategory;
        Game::create($data);
        return redirect('admin/games')->with('success', 'Data added successfully');
    }

    public function edit($id)
    {
        $kategori                       = Category::get();
        $games                          = Game::find($id);
        return view('admin.games.edit', compact('games', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id'               => 'required',
            'title'                     => 'required',
            'description'               => 'required',
            'logo'                      => 'mimes:jpeg,png,jpg|max:2048',
            'picture'                   => 'mimes:jpeg,png,jpg|max:2048',
        ]);

        $picture                        = $request->file('picture');
        $picturelama                    = $request->picturelama;
        if ($picture) {
                $gambar                 = time() . Str::slug($request->title) . '.' . $picture->getClientOriginalExtension();
                $path                   = 'public/asset/game';
                $picture->move($path, $gambar);

                $data= [
                    'category_id'           => $request->category_id,
                    'title'                 => $request->title,
                    'slug'	                => Str::slug($request->title,'-'),
                    'description'           => $request->description,
                    'picture'               => $gambar,
                    'statusgame'            => $request->statusgame,
                ];
                 unlink($path.'/'.$picturelama);
        } else {
            $data= [
                'category_id'           => $request->category_id,
                'title'                 => $request->title,
                'slug'	                => Str::slug($request->title,'-'),
                'description'           => $request->description,
                'picture'               => $picturelama,
                'statusgame'            => $request->statusgame,
            ];
        }

        Game::where('id', '=', $id)->update($data);
        return redirect('admin/games')->with('success', 'Data updated successfully');
    }


    public function destroy(Request $request)
    {
        $id                             = $request['id'];
        $game                           = Game::find($id);
        File::delete('public/asset/game/' . $game->picture . '');
        File::delete('public/asset/logo/' . $game->logo . '');
        $game->delete();
        return redirect('admin/games')->with('success', 'Data Deleted Successfully');
    }
}
