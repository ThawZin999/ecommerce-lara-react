@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('supplier.index') }}" class="btn btn-dark">All supplier</a>
    </div>
    <hr>
    <form action="{{ route('supplier.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Enter supplier Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <input type="submit" value="Create" class="btn btn-primary">
    </form>
@endsection
