@extends('auth.master')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                            <div class="row mt-3">
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" class="text-start" method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="email">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                            </div>
                            <p class="mt-4 text-sm text-center">
                                Don't have an account?
                                <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Sign
                                    up</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
