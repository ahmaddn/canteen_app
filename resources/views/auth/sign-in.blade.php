@extends('layouts.master')
@section('title', 'Sign-in | Canteen App')
@section('content')
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">
            <div class="authincation-content">
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        <div class="auth-form">
                            <div class="text-center mb-3">
                                <a href="index.html"><img src="{{ asset('images/logo-full.png') }}" alt=""></a>
                            </div>
                            <h4 class="text-center mb-4">Sign in your account</h4>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="mb-1"><strong>Email</strong></label>
                                    <input type="email" name="email" class="form-control" value="hello@example.com">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1"><strong>Password</strong></label>
                                    <input type="password" name="password" class="form-control" value="Password">
                                </div>
                                <div class="row d-flex justify-content-between mt-4 mb-2">
                                    <div class="mb-3">
                                        <div class="form-check custom-checkbox ms-1">
                                            <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                            <label class="form-check-label" for="basic_checkbox_1">Remember my
                                                preference</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <a href="{{ route('forgot-password') }}">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                </div>
                            </form>
                            <div class="new-account mt-3">
                                <p>Don't have an account? <a class="text-primary" href="{{ route('sign-up') }}">Sign
                                        up</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
