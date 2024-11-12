@extends('admin.main')
@section('content')
     <table class="table">
        <thead>
            <th>Title</th>
            <th>images</th>
            <th>Content</th>
            <th>Create at</th>
            <th >&nbsp;</th>
        </thead>
        <tbody>
        {!! \App\Helper\helper::post($post)!!}
            
        </tbody>

     </table>
     {{ $post->links('pagination::bootstrap-4') }}


@endsection