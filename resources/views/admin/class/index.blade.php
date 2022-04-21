@extends('layouts.admin.master')
@section('contents')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Category Managerment</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('home.index') }}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('class.list') }}">Class List</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Class list</div>
                        <div>
                            <a href="{{ route('class.create') }}">
                                <button class="btn btn-primary">
                                    <span class="btn-label">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    Create
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Class ID</th>
                                    <th scope="col">Class name</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $cl)
                                    <tr>
                                        <th>{{ $cl->class_id }}</th>
                                        <td>{{ $cl->class_name }}</td>
                                        <td>{{ $cl->sem_name }}</td>
                                        <td class="text-center">
                                            <div class="row d-flex justify-content-center align-items-center">
                                                <a href="{{ route('class.show', ['id' => $cl->class_id]) }}"
                                                    style="margin-right:5px" class="btn btn-primary btn-sm">View</a>
                                                <a href="{{ route('class.edit', ['id' => $cl->class_id]) }}"
                                                    style="margin-right:5px" class="btn btn-primary btn-sm">Update</a>

                                                <form method="DELETE"
                                                    action="{{ route('class.delete', ['id' => $cl->class_id]) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-sm btn-danger btn-flat delete"
                                                        data-toggle="tooltip" title='Delete'>Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">{{ $data->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.delete').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Bạn có muốn xoá lớp này không?`,
                    text: "Nếu bạn xoá nó sẽ biến mất vĩnh viễn.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@stop
