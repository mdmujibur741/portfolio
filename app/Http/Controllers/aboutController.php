<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use File;

class aboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         $about = about::all();
         return view('admin.about.index',compact('about'));
    }


    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
           $store = new about();
           $request->validate([
                 'title1'=>'required|string',
                 'title2'=>'required|string',
                 'description'=>'required|string',
                 'image'=>'required|image',
           ]);

           $store->title1 = $request->title1;
           $store->title2 = $request->title2;
           $store->description = $request->description;
           if($request->file('image')){
                  $image = $request->file('image');
                  Storage::putFile('public/image',$image);
                  $store->image = "storage/image/".$image->hashName();
           }
           $store->save();
           return redirect()->back()->with('status','ABOUT ITEM SUBMIT SUCCESSFULLY!');
    }

    public function edit($id)
    {
           $edit_id = Crypt::decryptString($id);
           $editdata = about::find($edit_id);
           return view('admin.about.edit',compact('editdata')); 
    }

    public function update(Request $request, $id)
    {
            $request->validate([
                'title1'=>'required|string',
                'title2'=>'required|string',
                'description'=>'required|string',
                'image'=>'required|image',
        ]);
            $update = about::find($id);

            $update->title1 = $request->title1;
            $update->title2 = $request->title2;
            $update->description = $request->description;

            if($request->file('image')){    
                if(File::exists($update->image)){
                    File::delete($update->image);    
                }
                $image = $request->file('image');
                Storage::putFile('public/image',$image);
                $update->image = "storage/image/".$image->hashName();
         }

         $update->update();
         return redirect()->route('portfolio.about.index')->with('status','ABOUT ITEM SUBMIT SUCCESSFULLY!');
    }

    public function destroy(Request $request,$id)
    {
            $delete = about::find($id);
            @unlink(public_path($delete->image));
            $delete->delete();
            return redirect()->back()->with('status','ABOUT ITEM DELETE SUCCESSFULLY!');
    }
}
