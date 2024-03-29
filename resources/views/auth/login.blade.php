@extends('frontend.master')
@section('content')

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">user <span class="tx-info tx-normal">login</span></div>
        
        <div class="tx-center mg-b-60">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

        </div>
        
        <form action="{{ route('user.login') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Enter your email">
            </div><!-- form-group -->
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter your password">
                {{-- <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a> --}}
            </div><!-- form-group -->
            <button type="submit" class="btn btn-info btn-block">Sign In</button>
        </form>

        <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ route('user.register') }}" class="tx-info">Sign Up</a></div>
    </div><!-- login-wrapper -->
</div>

@endsection