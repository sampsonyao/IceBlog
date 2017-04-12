@extends('layouts.app')

@section('content')

<div class="app layout-fixed-header bg-white usersession">
    <div class="full-height">
      <div class="center-wrapper">
        <div class="center-content">
          <div class="row no-margin">
            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                    <div class="text-center mb15">
                      <h1>Tech Blog</h1>
                    </div>
                    <p class="text-center mb30">Welcome to Tech Blog. Please sign in to your account</p>
                    <div class="form-inputs">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="Enter Your Email Address" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Enter Your Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg mb15" type="submit">
                      <span>Sign in</span>
                    </button>
                    <p class="text-center">
                      Don't have an account? <a href="{{ route('register') }}" class="text-primary">Sign Up</a> Here
                      <br>
                      <a href="{{ route('password.request') }}" class="text-primary">Forgot Your Password?</a>
                    </p>

                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection

