@extends('layout.master')

@section('header-text', 'Product Detail')

@section('content')
    <div class="w-80 mt-5">

        <div class="row">

            <div class="col-12 col-sm-12 col-md-3 col-lg-3 ">
                <div class="card">
                    <div class="card-header bg-dark text-white">All Category</div>

                    @foreach ($category as $c)
                        <a href="{{ url('product?category=' . $c->slug) }}">
                            <li class="list-group-item">
                                <img src="{{ $c->image_url }}" width="30" alt="">
                                {{ $c->name }}
                                <small class="float-right badge badge-dark">{{ $c->product_count }}</small>
                            </li>
                        </a>
                    @endforeach

                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-9 col-lg-9" id="app">
            </div>

        </div>

    </div>
@endsection

@section('script')
    <script>
        window.product_slug = "{{ $slug }}"
    </script>
    @vite('resources/js/productDetail.jsx')
@endsection
