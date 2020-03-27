@extends('layout')

@section('include')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container login-container">
        <div class="row login-row">
            <div class="col-md-6 login-form-1">
                <h3>Login</h3>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Your Password *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                    {{-- <div class="form-group">
                        <a href="#" class="ForgetPwd">Forget Password?</a>
                    </div> --}}
                </form>
            </div>
            <div class="col-md-6 login-form-2">
                <h3>Register</h3>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Your Password *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                    {{-- <div class="form-group">
                        <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
