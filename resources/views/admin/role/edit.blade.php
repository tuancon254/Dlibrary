@extends('layouts.admin.master')
@section('contents')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Role Managersments</h4>
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
                    <a href="{{ route('user.list') }}">Role Edit</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Role Edit</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('role.update', ['id' => $role->role_id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Role Name</label>
                                        <input type="text" class="form-control" name="role" placeholder="Enter title"
                                            value="{{ $role->role_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 50px">
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label>Permission</label>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="row col-lg-11">
                                            @foreach ($permissionParent as $perParent)
                                                <div class="col-lg-3 all" style="border: 1px solid rgb(236, 236, 236);">
                                                    <div class="row"
                                                        style="border-bottom: 1px solid rgb(214, 214, 214); background-color: rgb(137, 177, 230); padding:10px 0px 10px 10px">
                                                        <label class="">
                                                            <input class="checkall" type="checkbox" id="item">
                                                            <span style=" font-size: 16px; margin-left:5px">{{ $perParent->per_name }}</span>
                                                        </label>
                                                    </div>
                                                    @foreach ($perParent->permissionChild as $perChild)
                                                        <div class="row form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input checkitem" type="checkbox"
                                                                    name="per_id[]" value="{{ $perChild->per_id }}"
                                                                    <?php foreach ($active as $act) {
                                                                        if ($act->per_id == $perChild->per_id) {
                                                                            echo 'Checked';
                                                                        }
                                                                    }
                                                                    ?>>
                                                                <span
                                                                    class="form-check-sign">{{ $perChild->per_name }}</span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <a href="{{ route('role.list') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $('.checkall').on('click', function() {
            $(this).parents('.all').find('.checkitem').prop('checked', $(this).prop('checked'))
        })
    </script>
@stop
