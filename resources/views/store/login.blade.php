@extends('store.layouts.app')
@section('content')
              
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Login & Register</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">    
                        <div class="register-form">
                            <form action="{{route('register')}}" method="POST">
                                @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="customerform" value="customerform">
                                    <label>First Name"</label>
                                    <input id="firstname" type="text" class="form-control form-control-user @error('firstname') is-invalid @enderror" placeholder="First Name" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name"</label>
                                    <input id="lastname" type="text" class="form-control form-control-user @error('lastname') is-invalid @enderror" placeholder="Last Name" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input id="phone" type="phone" class="form-control form-control-user @error('phone') is-invalid @enderror" placeholder="Cell number" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control form-control-user @error('password')  is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                                </div>
                                <div class="col-md-6">
                                    <label>Retype Password</label>
                                    <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Repeat Password" required autocomplete="new-password">
                                </div>
                                <div class="col-md-12">
                                    <button class="btn" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login-form">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                            <div class="row">
                                <input type="hidden" name="customerform" value="customerform">
                                <div class="col-md-6">
                                    <label>E-mail / Username</label>
                                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheck" name="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                        <label class="custom-control-label" for="customCheck">
                                            {{ __('Keep me signed in') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login End -->

@endsection