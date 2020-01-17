@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="d-flex justify-content-between align-items-center">
                            {{ __('Products') }}<a href="{{ route('admin.product.create') }}"
                                                   class="btn btn-sm btn-success">Add</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <th>SKU</th>
                                <th>Base price</th>
                                <th>Special price</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>

                            @foreach($products as $product)

                                <tr>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->SKU }}</td>
                                    <td>{{ $product->base_price }}</td>
                                    <td>{{ $product->special_price }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td class="d-flex justify-content-between">
                                 
                                        <form class="d-inline"
                                                action="{{ route('admin.product.destroy', ['product' => $product->id]) }}"
                                                method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" onclick="return confirm('Are you sure?');"
                                                   class="btn btn-sm btn-danger" name="deleteProduct"
                                                   value="Delete">
                                        </form>
                                    </td>
                                </tr>

                            @endforeach

                            <tfoot>{{ $products->links() }}</tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection