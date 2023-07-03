@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('category.index') }}" class="btn btn-dark">All Category</a>
    </div>
    <hr>
    <form action="{{ route('category.update', $cat->slug) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Enter Category Name</label>
            <input type="text" name="name" id="" value="{{ $cat->name }}" class="form-control" placeholder=""
                aria-describedby="helpId">
        </div>
        <input type="submit" value="Update" class="btn btn-primary">
    </form>
@endsection
