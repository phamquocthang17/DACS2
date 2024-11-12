@extends('admin.main')

@section('header')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST" enctype="multipart/form-data"> <!-- Thêm enctype để hỗ trợ upload file -->
        <div class="card-body">
           

            <div class="form-group">
                <label>Title</label>
                <textarea name="title" class="form-control">{{ old('title') }}</textarea>
            </div>

          


            <div class="form-group">
                <label>Content</label>
                <textarea name="body" id="body" class="form-control">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label>Excerpt</label>
                <textarea name="excerpt" id="excerpt" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Images</label>
                <input type="file" class="form-control" id="upload" name="images[]" multiple> 
                <div id="image_show"></div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label for="menu">Images derc</label>
                <input type="file" class="form-control" id="uploadpath" name="images[]" multiple> 
                <div id="image_showpath"></div>
                <input type="hidden" name="path" id="path">
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
        CKEDITOR.replace('body');
        CKEDITOR.replace('excerpt');
    </script>
@endsection
