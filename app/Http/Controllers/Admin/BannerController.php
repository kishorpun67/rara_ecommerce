<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Session;
use File;
use Storage;

class BannerController extends Controller
{
    public function banner()
    {
        $banners = Banner::orderBy("id", "Desc")->get();
        Session::flash('page', 'banner');
        return view('admin.banner.view_banner', compact('banners'));
    }

    public function addEditBanner(Request $request, $id=null)
    {
        if($id=="") {
            $banners = new Banner;
            $message = "banner Banner been added successfully!";
        }
        else {
            $banners = Banner::find($id);
            $message = "Banner has been updated successfully!";
        }
        if($request->isMethod('post'))
        {

            $data = $request->all();

            if(!empty($data['image'])){
                // dd($data['image']);
                $filename = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->storeAs('public/images/banner_image/', $filename);
                $banners->image = 'storage/images/banner_image/'.$filename;
            }
            $banners->titles = $data['titles'];
            $banners->status = 1;
            $banners->save();
            return to_route('admin.banner')->with('success_message', $message);
        }
    }

    public function updateBannerStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            Banner::where('id', $data['banner_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'banner_id' =>$data['banner_id']]);
        }
    }
    public function deteteBanner($id)
    {
        Banner::where('id', $id)->delete();
        return redirect()->back()->with('success_message', 'Banner has been deleted successfully!');
    }
}
