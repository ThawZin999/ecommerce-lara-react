@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('brand.index') }}" class="btn btn-dark">All Brand</a>
    </div>
    <hr>
    <form action="{{ route('brand.update', $brand->slug) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Enter brand Name</label>
            <input type="text" name="name" id="" value="{{ $brand->name }}" class="form-control" placeholder=""
                aria-describedby="helpId">
        </div>
        <input type="submit" value="Update" class="btn btn-primary">
    </form>
@endsection
