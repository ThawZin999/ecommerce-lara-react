@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('category.index') }}" class="btn btn-dark">All Category</a>
    </div>
    <hr>
    <form action="{{ route('category.update', $cat->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Enter Category Name</label>
            <input type="text" name="name" id="" value="{{ $cat->name }}" class="form-control" placeholder=""
                aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Enter Category Name(MM)</label>
            <input type="text" name="mm_name" value="{{ $cat->mm_name }}" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Enter Category Name</label>
            <input type="file" name="image" id="" class="form-control">
            <img src="{{ asset('images/' . $cat->image) }}" width="100" class="img-thumbmail" alt="cat-image">
        </div>
        <input type="submit" value="Update" class="btn btn-primary">
    </form>
@endsection
