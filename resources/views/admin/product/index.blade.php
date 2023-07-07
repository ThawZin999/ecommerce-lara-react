    @extends('admin.layout.master')

    @section('content')
        <div>
            <a href="{{ route('product.create') }}" class="btn btn-success">Create Product</a>
        </div>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Remain Quantity</th>
                    <th>Add or Remove</th>
                    <th>Option</th>
                </tr>
            </thead>

            @foreach ($products as $p)
                <tbody>
                    <tr>
                        <td><img src="{{ asset('/images/' . $p->image) }}" style="width: 100px" class="img-thumbnail"
                                alt=""></td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->total_quantity }}</td>
                        <td>
                            <a href="{{ url('admin/create-product-remove', $p->slug) }}" class="btn btn-sm btn-warning">-</a>
                            <a href="{{ url('admin/create-product-add', $p->slug) }}" class="btn btn-sm btn-warning">+</a>
                        </td>
                        <td>
                            <a href="{{ route('product.edit', $p->slug) }}" class="btn btn-sm btn-primary">Edit</a>
                            <span>
                                <form action="{{ route('product.destroy', $p->slug) }}" method="post"
                                    onsubmit="return confirm('Are you sure to delete this products?')" class="d-inline">
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
        {{ $products->links() }}
    @endsection
