@extends('admin.main')
@section('header')
<script src="/ckeditor/ckeditor.js"></script>
@endsection



@section('content')
<form action="" method="POST">
        <div class="card-body">
            
            <div class="form-group">
                <label>Code </label>
                <input type="text" name="code" class="form-control"  placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label>Name </label>
                <input type="text" name="name" class="form-control"  placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="content" class="form-control"></textarea>
            </div>


            

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{$title}}</button>
        </div>

        @csrf
    </form>


@endsection

@section('footer')
<script>
        CKEDITOR.replace('content');
    </script>

@endsection