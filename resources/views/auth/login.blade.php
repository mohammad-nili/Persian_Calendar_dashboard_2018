@extends('layouts.app')
<style>
    div.sd{
        background: inherit;
        box-shadow: inset 0 0 0 3000px rgba(255, 255, 255, 0.66),0 0 20px rgba(134, 134, 134, 0.58);
        border: 3px #9da4ff solid;
    }
    .mylabel{
        font-size:large;
        color: darkcyan;
        direction: rtl;
    }

</style>
@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default sd" style="width: 500px;height: 400px;margin: 0 auto">
                <div class="panel-heading mylabel" style=" background: inherit;">کاربرگ ورود کاربر:</div>


                <div class="panel-body" style="margin-top: 30px">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label mylabel">: پست الکترونیکی</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Ezpour@gmail.com" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label  for="password" class="col-md-4 control-label mylabel">: گذرواژه</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input  type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><p class="mylabel" style="font-size: 15px"> مرا به خاطرت نگه دار </p>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    ورود
                                </button>

                                <a class="btn btn-danger" href="{{ route('password.request') }}">
                                    گذرواژه را فراموش کرده اید ؟
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
