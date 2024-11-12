@extends('admin.main')

@section('header')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST" enctype="multipart/form-data"> <!-- Thêm enctype để hỗ trợ upload file -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Name</label>
                        <input type="text" name="name" value="{{ $animal->name }}" class="form-control" placeholder="Nhập tên động vật" required>
                    </div>

                    <div class="form-group">
                        <label>Animal type</label>
                        <select name="species" id="species" class="form-control" required>
                            <option value="0" disabled selected></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->code }}"{{$animal->species==$category->code?'selected':' '}} >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                  


            <div class="form-group">
                <label for="menu">Images</label>
                <input type="file" class="form-control" id="upload" name="images[]" multiple > 
                <div id="image_show" class="mt-3">
                    <a href="{{$animal->thumb}}" target="_blank">
                    <img src="{{$animal->thumb}}"  width="100px">
                
                
                </a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{$animal->thumb}}" >
            </div>
            
                </div>
            </div>

            <div class="form-group">
                <label>Habitat</label>
                <textarea name="habitat" class="form-control">{{ $animal->habitat }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Height</label>
                        <input type="number" name="height" value="{{ $animal->height }}" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Weight</label>
                        <input type="number" name="weight" value="{{ $animal->weight }}" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control"  value="$animal->status" enctype>
                    <option value="endangered" {{ $animal->status=='endangered'? 'selected':''}}>Endangered</option>
                    <option value="vulnerable" {{ $animal->status=='vulnerable'? 'selected':''}}>Vulnerable</option>
                    <option value="safe" {{ $animal->status=='safe'? 'selected':''}}>Safe</option>
                </select>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="content" class="form-control">{{ $animal->description }}</textarea>
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
