@extends('layout.head')
@section('content')
    <section id="auth" class="d-flex justify-content-center align-items-center vh-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <figure>
                        <img src="{{asset('images/ces_login.png')}}" alt="CES Background Image">
                    </figure>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <form action="{{route('registration')}}" method="POST" class="w-100">
                        @csrf
                        <h2 class="my-4 text-center">Let's Get Started</h2>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="input-group my-3">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                </div>
                                @error('first_name')
                                    <p class="text-small text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group my-3">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                </div>
                                @error('last_name')
                                    <p class="text-small text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <input type="email" name="email_address" id="email_address" class="form-control" placeholder="Email Address">
                        </div>
                        @error('email_address')
                            <p class="text-small text-danger">{{$message}}</p>
                        @enderror
                        <div class="input-group my-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        @error('password')
                            <p class="text-small text-danger">{{$message}}</p>
                        @enderror
                        <div class="d-flex justify-content-between mt-4">
                            <p class="text-muted">Already have an account?</p>
                            <a href="{{route('login')}}">Sign in instead</a>
                        </div>
                        <div class="my-2">
                            <button class="btn btn-custom w-100" type="submit">
                                <i class="fa-solid fa-right-to-bracket me-2"></i>
                                Sign up
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection