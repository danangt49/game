<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $data = Setting::Find(1);
        return view('admin.setting.home', ['data' => $data]);
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'icon'    => 'mimes:png|max:2048',
            'favicon' => 'mimes:png|max:1024',

        ]);
        
        $id                = $request->id;
        $faviconlama	   = $request->faviconlama;
        $logolama	       = $request->logolama;
        if($request->file('logo') || $request->file('favicon')){
            if($request->file('logo') && $request->file('favicon')){
              
                $logo        = "logo.".$request->file('logo')->getClientOriginalExtension();
                $request->file('logo')->move('public/asset/img',$logo);
                // unlink('public/asset/img/'.$logolama);
             
                $favicon     = "favicon.".$request->file('favicon')->getClientOriginalExtension();
                $request->file('favicon')->move('public/asset/img',$favicon);
                // unlink('public/asset/img/'.$faviconlama);
            }else
            if($request->file('logo') && $request->file('favicon')==''){
                $logo        = "logo.".$request->file('logo')->getClientOriginalExtension();
                $request->file('logo')->move('public/asset/img',$logo);
                // unlink('public/asset/img/'.$logolama);

                $favicon     = $faviconlama;
            }else
            if($request->file('logo')=='' && $request->file('favicon')){
              $logo        = $logolama;

              $favicon     = "favicon.".$request->file('favicon')->getClientOriginalExtension();
              $request->file('favicon')->move('public/asset/img',$favicon);
            }
            $data = [
                'nama'                => $request->nama,
                'slogan'              => $request->slogan,
                'deskripsi_situs'	  => $request->deskripsi_situs,
                'meta_deskripsi'	  => $request->meta_deskripsi,
                'meta_keyword'	      => $request->meta_keyword,
                'telepon'		      => $request->telepon,
                'website'		      => $request->website,
                'alamat'		      => $request->alamat,
                'email_website'	      => $request->email_website,
                'pemilik'		      => $request->pemilik,
                'favicon'		      => $favicon,
                'logo'		          => $logo,
                'facebook'		      => $request->facebook,
                'twitter'		      => $request->twitter,
                'instagram'		      => $request->instagram,
                'youtube'		      => $request->youtube,
            ];
          
        }
        else {
            $data = [
                'nama'                => $request->nama,
                'slogan'              => $request->slogan,
                'deskripsi_situs'	  => $request->deskripsi_situs,
                'meta_deskripsi'	  => $request->meta_deskripsi,
                'meta_keyword'	      => $request->meta_keyword,
                'telepon'		      => $request->telepon,
                'website'		      => $request->website,
                'alamat'		      => $request->alamat,
                'email_website'	      => $request->email_website,
                'pemilik'		      => $request->pemilik,
                'favicon'		      => $faviconlama,
                'logo'		          => $logolama,
                'facebook'		      => $request->facebook,
                'twitter'		      => $request->twitter,
                'instagram'		      => $request->instagram,
                'youtube'		      => $request->youtube,
            ];
        
        }
        Setting::where('id', $id)->update($data);
        return redirect('admin/setting')->with('success','Data Updated Successfully');
        
    }
}
