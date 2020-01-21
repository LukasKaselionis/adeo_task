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
                        <h4 class="product_base_price m-0">Base price: €{{ $product->base_price }}</h4>
                        <span class="taxes text-muted">
                            VAT: €{{ \App\Helpers\calculate::calculateVAT($product->base_price, $product->tax) }}</span>
                        @if($product->discount >= 0.01)
                            <h4 class="product_final_price mb-2">
                                <del>Final price:
                                    €{{ \App\Helpers\calculate::calculateFinalPrice($product->base_price, $product->tax) }}
                                </del>
                            </h4>
                            <h4 class="product_final_price mb-2">
                                Price with discount:
                                €{{ \App\Helpers\calculate::calculateFinalPriceWithDiscount($product->base_price, $product->tax, $product->discount) }}
                            </h4>
                            <p>You save: €
                                {{ \App\Helpers\calculate::calculateFinalPrice($product->base_price, $product->tax) - \App\Helpers\calculate::calculateFinalPriceWithDiscount($product->base_price, $product->tax, $product->discount) }}
                                <span class="text-primary">{ {{ $product->discount * 100 }}% }</span>
                            </p>
                        @else
                            <h4 class="product_final_price mb-2">Final price:
                                €{{ \App\Helpers\calculate::calculateFinalPrice($product->base_price, $product->tax) }}
                            </h4>
                        @endif
                        <button class="btn btn-primary col-6">Buy now</button>
                        <a href="{{ route('front.product.show', ['product' => $product->id]) }}">
                            <button class="btn btn-primary">Details</button>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection