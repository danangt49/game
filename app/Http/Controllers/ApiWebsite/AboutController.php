<?php

namespace App\Http\Controllers\ApiAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiAdmin\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Tentang;

class AboutController extends BaseController
{
    public function getTentang(){
        $tentang = Tentang::first();

        return $this->sendResponse($tentang, 'Tentang successfully.');
    }
    
    public function update(Request $request,$id)
    {
        $data = [
            'nama_organisasi'	=> $request->nama_organisasi,
            'deskripsi'         => $request->deskripsi,
            'alamat'	        => $request->alamat,
            'no_telp'           => $request->no_telp,
            'email'	            => $request->email
        ];
        
        $tentang = Tentang::where('id',$id)->update($data);
        
        return $this->sendResponse($tentang, 'Update Tentang successfully.');
    }
}
