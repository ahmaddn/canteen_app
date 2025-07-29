@extends('layouts.master')
@section('title', 'Reset Password | Canteen App')
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
                            <h4 class="text-center mb-4">Reset Password</h4>
                            <form action="index.html">
                                <div class="mb-3">
                                    <label><strong>New Password</strong></label>
                                    <input type="password" class="form-control" value="Password">
                                </div>
                                <div class="mb-3">
                                    <label><strong>Confirm Password</strong></label>
                                    <input type="password" class="form-control" value="Password">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
