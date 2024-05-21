<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mycontroller extends Controller
{
public function signinform(){

$data['heading']="Signin-Form";
$data['button']="submit";
$data['name']="";
$data['email']="";
$data['password']="";
$data['number']="";
return view('template.signpage',$data);
}

public function loginform(){

    $data['heading']="login-Form";
    $data['button']="submit";
   
    $data['email']="";
    $data['password']="";
    
    return view('template.login',$data);
    }
}
