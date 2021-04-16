<?php

namespace App\Http\Controllers\ApiAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiAdmin\BaseController as BaseController;
use Illuminate\Http\Request;
use App\FAQ;

class FAQController extends BaseController
{
    public function getAllFAQ(){
        $faq = FAQ::with('faq_category')->orderBy('faqcategory_id', 'asc')->get();

        return $this->sendResponse($faq, 'FAQ successfully.');
    }
    
    public function simpan(Request $request){
        $faq = new FAQ();
        $faq->faqcategory_id = $request->parent_id;
        $faq->title = $request->title;
        $faq->deskripsi = $request->deskripsi;
        $faq->save();

        return $this->sendResponse($faq, 'Simpan FAQ successfully.');
    }
    
    public function update(Request $request,$id)
    {
        $data = [
            'faqcategory_id'	    => $request->faqcategory_id,
            'title'	                => $request->title,
            'deskripsi'	            => $request->deskripsi
        ];
        
        $faq = FAQ::where('id',$id)->update($data);
        
        return $this->sendResponse($faq, 'Update FAQ successfully.');
    }
    
    public function delete($id){
        $faq = FAQ::find($id);
        $faq->delete();

        return $this->sendResponse($faq, 'Hapus FAQ successfully.');
    }
}
