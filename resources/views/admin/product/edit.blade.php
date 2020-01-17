@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">{{ __('Product edit') }}</div>
                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.product.update', ['product' => $product->id]) }}"
                              enctype="multipart/form-data"
                              method="post">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input type="text" id="title" name="name" class="form-control"
                                       value="{{ old('title', $product->title) }}">
                            </div>

                            <div class="form-group">
                                <label for="price">{{ __('Price') }}</label>
                                <input type="text" id="price" name="price" class="form-control"
                                       value="{{ old('price', $product->price) }}">
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea style="width: 100%" name="description"
                                          id="description">{{ old('description', $product->description) }}</textarea>
                            </div>


                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-sm btn-outline-primary"
                                       value="{{ __('Save') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection