<?php

namespace App\Http\Controllers;

use App\Models\portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use File;
use Illuminate\Support\Facades\File as FacadesFile;

class portfolicontroller extends Controller
{
   public function __construct()
   {
           $this->middleware('auth');
   }

    public function index()
    {
              $portdata = portfolio::all();
           return view('admin.portfolio.index',compact('portdata'));
    }

    public function create()
    {
          return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
      $request->validate([
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'client' => 'required|string',
            'category' => 'required|string',
            'description' => 'required|string',
            'small_image' => 'required|image',
            'big_image' => 'required|image',
         ]);   

          $store = new portfolio();
          $store->title = $request->title;
          $store->sub_title = $request->sub_title;
          $store->client = $request->client;
          $store->category = $request->category;
          $store->description = $request->description;

          $small_file = $request->file('small_image');
          Storage::putFile('public/image',$small_file);
          $store->small_image = "storage/image/".$small_file->hashName();

          $big_file = $request->file('big_image');
          Storage::putFile('public/image',$big_file);
          $store->big_image = "storage/image/".$big_file->hashName();

          $store->save();

          return redirect()->back()->with('status','Data Submit Successfully');
    }

    public function edit($id)
    {
          $edit_id = Crypt::decryptString($id);
          $editdata = portfolio::find($edit_id);
           return view('admin.portfolio.edit',compact('editdata'));
    }

    public function update(Request $request,$id)
    {
      $request->validate([
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'client' => 'required|string',
            'category' => 'required|string',
            'description' => 'required|string',
         ]);   

          $update = portfolio::find($id);
          $update->title = $request->title;
          $update->sub_title = $request->sub_title;
          $update->client = $request->client;
          $update->category = $request->category;
          $update->description = $request->description;

          if($request->file('small_image')){
            if(File::exists($update->small_image)){
                  File::delete($update->small_image);    
              }
            $small_file = $request->file('small_image');
            Storage::putFile('public/image',$small_file);
            $update->small_image = "storage/image/".$small_file->hashName();
          }

          if($request->file('big_image')){
              if(File::exists($update->big_image)){
                  File::delete($update->big_image);    
              }
            $big_file = $request->file('big_image');
            Storage::putFile('public/image',$big_file);
            $update->big_image = "storage/image/".$big_file->hashName();
          }

          $update->update();

          return redirect()->route('portfolio.sec.index')->with('status','Data Update Successfully');
    }

    public function destroy(Request $request,$id)
    {
           $delete = portfolio::find($id);
            @unlink(public_path($delete->small_image));
            @unlink(public_path($delete->big_image));
           $delete->delete();
           return redirect()->route('portfolio.sec.index')->with('status','Data Delete Successfully');
    }
}
