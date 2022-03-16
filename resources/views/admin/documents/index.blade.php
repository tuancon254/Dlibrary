@extends('layouts.admin.master')
@section('contents')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Document Management</h4>
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
                    <a href="{{ route('documents.index') }}">Document List</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            <form action="{{ route('documents.search') }}">
                                <div class="form-inline">
                                    <input class="form-control mr-sm-2" name="keyword" id="search" type="text"
                                        placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                        @can('documents-create')
                           <div>
                            <a href="{{ route('documents.create') }}">
                                <button class="btn btn-primary">
                                    <span class="btn-label">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                    </span>
                                    Upload
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
                                    <th scope="col">Author</th>
                                    <th scope="col">Category</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $doc)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $doc->title }}</td>
                                        <td>{{ $doc->author }}</td>
                                        <td>{{ $doc->category->title }}</td>
                                        <td class="text-center">
                                            <div class="row d-flex justify-content-center align-items-center">
                                                <a href="{{ route('documents.show', ['id' => $doc->document_id]) }}"
                                                    style="margin-right:5px" class="btn btn-primary btn-sm">Show</a>
                                                @can('documents-edit')
                                                    <a href="{{ route('documents.edit', ['id' => $doc->document_id]) }}"
                                                        style="margin-right:5px" class="btn btn-primary btn-sm">Update</a>
                                                @endcan
                                                {{-- <a href="{{ route('documents.download', ['id' => $doc->id]) }}"
                                                class="btn btn-primary btn-sm">Download</a> --}}
                                                @can('documents-delete')
                                                   <form method="DELETE"
                                                    action="{{ route('documents.delete', ['id' => $doc->document_id]) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-sm btn-danger btn-flat delete"
                                                        data-toggle="tooltip" title='Delete'>Delete</button>
                                                </form> 
                                                @endcan
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
                    title: `Bạn có muốn xoá tài liệu này không?`,
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

    {{-- <script type="text/javascript">
        $('#search').on('keyup', function() {
            var token = $("meta[name='csrf-token']").attr("content");
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ route('documents.search') }}',
                data: {
                    'search': $value,
                    _token: token
                },
                success: function(data) {
                    $('tbody').html(data);
                }
            });
        })
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script> --}}
@stop
