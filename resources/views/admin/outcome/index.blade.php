@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('outcome.create') }}" class="btn btn-success">Create Outcome</a>
        <button class="btn btn-warning">{{ $todayOutcome }}</button>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Amount</th>
                <th>Description</th>

            </tr>
        </thead>

        @foreach ($outcome as $i)
            <tbody>
                <tr>
                    <td>{{ $i->title }}</td>
                    <td>{{ $i->amount }}Ks</td>
                    <td>{{ $i->description }}</td>

                </tr>
            </tbody>
        @endforeach
    </table>
    {{ $outcome->links() }}
@endsection
