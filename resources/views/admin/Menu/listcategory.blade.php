@extends('admin.main')
@section('content')
     <table class="table">
        <thead>
            <th style="width: 50px;">Code</th>
            <th>Name</th>
            <th>Update At</th>
            <th >&nbsp;</th>
        </thead>
        <tbody>
            {!! \App\Helper\helper::category($categories) !!}
        </tbody>

     </table>


@endsection