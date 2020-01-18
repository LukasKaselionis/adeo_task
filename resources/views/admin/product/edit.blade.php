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
                                <input type="text" id="title" name="title" class="form-control"
                                       value="{{ old('title', $product->title) }}">
                            </div>

                            <div class="form-group">
                                <label for="sku">{{ __('SKU') }}</label>
                                <input type="text" id="sku" name="sku" class="form-control"
                                       value="{{ old('sku', $product->SKU) }}">
                            </div>

                            <div class="form-group">
                                <label for="base_price">{{ __('Base price') }}</label>
                                <input type="number" id="base_price" name="base_price" class="form-control"
                                       value="{{ old('base_price', $product->base_price) }}">
                            </div>

                            <div class="form-group">
                                <label for="special_price">{{ __('Base price') }}</label>
                                <input type="number" id="special_price" name="special_price" class="form-control"
                                       value="{{ old('special_price', $product->special_price) }}">
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea style="width: 100%" name="description"
                                          id="description">{{ old('description', $product->description) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="is_enable">Is product active?</label>
                                <select class="form-control" name="is_enable" id="is_enable">
                                    <option value="1" @if ($product->is_enable == '1') selected="selected" @endif>Yes</option>
                                    <option value="0" @if ($product->is_enable == '0') selected="selected" @endif>No</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-md btn-outline-primary"
                                       value="{{ __('Save') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection