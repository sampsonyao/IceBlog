@extends('layouts.app')

@section('content')

<div class="app layout-fixed-header usersession bg-white">
    <div class="full-height">
        <div class="center-wrapper">
        <div class="center-content">
            <div class="row no-margin">
                <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="text-center mb15">
                          <h1>Tech Blog</h1>
                        </div>

                        <p class="text-center mb25">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>
                        <div class="form-inputs">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="Enter Your Email address" autofocus required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block" type="submit">Send Password Reset</button>
                    </form>
                    <p class="text-center mt30">
                        <a href="{{ route('register') }}">Create an account</a> ·
                        <a href="{{ route('login') }}">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
