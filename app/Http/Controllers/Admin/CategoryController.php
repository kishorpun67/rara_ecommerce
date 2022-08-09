<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Category;
use Image;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function categories()
    {
        $results = Category::orderBy("id", "Desc")->with(['parentcategory'])->get();
        Session::flash('page', 'category');
        return view('admin.categories.view_categories', compact('results'));
    }
    public function updateCategoryStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            if($data['status']=="Active") {
               $status = 0;
            }else {
                $status = 1;
             }
             Category::where('id', $data['category_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'category_id' =>$data['category_id']]);
        }
    }
    public function addEditCategory(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Category";
            $button ="Submit";
            $category = new Category;
            $categorydata = array();
            $categories = Category::with('subcategories')->where(['parent_id' =>0])->get();
            $message = "Category has been added sucessfully";
        }else{
            $title = "Edit Category";
            $button ="Update";
            $categorydata = Category::where('id',$id)->first();
            $categorydata= json_decode(json_encode($categorydata),true);
            $category = Category::find($id);
            $message = "Category has been updated sucessfully";
        }
        if($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'category_name' => 'required',
                'parent_id' => 'required',
                'url' => 'required',
            ];

            $customMessages = [
                'category_name.required' => 'Category name is required!',
                'parent_id.required' => 'Category level is required!',
                'url.required' => 'Url is required',
            ];
            $this->validate($request, $rules, $customMessages);
            if(!empty($data['image'])){
                // dd($data['image']);
                $filename = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->storeAs('public/images/category_image/', $filename);
                $category->category_image = 'storage/images/category_image/'.$filename;
            }
            if(empty($data['category_discount']))
            {
                $data['category_discount'] = 0;
            }
            if(empty($data['description']))
            {
                $data['description'] = "";
            }
            if(empty($data['meta_title']))
            {
                $data['meta_title'] = "";
            }
            if(empty($data['meta_description']))
            {
                $data['meta_description'] = "";
            }
            if(empty($data['meta_keywords']))
            {
                $data['meta_keywords'] = "";
            }

            $category->parent_id = $data['parent_id'];
            $category->category_name = $data['category_name'];
            $category->category_discount = $data['category_discount'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keywords = $data['meta_keywords'];
            $category->status = 1;
            $category->save();
            Session::flash('success_message', $message);
            return to_route('admin.categories');
        }
        $categories = Category::with('subcategories')->where(['parent_id' =>0])->get();
        $categories= json_decode(json_encode($categories),true);
        Session::flash('page', 'category');
        return view('admin.categories.add_edit_category', compact('title','button','categorydata','categories'));
    }
    public function deleteCategory($id)
    {
      $id =Category::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Category has been delete successfully!');
    }
    public function deleteCategoryImage($id)
    {
        // Get category image
        $category_image= Category::select('category_image')->where('id',$id)->first();

        // Get image path
        $category_image_path = 'image/category_image/';
        if(file_exists($category_image_path.$category_image->category_image)) {
            unlink($category_image_path.$category_image->category_image);
        }
        return redirect()->back()->with('success_message', 'Category Image has been delete successfully!');
    }
}
