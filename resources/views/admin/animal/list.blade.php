@extends('admin.main')
@section('content')
     <table class="table">
        <thead>
            <th style="width: 200px;"> Animal Type</th>
           
            <th>Name</th>
            <th>images</th>
            
            <th>status</th>
            <th>Update At</th>
            <th >&nbsp;</th>
        </thead>
        <tbody>
        {!! \App\Helper\helper::animal($animals) !!}
        </tbody>
        


     </table>
     {{ $animals->links('pagination::bootstrap-4') }}

     


@endsection
