<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutus;
use Session;

class AboutusController extends Controller
{
    public function editAboutus(Request $request, $id=null)
    {
        if ($request->isMethod('post')) {
          $data = $request->all();
           $aboutus =  Aboutus::find($id);

           if(!empty($data['image'])){
            // dd($data['image']);
            $filename = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->storeAs('public/images/aboutus_image/', $filename);
            $aboutus->image = 'storage/images/aboutus_image/'.$filename;
             }

            $aboutus->description = $data['textarea'];
            $aboutus->save(); 
            Session::flash('success_message','Aboutus updated successfully!');
            return redirect()->back();

         }
         Session::flash('page', 'aboutus');
         $aboutus = Aboutus::first();
         return view('admin.aboutus.view_aboutus', compact('aboutus'));
    } 

}
