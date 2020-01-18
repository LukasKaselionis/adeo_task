@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary">Show Product</div>
                    @if($product->cover)
                        <img src="{{ asset('storage/'.$product->cover) }}"
                             alt="{{ $product->title }}"
                             class="card-img-top"
                             width="500"
                             height="500"
                        >
                    @endif
                    <div class="card-body text-center">
                        <h3 class="card-title">{{ $product->title }}</h3>
                        <h5 class="card-title">{{ $product->SKU }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">{{ $product->base_price }}$ - {{ $product->special_price }}$</p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-md btn-dark" href="{{ route('admin.product.index') }}">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection