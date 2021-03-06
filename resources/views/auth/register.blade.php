@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/background.css') }}">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="wrap">
                <p class="form-title">
                    Sign Up</p>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label"></label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" placeholder="名前" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('personal_id') ? ' has-error' : '' }}">
                            <label for="personal_id" class="col-md-4 control-label"></label>

                            <div class="col-md-12">
                                <input id="personal_id" type="personal_id" class="form-control" placeholder="ID (半角英数字のみ)" name="personal_id" value="{{ old('personal_id') }}" required>

                                @if ($errors->has('personal_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('personal_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"></label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" placeholder="パスワード (半角英数字・6文字以上)" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label"></label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" placeholder="パスワード (確認)" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-black btn-ghost custom">
                                    Signup
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection