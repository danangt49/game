<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Activity;
use App\Display;
use App\Book;

class DisplayController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id) {
        $displaysKoleksi = Display::where('displays.id', '1')->with(['books' => function($query) use($id) { 
            $query->where('user_id', $id)->groupBy('books.id')->orderBy('created_at', 'DESC');
        }])->get();
        $displaysHome = Display::with('books')->where('displays.id', '!=', '1')->get();
        $display = collect([$displaysKoleksi, $displaysHome])->flatten(1);
        
        $user = $request->user();
        
        $activity = new Activity;
        $activity->user_id = $user->id;
        $activity->description_activity = 'Mengakses Halaman Dashboard Pada Aplikasi Unisma FEB Digital Library';
        $activity->menu_name = 'Dashboard';
        $activity->save();
      
      return $this->sendResponse($display, 'Display successfully.');
    //   $displays = Display::with('books')
    //   ->where('id', '!=', '1')
    //   ->get();
    //   return $this->sendResponse($displays, 'Display successfully.');
      
    //   $Rekomendasi = [
    //     'id' => '1',
    //     'title_display' => 'Buku Rekomendasi',
    //     'subtitle_display' => 'Rekomendasi Buku cerita untuk anda',
    //     'books' => Book::orderBy('created_at', 'desc')->take(4)->get()
    //   ];

    //   $Populer = [
    //     'id' => '2',
    //     'title_display' => 'Buku Populer',
    //     'subtitle_display' => 'Koleksi buku-buku terbaru',
    //     'books' => Book::take(5)->get(),
    //   ];
      
    //   $display = 
    //     [$Rekomendasi, $Populer]
    //   ;

      return $this->sendResponse($display, 'Display successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user_id = $request->user()->id;
        
        $activity = new Activity;
        
        if($id == 1) {
            $display = Display::with(['books' => function($query) use($user_id) { 
                $query->where('user_id', $user_id);
            }])->find($id);
            
            $activity->user_id = $user_id;
            $activity->description_activity = 'Mengakses Halaman Koleksi Saya Pada Aplikasi Unisma FEB Digital Library';
            $activity->menu_name = 'Koleksi Saya';
            $activity->save();
            
        } else {
            $display = Display::with('books')->find($id);
            
            $cari_nama_display = Display::where('id', $id)->selectRaw("title_display")->pluck('title_display');
            $nama_display = str_replace(array('[',']'),'',$cari_nama_display);
            $hasil = json_decode($nama_display);
            $activity->user_id = $user_id;
            $activity->description_activity = "Mengakses Halaman $hasil Pada Aplikasi Unisma FEB Digital Library";
            $activity->menu_name = $hasil;
            $activity->save();
        }
        
        return $this->sendResponse($display, 'Display successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}