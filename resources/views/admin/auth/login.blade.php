@extends('admin.auth.layouts')
@section('content')

<!--begin::Signin-->
<div class="login-form login-signin">
    <div class="text-center mb-10 mb-lg-20">
        <h3 class="font-size-h1">Sign In</h3>
        <p class="text-muted font-weight-bold">Enter your username and password</p>
    </div>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <!--begin::Form-->
    <form class="form"  action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Email" name="email"  autocomplete="off" />
        </div>
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Password" name="password" autocomplete="off" />
        </div>
        <!--begin::Action-->
        <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
            <button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Sign In</button>
        </div>
        <!--end::Action-->
    </form>
    <!--end::Form-->
</div>
<!--end::Signin-->
<!--end::Login Sign in form-->
@endsection
