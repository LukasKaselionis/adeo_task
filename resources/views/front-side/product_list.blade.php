@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($products as $product)
                @if($product->is_enable != 0)
                    <div class="col-12 col-md-4 col-lg-3 m-2 shadow p-3 mb-5 bg-white rounded">
                        <div class="product_cover">
                            @if ($product->cover)
                                <img width="100%" height="50%"
                                     src="{{ asset('storage/'.$product->cover) }}"
                                     alt="{{ $product->title }}">
                            @else
                                <img width="100%" height="50%"
                                     src="{{ asset('assets/noimage.jpg') }}"
                                     alt="noimage">
                            @endif
                        </div>
                        <h1 class="product_title">{{ $product->title }}</h1>
                        <label class="product_sku text-muted">{{ $product->SKU }}</label>
                        <p class="product_description">
                            {{ Str::words($product->description, 50, '...' ) }}
                        </p>
                        <h3 class="product_base_price">€{{ $product->base_price }}</h3>
                        <h3 class="product_special_price">€{{ $product->special_price }}</h3>
                        <button class="btn btn-primary">Buy now</button>
                        <a href="{{ route('front.product.show', ['product' => $product->id]) }}">
                            <button class="btn btn-primary">Details</button>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection