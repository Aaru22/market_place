@extends('layout.admin_default')
@section('sidemenu')@stop 
@section('navheader')@stop 
@section('content')
<div class="container">
    <section class="login-form">
        <form method="POST" action="{{URL::route('postforgotpassword')}}" role="login" data-parsley-validate=="">
            {{ csrf_field() }}
            <img src="{{ asset('public/img/Logo.png')}}" alt="" class="profile-img-card">
            @include('errors.index') 
            <div class="row">
                <div class="col-xs-12 m-b-30">
                    <input  type="email" 
                            name="email" 
                            tabindex="1"
                            placeholder="{{ @trans('locale.email')}}" 
                            class="form-control input-lg emailicon" 
                            value="{{old('email')}}"
                            data-parsley-type="email"
							data-parsley-errors-container=".errormsg3"
                            data-parsley-required-message="Email is required" 
                            data-parsley-type-message="Email is invalid"
                            required />
                    <span class="errormsg3"></span>
                </div>              
            </div>
            <button type="submit" name="submit" tabindex="2" class="btn btn-lg btn-block btn-success login_btn">SEND</button>
            <section class="forgot">
                <a href="{{URL::route('login')}}" tabindex="3">Back</a>
            </section>
        </form>
    </section>
</div>
@stop
@section('footer')@stop