@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('category.create') }}" class="btn btn-success">Create Category</a>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Option</th>
            </tr>
        </thead>

        @foreach ($category as $c)
            <tbody>
                <tr>
                    <td>{{ $c->name }}</td>
                    <td>
                        <a href="{{ route('category.edit', $c->slug) }}" class="btn btn-sm btn-primary">Edit</a>
                        <span>
                            <form action="{{ route('category.destroy', $c->slug) }}" method="post"
                                onsubmit="return confirm('Are you sure to delete this category?')" class="d-inline">
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
    {{ $category->links() }}
@endsection
