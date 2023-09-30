@extends('layout.master')
@section('header-text', 'Profile')
@section('content')
    <div id="app"></div>
@endsection

@section('script')
    @vite('resources/js/profile.jsx')
@endsection
