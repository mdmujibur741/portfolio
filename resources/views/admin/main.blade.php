@extends('admin.dashboard')
@section('content')
@foreach ($data as $item)
<form action="{{route('portfolio.update',$item->id)}}" method="post" enctype="multipart/form-data">
   @csrf
   @method('put')
          @if (session('status'))
              <strong>{{session('status')}} </strong>
          @endif
     <div class="row">   
          <div class="col-md-12 col-lg-6">
            <h3 class="text-dark">Background image</h3>
            <img src="{{url($item->bc_image)}}" class="img-thumbnail" alt="" style="width:100%">
            <input type="file" name="bc_image" id="bc_iamge" class="form-control">
        </div>
        <div class="col-md-12 col-lg-6">
             <div class="mb-3">
                <label for="title" class="text-dark">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{$item->title}}">
                @error('title')
                        <strong class="text-danger">{{$message}}</strong>
                @enderror
             </div>
             <div class="mb-3">
                <label for="sub_title" class="text-dark">Sub Title</label>
                <input type="text" name="sub_title" class="form-control @error('sub_title') is-invalid @enderror" id="sub_title" value="{{$item->sub_title}}">
                @error('sub_title')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
               </div>
             <div class="mb-3">
                <label for="resume" class="text-dark">Upload Resume</label>
                <input type="file" name="resume" class="form-control" id="resume">
             </div>
             <div class="mb-3">
               <input type="submit" name="submit" class="btn btn-primary" value="Update">
            </div>
        </div>
      
      
     </div>
   </form>
   @endforeach
@endsection