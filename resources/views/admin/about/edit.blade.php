@extends('admin.dashboard')
@section('content')

<form action="{{route('portfolio.about.update',$editdata->id)}}" method="post" enctype="multipart/form-data">
   @csrf
   @method('put')

          @if (session('status'))
              <strong class="text-success"> <b>{{session('status')}}</b> </strong>
          @endif
          <h2 class="text-center text-success"><b>About Item Edit</b></h2> 
     <div class="row justify-content-center">  
   
        <div class="col-md-12 col-lg-8"> 
             <div class="mb-3">
                <label for="title1" class="text-dark">Title one</label>
                <input type="text" name="title1" class="form-control @error('title1') is-invalid @enderror" id="title1" value="{{$editdata->title1}}">
                @error('title1')
                        <strong class="text-danger">{{$message}}</strong>
                @enderror
             </div>

             <div class="mb-3">
                <label for="title2" class="text-dark">Title Two</label>
                <input type="text" name="title2" class="form-control @error('title2') is-invalid @enderror" id="title2" value="{{$editdata->title2}}">
                @error('title2')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
               </div>

               <img src="{{url($editdata->image)}}" class="img-thumbnail" alt="" srcset="">

               <div class="mb-3">
                <label for="image" class="text-dark">Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                @error('image')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
               </div>

             <div class="mb-3">
                <label for="description" class="text-dark">Description</label>
                <textarea name="description" id="description" class="form-control  @error('description') is-invalid @enderror" rows="4">
                    {{$editdata->description}}
                </textarea>
                @error('description')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
               </div>

           
        </div>

        <div class="row justify-content-center">

         <div class="col-4">
            <div class="mb-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Update">
             </div>
         </div>
        </div>
     </div>
   </form>
  
@endsection