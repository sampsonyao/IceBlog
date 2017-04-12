@extends('layouts.app')

@section('content')

<div class="app layout-fixed-header bg-white usersession">
    <div class="full-height">
        <div class="center-wrapper">
            <div class="center-content">
              <div class="row no-margin">
                <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="text-center mb15">
                          <h1>Tech Blog</h1>
                        </div>

                        <p class="text-center mb30">Create your account.</p>

                        <div class="form-inputs">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control input-lg" name="name" value="{{ old('name') }}" placeholder="Enter Your Full Name" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="Enter Your E-Mail Address" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Enter a Password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation" placeholder="Confirm Password" required>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block btn-lg mb15" type="submit">Create Account</button>

                        <p class="text-left">By clicking signin up, you agree to our <a href="javascript:;" class="text-primary">Terms of services &amp; Policies</a>.</p>
                        <p class="text-center">Already have an account? <a href="{{ route('login') }}" class="text-primary">Sign in</a></p>
                    </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection


