@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('category.index') }}" class="btn btn-dark">All Category</a>
    </div>
    <hr>
    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Enter Category Name</label>
            <input type="text" name="name" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Enter Category Name(MM)</label>
            <input type="text" name="mm_name" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Enter Category Name</label>
            <input type="file" name="image" id="" class="form-control"></textarea>
        </div>
        <input type="submit" value="Create" class="btn btn-primary">
    </form>
@endsection
