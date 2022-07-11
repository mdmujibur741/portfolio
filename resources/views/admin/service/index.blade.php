@extends('admin.dashboard')
@section('content')

    <div class="row">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>serial</th>
                                <th>icon</th>
                                <th>title</th>
                                <th>description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($service as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->icon }} </td>
                                    <td>{{ $item->title }} </td>
                                    <td>{{ Str::limit($item->description,10) }} </td>
                                    <td>
                                                <a href="{{ route('portfolio.service.edit', $item->id) }}"
                                                    class="btn btn-sm btn-success">Edit</a>
                                           
                                                <form action="{{ route('portfolio.service.delete', $item->id) }}" method="post" class="d-inline-block">
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
