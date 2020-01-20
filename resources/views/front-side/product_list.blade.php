@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($products as $product)
                <div class="col-12 col-md-4 col-lg-3 m-2 shadow p-3 mb-5 bg-white rounded">
                    <div class="product_cover">
                        @if ($product->cover)
                            <img width="100%" height="50%"
                                 src="{{ asset('storage/'.$product->cover) }}"
                                 alt="{{ $product->title }}">
                        @else
                            <img width="100%" height="50%"
                                 src="{{ asset('assets/noimage.jpg') }}"
                                 alt="">
                        @endif
                    </div>
                    <h1 class="product_title">{{ $product->title }}</h1>
                    <span class="product_sku">{{ $product->SKU }}</span>
                    <p class="product_description">
                        {{ $product->description }}
                    </p>
                    <h3 class="product_base_price">{{ $product->base_price }}</h3>
                    <h3 class="product_special_price">{{ $product->special_price }}</h3>
                    <button class="btn btn-primary">Buy now</button>
                    <button class="btn btn-primary">Details</button>
                </div>
            @endforeach
        </div>
    </div>
@endsection