<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class BannerController extends Controller
{
    public function index()
    {
        $data_banner = Banner::all();
        return view('admin.banner.banner', ['data_banner' => $data_banner]);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name'      => 'required|string|max:30',
                'picture'   => 'required',
            ],
            [
                'name.required'    => 'Must be filled !!',
                'picture.required' => 'Must be filled !!'
            ]
        );
        $file                       = $request->file('picture'); 
        if($file){
            $filename               =  time() .'-'.$file->getClientOriginalName();
            $path                   = 'public/asset/banner';
            $file->move($path,$filename);
            $data = [
                'name'	      => $request->name,
                'publish'	  => $request->statuspublish,
                'picture'     => $filename,
            ];
        }else{
            $data = [
                'name'	      => $request->name,
                'publish'	  => $request->statuspublish,
                'picture'     => '',
            ];
        }
        Banner::create($data);
        return redirect('admin/banner')->with('success', 'Data added successfully');
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.editbanner', [
            'banner' => $banner,
        ]);
    }

    public function update(Request $request, $id)
    {
        $file                       = $request->file('picture');   
        $picturelama	            = $request->picturelama;
        if($file){
            $filename               =  time() .'-'.$file->getClientOriginalName();
            $path                   = 'public/asset/banner';
            $file->move($path,$filename);
            $data = [
                'name'	      => $request->name,
                'publish'	  => $request->statuspublish,
                'picture'     => $filename,
            ];
            File::delete('public/asset/category/'.$picturelama);
        }else{
            $data = [
                'name'	      => $request->name,
                'publish'	  => $request->statuspublish,
                'picture'     => $picturelama,
            ];
        }
        
        Banner::where('id',$id)->update($data);
        return redirect('admin/banner')->with('success','Data updated successfully');
    }


    public function delete($id)
    {
        $banner = Banner::find($id);
        File::delete('public/asset/banner/' . $banner->picture . '');
        $banner->delete();
        return redirect('admin/banner');
    }
}
