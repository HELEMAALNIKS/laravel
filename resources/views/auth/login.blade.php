@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('login') }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="mb-4" src="{!! url('images/bootstrap-logo.svg') !!}" alt="" width="72" height="57">
        
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Email or Username</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>
            <div class="row">
                <div class="col-sm">
                    <a href="/register" class="w-100 btn btn-lg btn-secondary">Register</a>
                </div>
                <div class="col-sm">
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

            </div>
        </div>

        
        @include('auth.partials.copy')
    </form>
@endsection