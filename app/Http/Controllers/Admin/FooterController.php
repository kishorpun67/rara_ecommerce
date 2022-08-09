<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;
use Session;

class FooterController extends Controller
{
    public function editFooter(Request $request, $id=null)
    {
        if ($request->isMethod('post')) {
           $data = $request->all();
            $footer =  Footer::find($id);
            $footer->address = $data['address'];
            $footer->number = $data['number'];
            $footer->mail = $data['mail'];
            $footer->fb_url = $data['fb_url'];
            $footer->twitter_url = $data['twitter_url'];
            $footer->instagram_url = $data['instagram_url'];
            $footer->LinkedIn_url = $data['LinkedIn_url'];
            $footer->utube_url = $data['utube_url'];
            $footer->message = $data['message'];
            $footer->save(); 
            Session::flash('success_message','Footer updated successfully!');
            return redirect()->back();

         }
         Session::flash('page', 'footer');
         $footer = Footer::first();
         return view('admin.footer.view_footer', compact('footer'));
    } 
}
