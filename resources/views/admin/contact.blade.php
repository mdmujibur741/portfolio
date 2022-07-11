@extends('admin.dashboard')
@section('content')
<div class="row">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Contact Tables Example</h6>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contact as $key => $item)
                            <tr>
                                <td> {{$key+1}} </td>
                                <td> {{$item->name}} </td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->message}}</td>
                                <td>
                                            <form action="{{route('portfolio.contact.destroy',$item->id)}}" method="post" class="d-inline-block">
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