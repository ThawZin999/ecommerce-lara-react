@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('supplier.index') }}" class="btn btn-dark">All supplier</a>
    </div>
    <hr>
    <form action="{{ route('supplier.update', $supplier->slug) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Enter supplier Name</label>
            <input type="text" name="name" id="" value="{{ $supplier->name }}" class="form-control"
                placeholder="" aria-describedby="helpId">
        </div>
        <input type="submit" value="Update" class="btn btn-primary">
    </form>
@endsection
