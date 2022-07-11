<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    public function __construct()
   {
           $this->middleware('auth');
   }

    public function index()
    {
             $service = service::all();
             return view('admin.service.index',compact('service'));
    }

    public function create()
    {
           return view('admin.service.create');
      
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
         ]);
         $service = new service;
         $service->icon = $request->icon;
         $service->title = $request->title;
         $service->description = $request->description;
         $service->save();
         return redirect()->back()->with('status','SERVICE ADDED SUCCESSFULLY!');
    }

    public function edit($id)
    {
           $edit = service::find($id);
          return view('admin.service.edit',compact('edit'));
    }

    public function update(Request $request,$id)
    {
           $update = service::find($id);
           $update->icon = $request->icon;
           $update->title = $request->title;
           $update->description = $request->description;
           $update->update();
           return redirect()->route('portfolio.service.index')->with('status','SERVICE UPDATE SUCCESSFULLY!');
    }

    public function destroy($id)
    {
          $delete = service::find($id);
          $delete->delete();
          return redirect()->route('portfolio.service.index')->with('status','SERVICE DELETE SUCCESSFULLY!');
    }
}
