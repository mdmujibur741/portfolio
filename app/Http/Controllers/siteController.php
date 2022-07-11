<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\main;
use App\Models\portfolio;
use App\Models\service;
use Illuminate\Http\Request;

class siteController extends Controller
{
    public function index()
    {
         $maindata = main::all();
         $service = service::all();
         $portfolio = portfolio::all();
         $about = about::all();
         return view('pages.index',compact('maindata','service','portfolio','about'));
    }
       
 
}
