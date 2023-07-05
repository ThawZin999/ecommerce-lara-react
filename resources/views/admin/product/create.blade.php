@extends('admin.layout.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-selection {
            height: 3em !important;
        }
    </style>
@endsection
@section('content')
    <div>
        <a href="{{ route('product.index') }}" class="btn btn-dark">All Products</a>
    </div>
    <hr>
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8">
                {{-- product-info --}}
                <div class="card p-4">
                    <small class="text-muted">Product Info</small>
                    <div class="form-group">
                        <label for="">Enter Prouduct Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Choose Product Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Enter Prouduct Description</label>
                        <textarea name="description" id="" class="form-control"></textarea>
                    </div>
                </div>
                <div class="card p-4">
                    <small class="text-muted">Product Pricing</small>
                    <div class="form-group">
                        <label for="">Total Quantity</label>
                        <input type="number" name="total_quantity" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Buy Price</label>
                        <input type="number" name="buy_price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Sale Price</label>
                        <input type="number" name="sale_price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Discounted Price</label>
                        <input type="number" name="discounted_price" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card p-4">
                    <div class="form-group">
                        <label for="">Choose Category</label>
                        <select name="category_slug" id="category">
                            @foreach ($category as $s)
                                <option value="{{ $s->slug }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Choose Supplier</label>
                        <select name="supplier_slug", id="supplier">
                            @foreach ($supplier as $s)
                                <option value="{{ $s->slug }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Choose Brand</label>
                        <select name="brand_slug" id="brand">
                            @foreach ($brand as $s)
                                <option value="{{ $s->slug }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Choose Color</label>
                        <select name="color_slug[]" id="color" multiple>
                            @foreach ($color as $s)
                                <option value="{{ $s->slug }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="submit" value="Create" class="btn btn-primary mt-4">
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#category').select2();
            $('#supplier').select2();
            $('#brand').select2();
            $('#color').select2();
        });
    </script>
@endsection
