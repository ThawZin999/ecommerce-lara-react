@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('color.index') }}" class="btn btn-dark">All color</a>
    </div>
    <hr>
    <form action="{{ route('color.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Enter color Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <input type="submit" value="Create" class="btn btn-primary">
    </form>
@endsection
