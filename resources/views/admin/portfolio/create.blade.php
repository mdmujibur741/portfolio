@extends('admin.dashboard')
@section('content')

<form action="{{route('portfolio.sec.store')}}" method="post" enctype="multipart/form-data">
   @csrf

          @if (session('status'))
              <strong class="text-success"> <b>{{session('status')}}</b> </strong>
          @endif
          <h2 class="text-center text-success"><b>Portfolio Item Add</b></h2> 
     <div class="row justify-content-center">  
   
        <div class="col-md-12 col-lg-8"> 
             <div class="mb-3">
                <label for="title" class="text-dark">Item Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" >
                @error('title')
                        <strong class="text-danger">{{$message}}</strong>
                @enderror
             </div>

             <div class="mb-3">
                <label for="sub_title" class="text-dark">Sub Title</label>
                <input type="text" name="sub_title" class="form-control @error('sub_title') is-invalid @enderror" id="sub_title">
                @error('sub_title')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
               </div>

               <div class="mb-3">
                <label for="client" class="text-dark">Client</label>
                <input type="text" name="client" class="form-control @error('client') is-invalid @enderror" id="client">
                @error('client')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
               </div>

               <div class="mb-3">
                <label for="category" class="text-dark">Category</label>
                <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" id="category">
                @error('category')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
               </div>

             <div class="mb-3">
                <label for="description" class="text-dark">Description</label>
                <textarea name="description" id="description" class="form-control  @error('description') is-invalid @enderror" rows="4"></textarea>
                @error('description')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
               </div>

           
        </div>

        <div class="row justify-content-center">
        <div class="col-4">
            <div class="input-group mb-3">
                <img src="" class="img-thumbnail" alt="" style="width:100%">
                <label class="input-group-text" for="inputGroupFile01">Small Image</label>
                <input type="file" class="form-control @error('small_image') is-invalid @enderror" id="inputGroupFile01" name="small_image">
                @error('small_image')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
              </div>
        </div>
        <div class="col-4">
            <div class="input-group mb-3">
                <img src="" class="img-thumbnail" alt="" style="width:100%">
                <label class="input-group-text" for="inputGroupFile01">Big Image</label>
                <input type="file" class="form-control @error('big_image') is-invalid @enderror" id="inputGroupFile01" name="big_image">
                @error('big_image')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
              </div>
        </div>
      
         <div class="col-12">
            <div class="mb-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
             </div>
         </div>
        </div>
     </div>
   </form>
  
@endsection