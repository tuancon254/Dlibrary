@extends('layouts.site.template')
@section('content')
    <div class="container">
        <div class="page-inner">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Upload Document</div>
                </div>
                <div class="card-body">
                        <form action="{{ route('site.document.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter title" value="{{old('title')}}">
                                <div style="color:red;height:10px">@error('title'){{ $message }} @enderror</div>
                            </div>
                            <div class="form-group">
                                <label>Date of Issue</label>
                                <input type="date" class="form-control @error('date_of_issue') is-invalid @enderror" name="date_of_issue" placeholder="Enter Date of Issue" value="{{old('date_of_issue')}}">
                                <div style="color:red;height:10px">@error('date_of_issue'){{ $message }} @enderror</div>
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" placeholder="Enter Author" value="{{old('author')}}">
                                <div style="color:red;height:10px">@error('author'){{ $message }} @enderror</div>
                            </div>
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" accept=".doc,.docx,.pdf" value="{{old('file')}}">
                                <div style="color:red;height:10px">@error('file'){{ $message }} @enderror</div>
                              </div>
                        </div>
                       <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="6">{{old('description')}}</textarea>
                            <div style="color:red;height:10px">@error('description'){{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select id="cate" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">Chọn danh mục</option>
                                {{!! $htmlOption !!}}
                            </select>
                            <div style="color:red;height:10px">@error('category_id'){{ $message }} @enderror</div>
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
    </div>
@stop

@section('js')
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
