@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('income.create') }}" class="btn btn-success">Create Income</a>
        <button class="btn btn-warning">{{ $todayIncome }}</button>
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

        @foreach ($income as $i)
            <tbody>
                <tr>
                    <td>{{ $i->title }}</td>
                    <td>{{ $i->amount }}Ks</td>
                    <td>{{ $i->description }}</td>

                </tr>
            </tbody>
        @endforeach
    </table>
    {{ $income->links() }}
@endsection
