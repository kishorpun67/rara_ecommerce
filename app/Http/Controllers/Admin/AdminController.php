<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    public function dashboard()
    {
        Session::flash('page', 'dashboard');
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            // return Hash::make($data['password']);
            $rules = [
                'email' => 'required|email',
                'password' => 'required',
            ];

            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'Valild Email is required',
                'password.required' => 'Password is required',
            ];
            $this->validate($request, $rules, $customMessages);
            // $admin = new Admin();
            // $admin->email= $data['email'];
            // $admin->password= Hash::make($data['password']);
            // $admin->save();
            if(auth('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return to_route('admin.dashboard');
            }else{
                Session::flash('error_message', 'Invalid Email or Password');
                return redirect()->back();
            }
        }
        if(auth('admin')->check()){
            return to_route('admin.dashboard');
        }        
        return view('admin.login');
    }

    public function logout()
    {
        auth('admin')->logout();
        return to_route('admin.login');
    }
    public function updateAdminPassword (Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // return $data->id;
            // check current password
            if(Hash::check($data['current_password'],auth('admin')->user()->password)) {

                // check new password ana confirm password
                if($data['new_password']==$data['confirm_password']){
                    Admin::where('id',auth('admin')->user()->id)->update(['password' => bcrypt($data['new_password'])]);
                    Session::flash('success_message', 'Password has been changed sucessfully');
                }else{
                    Session::flash('error_message', 'New Password and Confirm Password is not Match');
                }

            }else{
                Session::flash('error_message', 'Your Current Password is Incorrect');
            }
            return redirect()->back();
        }
        Session::flash('page', 'update_admin_password');
        return view('admin.update_password');
    }

    public function updateAdminDetail(Request $request)
    {
        if($request->isMethod('post'))
            {
                $data = $request->all();
                // dd($data);
                $rules = [
                    'name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'number' =>'required|between:10,20',
                    'image' =>'image:jpeg, png, bmp, gif',
                ];

                $customMessages = [
                    'name.required' => 'Name is required',
                    'name.alpha' => 'alpha charcter is required',
                    'number.required' => 'number is required',
                    'number.between' => 'enter between 10 to 20 ',
                    'image.image' =>'file must be image',
                ];
                $this->validate($request, $rules, $customMessages);

                // upload images

                if(empty($data['image'])){
                    $data['image']='';
                    $imageName = Auth::guard('admin')->user()->image;
                }
                if($data['image']){
                    $image_tmp = $data['image'];
                    // dd($image_tmp);
                    if($image_tmp->isValid())
                    {
                        // get extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        // generate new image name
                        $imageName = rand(111,99999).'.'.$extension;
                        $imagePath = 'image/admin_image/admin_photos/'.$imageName;
                        $result = Image::make($image_tmp)->resize(1000,1000)->save($imagePath);
                        // dd($result);

                    }else if(!empty($data['current_admin_image'])) {
                        $imageName = $data['current_admin_image'];
                    }else{
                        $imageName = "";
                    }
                }


                Admin::where('email',Auth::guard('admin')->user()->email)->update([
                    'name'=>$data['name'],
                    'number' =>$data['number'],
                    'image' => $imageName,
                ]);
                Session::flash('success_message', 'Admin details update sucessfully');
                return redirect()->back();
            }

            Session::flash('page', 'update_admin_detail');
            return view('admin.update_detail');
    }
}
