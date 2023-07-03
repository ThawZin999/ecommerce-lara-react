@extends('admin.layout.master')


@section('content')
    <h1>Category Management</h1>
    {{ auth()->guard('admin')->user() }}
@endsection
