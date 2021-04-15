<?php

namespace App\Http\Controllers\ApiAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiAdmin\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Fakultas;

class FakultasController extends BaseController
{
    public function getAllFakultas(){
        $fakultas = Fakultas::all();

        return $this->sendResponse($fakultas, 'Fakultas successfully.');
    }
        
    public function simpan(Request $request){
        $fakultas = new Fakultas();
        $fakultas->name = $request->name;
        $fakultas->save();

        return $this->sendResponse($fakultas, 'Simpan Fakultas successfully.');
    }
    
    public function update(Request $request,$id)
    {
        $data = [
            'name'	                => $request->name
        ];
        
        $fakultas = Fakultas::where('id',$id)->update($data);
        
        return $this->sendResponse($fakultas, 'Update Fakultas successfully.');
    }
    
    public function delete($id){
        $fakultas = Fakultas::find($id);
        $fakultas->delete();

        return $this->sendResponse($fakultas, 'Hapus Fakultas successfully.');
    }
}
