<?php

namespace App\Http\Controllers\ApiAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiAdmin\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends BaseController
{
    public function getCategories() {
        $categories = Category::orderBy('id', 'asc')->get();
        return $this->sendResponse($categories, 'Categories successfully.');
    }
    
    public function simpan(Request $request){
        
        // $this->validate($request,[
        //     'category_name' => 'required'
        // ],
        // [
        //     'category_name.required' => 'This Category Name field is required'
        // ]);
        
        // $data = $request->category_picture;

        if($request->hasFile('category_picture')){
            $request->file('category_picture')->move('public/asset/category/',$request->file('category_picture')->getClientOriginalName());
            $picture = $request->file('category_picture')->getClientOriginalName();
            $data = [
                'category_name'	      => $request->category_name,
                'category_picture'    => $picture,
                'category_slug'       => str_slug($request->category_name),
                'parent_id'	          => $request->parent_id,
            ];
        }else{
            $data = [
                'category_name'	      => $request->category_name,
                'category_picture'    => $request->category_picture,
                'category_slug'       => str_slug($request->category_name),
                'parent_id'	          => $request->parent_id,
            ];
        }
        
        Category::create($data);
        
        return $this->sendResponse($data, 'Simpan Categories successfully.');
    }
    
    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        
        return $this->sendResponse($category, 'Delete Categories successfully.');
    }
    
    public function update(Request $request,$id)
    {
        $picturelama =$request->picturelama;
        if($request->hasFile('category_picture')){
            $request->file('category_picture')->move('public/asset/category',$request->file('category_picture')->getClientOriginalName());
            $picture = $request->file('category_picture')->getClientOriginalName();
            $data = [
                'category_name'	      => $request->category_name,
                'category_picture'    => $picture,
                'category_slug'       => str_slug($request->category_name),
                'parent_id'	          => $request->parent_id,
            ];
        }else{
            $data = [
                'category_name'	      => $request->category_name,
                'category_picture'    => $picturelama,
                'category_slug'       => str_slug($request->category_name),
                'parent_id'	          => $request->parent_id,
            ];
        }
        
        $category = Category::where('id',$id)->update($data);
        
        return $this->sendResponse($category, 'Update Categories successfully.');
    }
}
