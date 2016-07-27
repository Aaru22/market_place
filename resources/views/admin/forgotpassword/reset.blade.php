
@extends('layout.admin_default')
@section('sidemenu')@stop 
@section('navheader')@stop 
@section('content')
<div class="container">
    <section class="login-form">
        <form method="post" action="{{URL::route('postresetpassword')}}" role="login" data-parsley-validate="">
        {{ csrf_field() }}
           <img src="{{ asset('public/img/Logo.png')}}" alt="" class="profile-img-card">
                @include('errors.index')            
            <div class="row">
                <div class="col-xs-12 m-b-30">
                    <input  type="password" 
                            placeholder="Password" 
                            name="password" 
                            id="password" 
                            tabindex="1"
                            class="form-control passwordicon" 
                            data-parsley-required-message="Password is required"
                            data-parsley-type="alphanum"
							data-parsley-errors-container=".errormsg4"
                            data-parsley-type-message="Password should be alphanumeric."
                            data-parsley-minlength="6"
                            data-parsley-minlength-message="Password should be greater than 6 characters."
                            autocomplete="off"
                            required/>
                <span class="errormsg4"></span>
            </div>              
            </div>
            <div class="row">
                <div class="col-xs-12 m-b-30">
                    <input  type="password" 
                            placeholder="Confirm Password" 
                            name="conf_password" 
                            id="conf_password" 
                            class="form-control passwordicon"
                            tabindex="2"
                            data-parsley-required-message="Confirm Password is required"
                            data-parsley-type="alphanum"
                            data-parsley-errors-container=".errormsg5"
                            data-parsley-type-message="Confirm Password should be alphanumeric."
                            data-parsley-minlength="6"
                            data-parsley-minlength-message="Confirm Password should be greater than 6 characters."
                            data-parsley-equalto="#password"
                            data-parsley-equalto-message="Confirm password doesn't match password."
                            autocomplete="off"
                            required/>
                    <span class="errormsg5"></span>
                </div>              
            </div>
            <input type="hidden" name="email" value="{{$email}}"/>
            <input type="hidden" name="token" value="{{$token}}"/>
            <button type="submit" name="submit" tabindex="3" class="btn btn-lg btn-block btn-success login_btn">Reset Password</button>
            <section class="forgot">
                <a href="{{URL::route('login')}}" tabindex="4">Back</a>
            </section>
        </form>
        </section>
</div>

@stop
@section('footer')@stop