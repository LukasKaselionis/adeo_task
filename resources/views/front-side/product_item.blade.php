@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="shadow p-3 mb-5 bg-white rounded">
            <div class="row no-gutters">
                <div class="col-md-4">
                    @if ($product->cover)
                        <img class="pr-2" width="100%" height="100%"
                             src="{{ asset('storage/'.$product->cover) }}"
                             alt="{{ $product->title }}">
                    @else
                        <img class="pr-2" width="100%" height="100%"
                             src="{{ asset('assets/noimage.jpg') }}"
                             alt="noimage">
                    @endif
                </div>
                <div class="col-md-8">
                    <h2 class="card-title">{{ $product->title }}</h2>
                    <div class="stars p-0 m-0">
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                        <span><i class="material-icons">star</i></span>
                    </div>
                    <p class="text-muted">{{ $product->SKU }}</p>
                    <p>{{ $product->description }}</p>
                    <span>€{{ $product->base_price }}</span><br>
                    <span>€{{ $product->special_price }}</span>
                </div>
            </div>
            <a class="btn btn-block btn-primary mt-2" href="{{ route('home') }}">Close</a>
        </div>
    </div>
@endsection