@extends('admin.dashboard')
@section('content')

<form action="{{route('portfolio.service.update',$edit->id)}}" method="post">
   @csrf
   @method('put')

          @if (session('status'))
              <strong class="text-success"> <b>{{session('status')}}</b> </strong>
          @endif
          <h2 class="text-center text-success"><b>Service Edit</b></h2> 
     <div class="row justify-content-center">  
   
        <div class="col-md-12 col-lg-8"> 
             <div class="mb-3">
                <label for="icon" class="text-dark">Font Awesome Icon</label>
                <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" id="icon" value="{{$edit->icon}}" >
                @error('icon')
                        <strong class="text-danger">{{$message}}</strong>
                @enderror
             </div>
             <div class="mb-3">
                <label for="title" class="text-dark">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{$edit->title}}">
                @error('title')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
               </div>
             <div class="mb-3">
                <label for="description" class="text-dark">Description</label>
                <textarea name="description" id="description" class="form-control  @error('description') is-invalid @enderror" rows="4">{{$edit->description}}</textarea>
                @error('description')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
               </div>
             <div class="mb-3">
               <input type="submit" name="submit" class="btn btn-primary" value="Update">
            </div>
        </div>
      
      
     </div>
   </form>
  
@endsection