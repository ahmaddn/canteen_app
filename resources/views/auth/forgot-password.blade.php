@extends('layouts.master')
@section('title', 'Forgot Password | Canteen App')
@section('content')
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">
            <div class="authincation-content">
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        <div class="auth-form">
                            <div class="text-center mb-3">
                                <a href="#"><img src="{{ asset('images/logo-full.png') }}" alt=""></a>
                            </div>
                            <h4 class="text-center mb-4">Forgot Password</h4>
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ session('error') }}
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="btn-close"></button>
                                </div>
                            @endif
                            <form action="{{ route('forgot-password') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label><strong>Email</strong></label>
                                    <input type="email" class="form-control" value="hello@example.com" name="email">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Forgot Password</button>
                                    <a class="btn btn-secondary btn-block mt-3" href="{{ url('/') }}">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
