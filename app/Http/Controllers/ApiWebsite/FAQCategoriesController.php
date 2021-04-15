<?php

namespace App\Http\Controllers\ApiAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiAdmin\BaseController as BaseController;
use Illuminate\Http\Request;
use App\FAQCategory;

class FAQCategoriesController extends BaseController
{
    public function getAllFAQCategories(){
        $faq_categories = FAQCategory::all();

        return $this->sendResponse($faq_categories, 'Category FAQ successfully.');
    }
    
    public function simpan(Request $request){
        $faq_categories                     = new FAQCategory;
        $faq_categories->nama_kategori      = $request->category_name;
        $faq_categories->save();

        return $this->sendResponse($faq_categories, 'Simpan Category FAQ successfully.');
    }
    
    public function update(Request $request,$id)
    {
        $data = [
            'nama_kategori'	                => $request->nama_kategori
        ];
        
        $faq_categories = FAQCategory::where('id',$id)->update($data);
        
        return $this->sendResponse($faq_categories, 'Update FAQ Category successfully.');
    }
    
    public function delete($id){
        $faq_categories = FAQCategory::find($id);
        $faq_categories->delete();

        return $this->sendResponse($faq_categories, 'Hapus Category FAQ successfully.');
    }
}
