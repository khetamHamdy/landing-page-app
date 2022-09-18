@extends('admin.auth.layouts')
@section('content')

    <!--begin::Signup-->
    <div class="login-form">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="font-size-h1">Sign Up</h3>
            <p class="text-muted font-weight-bold">Enter your details to create your account</p>
        </div>
        <!--begin::Form-->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
        <form class="form" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Fullname"
                       name="name" autocomplete="off"/>
            </div>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Email"
                       name="email" autocomplete="off"/>
            </div>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="location"
                       name="location" autocomplete="off"/>
            </div>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="phone"
                       name="phone" autocomplete="off"/>
            </div>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Job Title"
                       name="job_title" autocomplete="off"/>
            </div>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="file" placeholder="Image" name="image"/>
            </div>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Password"
                       name="password" autocomplete="off"/>
            </div>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="password"
                       placeholder="Confirm password" name="password_confirmation"" autocomplete="off" />
            </div>

            <div class="form-group d-flex flex-wrap flex-center">
                <button type="submit" id="kt_login_signup_submit"
                        class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit
                </button>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signup-->
@endsection
