@extends('layouts.master')
@section('title', 'Sign-up | Canteen App')
@section('content')
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-7">
            <div class="form-input-content text-center error-page">
                <h1 class="error-text fw-bold">404</h1>
                <h4><i class="fa fa-exclamation-triangle text-warning"></i> The page you were looking for is not found!</h4>
                @if (session('error'))
                    <p>{{ session('error') }}</p>
                @endif
                <div>
                    <a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
