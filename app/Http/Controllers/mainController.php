<?php

namespace App\Http\Controllers;

use App\Models\main;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class mainController extends Controller
{
     public function __construct()
     {
             $this->middleware('auth');
     }
     
    public function main()
    {
          $data = main::all();
         return view('admin.main',compact('data'));
         
        
    }

    public function update(Request $request,$id)
    {
         $request->validate([
            'title' => 'required|string',
            'sub_title' => 'required|string',
         ]);

         $main = main::find($id);
         $main->title = $request->title;
         $main->sub_title = $request->sub_title;

         if($request->file('bc_image')){
          $img_file = $request->file('bc_image');
          $img_file->storeAs('public/image/','back.' . $img_file->getClientOriginalExtension());
          $main->bc_image = 'storage/image/back.' . $img_file->getClientOriginalExtension();
         }


         if($request->file('resume')){
          $pdf = $request->file('resume');
          $pdf->storeAs('public/pdf/','sample.'.$pdf->getClientOriginalExtension());
          $main->resume = 'storage/pdf/sample.'.$pdf->getClientOriginalExtension();
         }

         $main->update();
         return redirect()->route('portfolio.main')->with('status','Data Update Successfully');
    }
}
