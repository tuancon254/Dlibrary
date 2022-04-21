@extends('layouts.admin.master')
@section('contents')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Category Management</h4>
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
                    <a href="{{ route('category.list') }}">Category List</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                        @can('category-create')
                           <div>
                            <a href="{{ route('category.create') }}">
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
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    @can('category-edit')
                                        <th scope="col" class="text-center">Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $category)
                                    <tr>
                                        <th>{{ $category->id }}</th>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->description }}</td>
                                        @can('category-edit')
                                        <td class="text-center">
                                            <div class="row d-flex justify-content-center align-items-center">
                                                @can('category-edit')
                                                    <a href="{{ route('category.edit', ['id' => $category->id]) }}"
                                                        style="margin-right:5px" class="btn btn-primary btn-sm">Update</a>
                                                @endcan
                                                @can('category-delete')
                                                    <form method="DELETE"
                                                        action="{{ route('category.delete', ['id' => $category->id]) }}">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="btn btn-sm btn-danger btn-flat delete"
                                                            data-toggle="tooltip" title='Delete'>Delete</button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                        @endcan
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
                    title: `Bạn có muốn xoá danh mục này không?`,
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
