<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mycontroller;
route::get('/signpage',[mycontroller::class,'signinform'])->name('signinform');
route::get('/',[mycontroller::class,'loginform'])->name('loginform');

