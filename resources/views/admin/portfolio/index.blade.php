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
                            <th>Title</th>
                            <th>Sub_title</th>
                            <th>Client</th>
                            <th>Category</th>
                            <th>description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($portdata as $key => $item)
                            <tr>
                                <td> {{$key+1}} </td>
                                <td> {{$item->title}} </td>
                                <td>{{$item->sub_title}}</td>
                                <td>{{$item->client}}</td>
                                <td>{{$item->category}}</td>
                                <td>{{ Str::limit($item->description, 8) }}</td>
                                <td>

                                            <form action="{{route('portfolio.sec.delete',$item->id)}}" method="post" class="d-inline-block">
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