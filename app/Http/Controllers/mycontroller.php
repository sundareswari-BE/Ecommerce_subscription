<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Mymodel;
use App\Models\categorymodel;
use App\Models\subscribtionmodel;


class MyController extends Controller
{
    // ---------------------------------------------Admin-------------------------------


    public function adminloginForm()
    {
        $data_log['button'] = "submit";
        $data_log['log_email'] = "";
        $data_log['log_password'] = "";
        return view('adminpages.adminlogin', $data_log);
    }



    public function adminlogincheck(Request $request)
    {
        $request->validate([
            'log_email' => 'required|email',
            'log_password' => 'required',
        ]);
        $data = array(
            'email' => $request->input('log_email'),
            'password' => $request->input('log_password'),
        );


        if (Auth::attempt($data)) {

            if (Auth::user()->name == 'admin') {
                $request->session()->regenerate();
                return redirect()->route('admindashboard');
            } else {

                return back()->with('error', 'You are not authorized to access this area')->withInput();
            }
        } else {

            return back()->with('error', 'You are not authorized to access this area')->withInput();
        }
    }


    public function admindashboard(Request $request)
    {
       return view('adminpages.admindashboard');
    }

    public function category(Request $request)
    {

        $data_log['button'] = "Add Category";
        $data_log['category_name'] = "";
        return view('adminpages.category', $data_log);
    }

    public function addcategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
        ]);

        categorymodel::addCategory($request->all());

        return response()->json(['success' => 'Category added successfully'], 200);
    }
    





























































    // ------------------------------Signin-signupform------------------------------
  
}