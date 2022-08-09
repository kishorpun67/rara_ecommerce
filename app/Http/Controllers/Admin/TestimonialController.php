<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Session;

class TestimonialController extends Controller
{
    public function Testimonial()
    {
        $testimonial = Testimonial::get();
        Session::flash('page', 'testimonial');
        return view('admin.testimonial.view_testimonial', compact('testimonial'));
    }
    public function updateTestimonialStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            if($data['status']=="Active") {
               $status = 0;
            }else {
                $status = 1;
             }
             Testimonial::where('id', $data['testimonial_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'testimonial_id' =>$data['testimonial_id']]);
        }
    }
    public function addEditTestimonial(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Testimonial";
            $button ="Submit";
            $testimonial = new Testimonial;
            $testimonialdata = array();
            $message = "Testimonial has been added sucessfully!";
        }else{
            $title = "Edit Testimonial";
            $button ="Update";
            $testimonial = Testimonial::where('id',$id)->first();
            $testimonialdata= json_decode(json_encode($testimonial),true);
            $testimonial = Testimonial::find($id);
            $message = "Testimonial has been updated sucessfully!";
        }
        if($request->isMethod('post')) {
            $data = $request->all();
    // echo "<pre>"; print_r($data); die;
            if(!empty($data['image'])){
                // dd($data['image']);
                $filename = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->storeAs('public/images/testimonial_image/', $filename);
                $testimonial->image = 'storage/images/testimonial_image/'.$filename;
            }
            if(empty($data['name']))
            {
                $data['name'] = "";
            }
            if(empty($data['post']))
            {
                $data['post'] = "";
            }
            if(empty($data['description']))
            {
                $data['description'] = "";
            }

            $testimonial->name = $data['name'];
            $testimonial->post = $data['post'];
            $testimonial->description = $data['description'];
            $testimonial->status = 1;
            $testimonial->save();
            Session::flash('success_message', $message);
            return redirect('admin/testimonial');
        }

        Session::flash('page', 'testimonial');
        return view('admin.testimonial.add_edit_testimonial', compact('title','button','testimonialdata'));
    }

    public function deteteTestimonial($id)
    {
      $id =Testimonial::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Testimonial has been delete successfully!');
    }

}
