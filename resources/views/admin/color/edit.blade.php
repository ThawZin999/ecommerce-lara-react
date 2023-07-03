@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('color.index') }}" class="btn btn-dark">All color</a>
    </div>
    <hr>
    <form action="{{ route('color.update', $color->slug) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Enter color Name</label>
            <input type="text" name="name" id="" value="{{ $color->name }}" class="form-control" placeholder=""
                aria-describedby="helpId">
        </div>
        <input type="submit" value="Update" class="btn btn-primary">
    </form>
@endsection
