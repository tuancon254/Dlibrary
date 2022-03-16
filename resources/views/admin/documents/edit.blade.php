@extends('layouts.admin.master')
@section('contents')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Document Management</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{route('home.index')}}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('documents.index')}}">Edit Document</a>
            </li>
        </ul>
    </div>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Edit Document</div>
        </div>
        <div class="card-body">
                <form action="{{ route('documents.update', ['id' => $doc->document_id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter title" value="{{$doc->title}}">
                    </div>
                    <div class="form-group">
                        <label>Date of Issue</label>
                        <input type="date" class="form-control" name="date_of_issue" placeholder="Enter Date of Issue" value="{{$doc->date_of_issue}}">
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" class="form-control" name="author" placeholder="Enter Author" value="{{$doc->author}}">
                    </div>
                   
                    <div class="form-group">
                        @if(!is_null($file))
                        <label>File</label>
                            <div class="file form-control d-flex justify-content-between align-items-center" style="margin-bottom:10px">
                            <div class="file"><i class="fas fa-file-pdf" style="padding-right:10px"></i><label>{{$file->name}}</label></div>
                            <a href="{{route('files.delete', $file->id)}}" class="btn btn-sm btn-danger" id="delete" data-id="{{$file->id}}">Delete</a>
                        </div>
                        @endif
                        <input type="file" name="file" class="form-control" accept=".doc,.docx,.pdf">
                      </div>
                      
                </div>
               <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="5">{{$doc->description}}</textarea>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select id="cate" name="category_id" class="form-control">
                        <option value="0">Chọn danh mục</option> 
                        {{!! $htmlOption !!}}
                    </select>
                </div>
                <div class="form-group a">
                    <label>Semester</label>
                    <select name="semester_id" class="form-control student @error('semester_id') is-invalid @enderror">
                        <option value="">Chọn học kỳ</option> 
                        @foreach ($semester as $sem)
                        <option value="{{$sem->sem_id}}">{{$sem->sem_name}}</option> 
                        @endforeach
                    </select>
                    <div style="color:red;height:10px">@error('semester_id'){{ $message }} @enderror</div>
                </div>
                </div>
                </div> 
                <div class="card-action">
                    <button class="btn btn-success" type="submit">Submit</button>
                    <a href="{{ route('documents.index') }}" class="btn btn-danger">Cancel</a>
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
     $(document).ready(function () {

        $("body").on("click","#delete",function(e){

            if(!confirm("Bạn có muốn xoá file này không?")) {
            return false;
        }

        e.preventDefault();
        var id = $(this).data("id");
        //var id = $(this).attr('data-id');
        var token = $("meta[name='csrf-token']").attr("content");
        var url = e.target;

        $.ajax(
        {
            url: url.href, //or you can use url: "company/"+id,
            type: 'get',
            data: {
                _token: token,
                id: id
        },
        success: function (response){
            location.reload();
        }
        });
        return false;
    });
    });
</script>

<script>
      var data = {!! json_encode($data) !!}
    $(document).ready(function() {
        console.log(data)
        $(".student").prop("disabled", true);
        $("#cate").change(function() {
            data.every((e) => {
                if (e == $(this).find(":selected").val()){
                $(".student").prop("disabled", false);
                } else {
                $(".student").prop("disabled", true);
                }
            });
            // for(let i=0;i<data.length;i++){
            //     if ($(this).find(":selected").val() == data[i]) {
            //     $(".student").prop("disabled", false);
            //     } else {
            //     $(".student").prop("disabled", true);
            //     }
            //     continue;
                
            // }
                 
        })
    })
</script>
@stop