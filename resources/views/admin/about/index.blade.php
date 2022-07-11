@extends('admin.dashboard')
@section('content')
<div class="row">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            @if (session('status'))
              <strong class="text-success"> <b>{{session('status')}}</b> </strong>
          @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Title One</th>
                            <th>Title Two</th>
                            <th>description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($about as $key => $item)
                            <tr>
                                <td> {{$key+1}} </td>
                                <td> {{$item->title1}}  </td>
                                <td> {{$item->title2}}  </td> 
                                <td> {{$item->description}}  </td> 
                                <td> 
                                    <img src="{{url($item->image)}}" class="img-fluid" alt="" style="height:6vh">  
                                </td> 
                                <td>
                                            <a href="{{route('portfolio.about.edit',Crypt::encryptString($item->id))}}"class="btn btn-sm btn-success">Edit</a>

                                            <form action="{{route('portfolio.about.delete',$item->id)}}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-sm btn-danger" value="Delete" >
                                            </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>  
@endsection