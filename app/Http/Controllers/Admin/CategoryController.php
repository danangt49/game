<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $data_category = Category::all();
        return view('admin.category.category', ['data_category' => $data_category]);
    }

    // public function store(Request $request)
    // {
    //     $this->validate($request,[
    //         'category_name' => 'required|string|max:20',
    //         'category_picture' => 'required'
    //     ],
    //     [
    //         'category_name.required' => 'This Category Name field is required',
    //         'category_picture.required' => 'This Category Picture field is required'
    //     ]);

    //     if($request->hasFile('category_picture')){
    //         $request->file('category_picture')->move('public/asset/category/',$request->file('category_picture')->getClientOriginalName());
    //         $picture = $request->file('category_picture')->getClientOriginalName();
    //         $data = [
    //             'category_name'	      => $request->category_name,
    //             'category_picture'    => $picture,
    //             'category_slug'       => str_slug($request->category_name),
    //             'parent_id'	          => $request->parent_id,
    //         ];
    //     }else{
    //         $data = [
    //             'category_name'	      => $request->category_name,
    //             'category_picture'    => '',
    //             'category_slug'       => str_slug($request->category_name),
    //             'parent_id'	          => $request->parent_id,
    //         ];
    //     }
    //     Category::create($data);
    //     return redirect('category')->with('success', 'Data added successfully');
    // }

    public function edit($id)
    {
        $category   = Category::find($id);
        $categories = Category::get();
        return view('admin.category.editCategory', [
            'category'   => $category,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'category_name'    => 'required|string|max:20',
                // 'category_picture' => 'required'
            ],
            [
                'category_name.required'    => 'Must be filled !!',
                // 'category_picture.required' => 'Must be filled !!'
            ]
        );
        $picturelama = $request->picturelama;
        if ($request->hasFile('category_picture')) {
            $request->file('category_picture')->move('public/asset/category', $request->file('category_picture')->getClientOriginalName());
            $picture = $request->file('category_picture')->getClientOriginalName();
            $data = [
                'category_name'             => $request->category_name,
                'category_picture'          => $picture,
                'category_slug'             => str_slug($request->category_name),
                'parent_id'                 => $request->parent_id,
            ];
        } else {
            $data = [
                'category_name'             => $request->category_name,
                'category_picture'          => $picturelama,
                'category_slug'             => str_slug($request->category_name),
                'parent_id'                 => $request->parent_id,
            ];
        }

        Category::where('id', $id)->update($data);
        return redirect('admin/category')->with('success', 'Data updated successfully');
    }


    // public function delete($id)
    // {
    //     $category = Category::find($id);
    //     File::delete('public/asset/category/' . $category->category_picture . '');
    //     $category->delete();
    //     return redirect('admin/category');
    // }
}
