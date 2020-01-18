@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary">{{ __('Admin dashboard') }}</div>
                    <div class="card-body">
                        You are logged in to admin side!
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection