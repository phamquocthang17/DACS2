@extends('admin.main')
@section('content')
@section('header')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

<form action="" method="POST">
        <div class="card-body">
            
            <div class="form-group">
                <label>Code </label>
                <input type="text" name="code" value="{{$category->code}}" class="form-control"  placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label>Name </label>
                <input type="text" name="name"   value="{{$category->name}}" class="form-control"  placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="content"  value="{{$category->description}}" class="form-control"></textarea>
            </div>


            

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo Danh Mục</button>
        </div>

        @csrf
    </form>


@endsection

@section('footer')
<script>
        CKEDITOR.replace('content');
    </script>

@endsection