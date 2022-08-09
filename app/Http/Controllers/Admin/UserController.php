<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserController extends Controller
{
    public function userregister()
    {
        $userregister = User::get();
       // echo "<pre>"; print_r($userregister); die;
        Session::flash('page', 'userregister');
        return view('admin.userregister.view_userregister', compact('userregister'));
    }
}
