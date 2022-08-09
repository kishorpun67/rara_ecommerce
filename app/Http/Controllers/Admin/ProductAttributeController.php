<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Models\Product;
use Session;
class ProductAttributeController extends Controller
{

    public function productAttribute($id=null)
    {
        $product_attribute =ProductAttribute::orderBy('id', 'desc')->where('product_id', $id)->get();
        $product = Product::find($id);
        Session::flash('page', 'product');
        return view('admin.product.product_attribute', compact('product', 'product_attribute')); 
    }

    public function addProductAttribute($id=null)
    {
        if(request()->isMethod('post')) {
            $data = request()->all();
            // dd($data);
            foreach($data['sku'] as $key => $val) {
                if(!empty($val)) {
                    // Prevent duplicate sku check
                    $attrCount = ProductAttribute::where('sku',$val)->count();
                    if($attrCount>0){
                        return redirect()->back()->with('error_message', 'SKU already exits! Please another SKU.');
                    }
                      // Prevent duplicate sku check
                      $attrCount = ProductAttribute::where(['product_id'=>$id,  'size'=>$data['size'][$key]])->count();
                      if($attrCount>0){
                          return redirect()->back()->with('error_message', $data['size'][$key]."\n".'fSize already exits! Please another SKU.');
                      }
                    $attribute = new ProductAttribute;
                    $attribute->product_id = $id;
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->status=1;
                    $attribute->save();
                }
            }
            return redirect()->back()->with('success_message', 'Attributes has been added successfully!');
        }
    }
    public function editProductAttribute($id=null)
    {
        if(request()->isMethod('post')) {
            $data = request()->all();
            foreach($data['idAttr'] as $key => $attr) {
                if(!empty($attr)) {
                    ProductAttribute::where(['id'=>$attr, 'product_id'=>$id])->update(['price'=>$data['price'][$key], 'stock'=>$data['stock'][$key]]);
                }
            }
            return redirect()->back()->with('success_message', 'Attributes has been updated successfully!');
        }
    }

    public function deleteProductAttribute($id=null)
    {
        ProductAttribute::where('id',$id)->delete();
        return redirect()->back()->with('success_message', 'Product has been delete successfully!');
    }
}
