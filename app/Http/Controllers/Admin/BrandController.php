<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Brand;

class BrandController extends Controller
{
    public function brand()
    {
        $brands = Brand::orderBy("id", "Desc")->get();
        Session::flash('page', 'brand');
        return view('admin.brand.view_brand', compact('brands'));
    }

    public function addEditBrand(Request $request, $id=null)
    {
        if($id=="") {
            $brands = new Brand;
            $message = "Brand has been added successfully!";
        }
        else {
            $brands = Brand::find($id);
            $message = "Brand has been updated successfully!";
        }
        if($request->isMethod('post'))
        {
            if(empty($data['description']))
            {
                $data['description'] = "";
            }
            $data = $request->all();
            $brands->brand_name = $data['brand_name'];
            $brands->description = $data['description'];
            $brands->status = 1;
            $brands->save();
            return to_route('admin.brand')->with('success_message', $message);
        }
    }

    public function updateBrandStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            Brand::where('id', $data['brand_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'brand_id' =>$data['brand_id']]);
        }
    }
    public function deteteBrand($id)
    {
        Brand::where('id', $id)->delete();
        return redirect()->back()->with('success_message', 'Brand has been deleted successfully!');
    }
}
