@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="d-flex justify-content-between align-items-center">
                            {{ __('New Products') }}<a href="{{ route('admin.product.index') }}"
                                                       class="btn btn-sm btn-success">Back</a>
                        </div>
                    </div>

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

                        <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Product 1"
                                       value="{{ old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="sku">{{ __('SKU') }}</label>
                                <input type="text" id="sku" name="sku" class="form-control" placeholder="XXX-XXX"
                                       value="{{ old('sku') }}">
                            </div>

                            <div class="form-group">
                                <label for="base_price">{{ __('Base price') }}</label>
                                <input type="number" id="base_price" name="base_price" class="form-control" step="0.01"
                                       placeholder="1.99"
                                       value="{{ old('base_price') }}">
                            </div>

                            <div class="form-group">
                                <label for="special_price">{{ __('Special price') }}</label>
                                <input type="number" id="special_price" name="special_price" class="form-control"
                                       placeholder="1.49"
                                       step="0.01"
                                       value="{{ old('special_price') }}">
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea style="width: 100%" name="description"
                                          id="description"
                                          placeholder="Describe product here..."
                                >{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="cover">{{ __('Cover') }}</label>
                                <input class="form-control-file" type="file" id="cover" name="cover" value="">
                            </div>

                            <div class="form-group">
                                <label for="is_enable">Is product active?</label>
                                <select class="form-control" name="is_enable" id="is_enable">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit" name="submit"
                                       value="{{ __('Save') }}">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

