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
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign Up</h4>
                            <div class="row mt-3">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row text-center py-3 mt-3">
                            <div class="col-12 mx-auto">

                                <button id="customerBtn" type="button" class="btn w-auto me-1 mb-0">Customer</button>

                                <button id="companyBtn" type="button" class="btn w-auto me-1 mb-0">Company</button>


                            </div>
                        </div>
                        <form id="company" role="form" class="text-start">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Company Name</label>
                                        <input type="text" class="form-control" name="company_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Phone</label>
                                <input type="tel" class="form-control" name="phone" pattern="[0-9]{10,15}">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Trade Registry No</label>
                                <input type="text" class="form-control" name="trade_registry">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Tax No</label>
                                        <input type="number" class="form-control" name="tax_no" min="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Tax Identity</label>
                                        <input type="number" class="form-control" name="tax_identity_no" min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                            <div class="text-center">
                                <button id="btn-register-company" type="button"
                                    class="btn bg-gradient-primary w-100 my-4 mb-2">Register</button>
                            </div>
                        </form>

                        <form id="customer" role="form" class="text-start">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Phone</label>
                                <input type="tel" class="form-control" name="phone" pattern="[0-9]{10,15}">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Identity</label>
                                <input type="text" class="form-control" name="identity">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                            <div class="text-center">
                                <button id="btn-register-customer" type="button"
                                    class="btn bg-gradient-primary w-100 my-4 mb-2">Register</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var registerUrl = "{{ route('register') }}";
    </script>
    <script src="{{asset('assets/js/custom/auth/register.js')}}"></script>
@endsection
