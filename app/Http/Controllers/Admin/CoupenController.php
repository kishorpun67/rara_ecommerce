<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupen;
use Session;

class CoupenController extends Controller
{
    public function Coupen()
    {
        $coupen = Coupen::get();
        Session::flash('page', 'coupen');
        return view('admin.coupen.view_coupen', compact('coupen'));
    }
    public function updateCoupenStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            if($data['status']=="Active") {
               $status = 0;
            }else {
                $status = 1;
             }
             Coupen::where('id', $data['coupen_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'coupen_id' =>$data['coupen_id']]);
        }
    }
    public function addEditCoupen(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Coupen";
            $button ="Submit";
            $coupen = new Coupen;
            $coupendata = array();
            $message = "Coupen has been added sucessfully!";
        }else{
            $title = "Edit Coupen";
            $button ="Update";
            $coupen = Coupen::where('id',$id)->first();
            $coupendata= json_decode(json_encode($coupen),true);
            $coupen = Coupen::find($id);
            $message = "Coupen has been updated sucessfully!";
        }
        if($request->isMethod('post')) {
            $data = $request->all();
    // echo "<pre>"; print_r($data); die;
            if(empty($data['type']))
            {
                $data['type'] = "";
            }
            if(empty($data['coupen_code']))
            {
                $data['coupen_code'] = "";
            }
            if(empty($data['price']))
            {
                $data['price'] = "";
            }

            if(empty($data['date']))
            {
                $data['date'] = "";
            }

            $coupen->type = $data['type'];
            $coupen->coupen_code = $data['coupen_code'];
            $coupen->price = $data['price'];
            $coupen->date = $data['date'];
            $coupen->status = 1;
            $coupen->save();
            Session::flash('success_message', $message);
            return redirect('admin/coupen');
        }

        Session::flash('page', 'coupen');
        return view('admin.coupen.add_edit_coupen', compact('title','button','coupendata'));
    }

    public function deteteCoupen($id)
    {
      $id =Coupen::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Coupen has been delete successfully!');
    }

}

