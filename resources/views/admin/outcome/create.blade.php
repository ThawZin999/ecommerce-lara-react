@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('outcome.index') }}" class="btn btn-dark">All Outcome</a>
    </div>
    <hr>
    <form action="{{ route('outcome.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Enter Title</label>
            <input type="text" name="title" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Enter Amount</label>
            <input type="text" name="amount" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Enter Description</label>
            <textarea type="text" name="description" id="" class="form-control"></textarea>
        </div>
        <input type="submit" value="Create" class="btn btn-primary">
    </form>
@endsection
