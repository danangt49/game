<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdsController extends Controller
{
    public function index()
    {
        $data_ads = Ads::all();
        return view('admin.ads.ads', ['data_ads' => $data_ads]);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'picture'   => 'required',
            ],
            [
                'picture.required' => 'Must be filled !!'
            ]
        );
        $file                       = $request->file('picture'); 
        if($file){
            $filename               =  time() .'-'.$file->getClientOriginalName();
            $path                   = 'public/asset/ads';
            $file->move($path,$filename);
            $data = [
                'picture'     => $filename,
            ];
        }else{
            $data = [
                'picture'     => '',
            ];
        }
        ads::create($data);
        return redirect('admin/ads')->with('success', 'Data added successfully');
    }

    public function edit($id)
    {
        $ads = ads::find($id);
        return view('admin.ads.editads', [
            'ads' => $ads,
        ]);
    }

    public function update(Request $request, $id)
    {
        $file                       = $request->file('picture');   
        $picturelama	            = $request->picturelama;
        if($file){
            $filename               =  time() .'-'.$file->getClientOriginalName();
            $path                   = 'public/asset/ads';
            $file->move($path,$filename);
            $data = [
                'picture'     => $filename,
            ];
            File::delete('public/asset/ads/'.$picturelama);
        }else{
            $data = [
                'picture'     => $picturelama,
            ];
        }
        
        ads::where('id',$id)->update($data);
        return redirect('admin/ads')->with('success','Data updated successfully');
    }


    public function delete($id)
    {
        $ads = ads::find($id);
        File::delete('public/asset/ads/' . $ads->picture . '');
        $ads->delete();
        return redirect('admin/ads');
    }
}
