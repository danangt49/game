<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\CategoryMenu;
use Illuminate\Http\Request;

class CategoryMenuController extends Controller
{
    public function index()
    {
        $data   = CategoryMenu::all();
        return view('admin.categorymenu.home',['data' => $data]);   
    }

    public function edit($id)
    {
        $category   = CategoryMenu::find($id);
        $categories = CategoryMenu::get();
        return view('admin.categorymenu.edit',[
            'category'   => $category,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'              => 'required|string|max:30',
            'parent'            => 'required|string',
           

            'nama.required'     => 'Must be filled !!!',
            'parent.required'   => 'Must be filled !!!',
        
        ]);
        
        $data=[
            'kategori'		    => $request->nama,
            '_parent' 		    => $request->parent,
            '_slug'		        => Str::slug($request->nama,'-'),
        ];
        
        CategoryMenu::create($data);
        return redirect('admin/categorymenu')->with('success','Data Added Successfully');
    }

    public function delete($id)
    {       
        $category               = CategoryMenu::find($id);
        $category->delete();
        return redirect('admin/categorymenu')->with('success','Data Deleted Successfully');
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama'             => 'required|string|max:30',
            'parent'           => 'required|string',
           

            'nama.required'    => 'Must be filled !!!',
            'parent.required'  => 'Must be filled !!!',
        
        ]);
        
        $data = [
            'kategori'		    => $request->nama,
            '_parent' 		    => $request->parent,
            '_slug'		        => Str::slug($request->nama,'-'),
        ];
    
        CategoryMenu::where('id',$id)->update($data);
        return redirect('admin/categorymenu')->with('success','Data Updated Successfully');
    }
}