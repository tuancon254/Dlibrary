@extends('layouts.admin.master')
@section('contents')


    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title"> {{$class->class_name}}</h4>
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
                    <a href="{{ route('class.show',['id'=> $id]) }}">{{$class->class_name}}</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <div>Students List</div>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Students List</div>
                        <div class="" style="font-size: 16px; font-weight: bold; margin-left:500px">Semester: {{$semester}}</div>
                        <div class="form-inline ml-auto">
                            <input class="form-control mr-sm-2" name="search" id="search" type="text" placeholder="Search"
                                aria-label="Search">
                        </div>
                        @can('user-create')
                            <div>
                                <a href="{{ route('user.create') }}">
                                    <button class="btn btn-primary">
                                        <span class="btn-label">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        Create
                                    </button>
                                </a>
                            </div>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Student Code</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student as $st)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $st->first_name . ' ' . $st->last_name }}</td>
                                        <td>{{ $st->student_id }}</td>
                                        <td class="text-center">
                                            <div class="row d-flex justify-content-center align-items-center">
                                                <a href="{{ route('students.show', ['id' => $st->student_id]) }}"
                                                    style="margin-right:5px" class="btn btn-primary btn-sm">Show</a>
                                                <a href="{{ route('students.edit', ['id' => $st->student_id]) }}"
                                                    style="margin-right:5px" class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">{{ $student->links() }}</div>
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
                    title: `Bạn có muốn xoá người dùng này không?`,
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
