@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('brand.create') }}" class="btn btn-success">Create Brand</a>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Option</th>
            </tr>
        </thead>

        @foreach ($brand as $c)
            <tbody>
                <tr>
                    <td>{{ $c->name }}</td>
                    <td>
                        <a href="{{ route('brand.edit', $c->slug) }}" class="btn btn-sm btn-primary">Edit</a>
                        <span>
                            <form action="{{ route('brand.destroy', $c->slug) }}" method="post"
                                onsubmit="return confirm('Are you sure to delete this brand?')" class="d-inline">
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
    {{ $brand->links() }}
@endsection
