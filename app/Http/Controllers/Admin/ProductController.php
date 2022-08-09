<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session; 
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Company;
use App\Models\Section;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::orderBy('id', 'desc')->with(['category','section'])->get();
        Session::flash('page', 'product');
        return view('admin.product.products_view', compact('products'));
    }
    public function updateProductStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            if($data['status']=="Active") {
               $status = 0;
            }else {
                $status = 1;
             }
            Product::where('id', $data['product_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'product_id' =>$data['product_id']]);
        }
    }
    public function addEditProduct(Request $request, $id=null)
    {
        
        if($id==null) {
            $title = "Add Product";
            $button ="Submit";
            $product = new Product;
            $products = array();
            $message = "Product has been added successfully!";
        }else{
            $title = "Edit Product";
            $button ="Update";
            $product = Product::find($id);
            $products = Product::find($id);
            $message = "Product has been update successfully!";
        }
        if($request->isMethod('post')) {
            $data = $request->all();
            
                // Product validations
            $rules = [
                'category_id' => 'required',
                'brand_id' => 'required',
                'section_id' => 'required',
                'product_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'product_price' => 'required|numeric',
                'url' => 'required',
                'product_discount' => '',
                'product_code' => 'required|numeric',
                'product_color' => 'required|regex:/^[\pL\s\-]+$/u',
                'product_weight' =>'',
                'fabric' => '',
                'pattern' =>'',
                'occassion' => '',
                'description' => '',
                'meta_description' => '',
                'wash_care' => '',
                'sleeve' => '',
                'fit' => '',
                'meta_title' =>'',
                'meta_keywords' =>'',
                'is_feature' => '',
            ];
            $customMessages = [
                'category_id.required'=> 'Category is required',
                'url.required' => 'Url is required',
                'section_id.required'=> 'Section is required',
                'brand_id.required'=> 'Brand is required',
                'product_name.required'=> 'Product Name is required',
                'product_name.regex'=> 'Valid Product Name is required',
                'product_price.required'=> 'Product Price is required',
                'product_price.regex'=> ' Product Price is required',
                'product_color.required'=> 'Valid Product Color is required',
                'product_color.regex'=> ' Product Color is required',
                'product_code.required'=> 'Product Code is required',
                'product_code.numeric'=> 'Valid Product Code is required',
            ];
            $this->validate($request, $rules, $customMessages);
            

            if(empty($data['product_discount']))
            {
                $data['product_discount'] = 0;
            }

            if(empty($data['description']))
            {
                $data['description'] = "";
            }

            if(empty($data['product_weight']))
            {
                $data['product_weight'] = "";
            }

            if(empty($data['wash_care']))
            {
                $data['wash_care'] = "";
            }

            if(empty($data['meta_title']))
            {
                $data['meta_title'] = "";
            }

            if(empty($data['meta_keywords']))
            {
                $data['meta_keywords'] = "";
            }

            if(empty($data['meta_description']))
            {
                $data['meta_description'] = "";
            }

            if($data['sleeve']=="")
            {
                $data['sleeve'] = "";
            }

            if($data['pattern']=="")
            {
                $data['pattern'] = "";
            }

            if($data['fabric']=="")
            {
                $data['fabric'] = "";
            }

            if($data['fit']=="")
            {
                $data['fit'] = "";
            }
            if($data['occassion']=="")
            {
                $data['occassion'] = "";
            }

            if(empty($data['is_feature']))
            {
                $is_feature ="No";
            }else{
                $is_feature ="Yes";
            }
            if(!empty($data['image'])){
                // dd($data['image']);
                $filename = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->storeAs('public/images/product_image/', $filename);
                $product->main_image = 'storage/images/product_image/'.$filename;
            }
            // $categoryDetalils = Category::find($data['category_id']);
            $product->section_id = $data['section_id'];
            $product->category_id = $data['category_id'];
            $product->brand_id = $data['brand_id'];
            $product->company_id = 1;
            $product->product_name = $data['product_name'];
            $product->product_price = $data['product_price'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            $product->product_discount = $data['product_discount'];
            $product->product_weight = $data['product_weight'];
            $product->fabric = $data['fabric']; 
            $product->url = $data['url'];
            $product->pattern = $data['pattern'];
            $product->pattern = $data['pattern'];
            $product->sleeve = $data['sleeve'];
            $product->fit = $data['fit'];
            $product->occassion = $data['occassion'];
            $product->description = $data['description'];
            $product->wash_care = $data['wash_care'];
            $product->meta_title = $data['meta_title'];
            $product->meta_keywords = $data['meta_keywords'];
            $product->meta_description = $data['meta_description'];
            $product->is_featured =$is_feature ;
            $product->status = 1;
            $product->save();
            return to_route('admin.product')->with('success_message', $message);
        }
        $fabric = array('Cotton', 'Polyserter', 'Woll');
        $sleeve = array('Full Sleeve', 'Half Sleeve', 'Short Sleeve', 'Sleeveless');
        $pattern = array('Checked', 'Plain', 'Printed', 'Self', 'Solid');
        $fit = array('Regular', 'Slim');
        $occassion = array('Casual', 'formal');
        $categories = Category::with('subcategories')->where(['parent_id' =>0])->where('status',1)->get();
        // $categories= json_decode(json_encode($categories),true);
        $section = Section::get();
        $brands = Brand::where('status',1)->get();
        $company = Company::where('status',1)->get();
        Session::flash('page', 'product');
        return view('admin.product.add_edit_product', compact('section','title','button','categories', 'products','brands','company','fabric','sleeve','pattern','fit','occassion'));
    }
    public function deleteProduct($id)
    {
      $id = Product::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Product has been delete successfully!');

    }

    public function deleteProductImage($id)
    {
        // Get product image
        $product_image= Product::select('product_image')->where('id',$id)->first();

        // Get image path
        // $product_image_small = 'image/product_image/small/';
        // $product_image_medium = 'image/product_image/medium/';
        $product_image_large = 'image/product_image/large/';
        // if(file_exists($product_image_small.$product_image->product_image)) {
        //     unlink($product_image_small.$product_image->product_image);
        // }
        // if(file_exists($product_image_medium.$product_image->product_image)) {
        //     unlink($product_image_medium.$product_image->product_image);
        // }
        if(file_exists($product_image_large.$product_image->product_image)) {
            unlink($product_image_large.$product_image->product_image);
        }
        return redirect()->back()->with('success_message', 'Product Image has been delete successfully!');

    }
}
