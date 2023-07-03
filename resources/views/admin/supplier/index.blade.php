@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('supplier.create') }}" class="btn btn-success">Create Supplier</a>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Option</th>
            </tr>
        </thead>
        @foreach ($supplier as $c)
            {{-- @dd($c->) --}}
            <tbody>
                <tr>
                    <td>{{ $c->name }}</td>
                    <td>
                        {{-- <a href="{{ route('supplier.edit', $c->slug) }}" class="btn btn-sm btn-primary">Edit</a> --}}
                        <span>
                            <form action="{{ route('supplier.destroy', $c->slug) }}" method="post"
                                onsubmit="return confirm('Are you sure to delete this supplier?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                            </form>
                        </span>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
    {{ $supplier->links() }}
@endsection
