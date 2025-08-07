@extends('layouts.master')
@section('title', 'Sign-up | Canteen App')
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
                            <h4 class="text-center mb-4">Sign up your account</h4>
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="mb-1"><strong>Name</strong></label>
                                    <input type="text" name="name" class="form-control" placeholder="name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1"><strong>Email</strong></label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="hello@example.com" value="{{ old('email') }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1"><strong>Password</strong></label>
                                    <input type="password" name="password" class="form-control"
                                        value="{{ old('password') ?? 'Password' }}">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1"><strong>Class</strong></label>
                                    <input type="text" name="class" class="form-control" value="{{ old('class') }}">
                                    @error('class')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1"><strong>Birthday</strong></label>
                                    <input type="date" class="form-control" name="birthday"
                                        value="{{ old('birthday') }}">
                                    @error('birthday')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1"><strong>Address</strong></label>
                                    <textarea class="form-control" name="address">{{ old('address') }}</textarea>
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Gender</strong></label>
                                    <div>
                                        <select name="gender" class="default-select form-control wide mb-1">
                                            <option value="">Select</option>
                                            <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki - laki
                                            </option>
                                            <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                    </div>

                                    @error('gender')
                                        <small class="text-danger d-block mt-1">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                </div>
                            </form>
                            <div class="new-account mt-3">
                                <p>Already have an account? <a class="text-primary" href="{{ route('sign-in') }}">Sign
                                        in</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
