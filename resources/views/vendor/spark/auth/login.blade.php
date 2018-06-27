@extends('spark::layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <p class="m-t text-center"><a href="/"><img src="/images/pmaps-logo-blue.png" width="140"></a></p>

                <h2 class="lead text-center">Login to your account</h2>

                <div class="panel-body">
                    @include('spark::shared.errors')

                    <form class="form-horizontal" role="form" method="POST" action="/login">
                        {{ csrf_field() }}

                        <!-- E-Mail Address -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa m-r-xs fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Reset Password</a>
                            </div>
                        </div>
                    </form>


                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 text-center">
                        <p><strong>OR</strong></p>
                        <p><a href="/register" class="btn btn-success btn-block">Sign up for a new account</a></p>
                        <p><a href="{{ route('social.redirect', ['provider' => 'google']) }}" class="btn btn-primary-outline btn-block"><i class="fa fa-google fa-fw"></i> Login with Google</a></p>
                        <p><a href="/redirect" class="btn btn-primary-outline btn-block"><i class="fa fa-facebook-official fa-fw"></i> Login with Facebook</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
