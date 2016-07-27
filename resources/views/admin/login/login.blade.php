
@extends('admin.layout.admin_default')
@section('sidemenu')@stop 
@section('navheader')@stop 
@section('content')
   
<div class="container">
    <section class="login-form">
        <form method="POST" action="{{URL::route('postlogin')}}" id="login" role="login" parsley-validate>
           <img src="{{ asset('public/img/Logo.png')}}" alt="" class="profile-img-card">
            <div class="row">
                <div class="col-xs-12 loginerror">@include('admin.errors.index') </div>
                
                <div class="col-xs-12 m-b-20">
                    <input  type="username" 
                            name="username" 
                            placeholder="Username"  
                            tabindex="1"                           
                            class="form-control input-lg usericon" data-parsley-errors-container=".errormsg1"
                            data-parsley-required-message="Username is required"
                            required/>
                    <span class="errormsg1"></span>
                </div>
                <div class="col-xs-12 m-b-30">
                    <input  type="password" 
                            name="password" 
                            placeholder="Password" 
                            tabindex="2"
                            class="form-control input-lg passwordicon" data-parsley-errors-container=".errormsg2"
                            data-parsley-required-message="Password is required"
                            required />
                    <span class="errormsg2"></span>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" name="go" tabindex="3" class="btn btn-lg btn-block btn-success login_btn" onclick="javascript:$('#login').parsley('validate');">LOGIN</button>
            <section class="forgot">
                <a href="{{ URL::route('forgotpassword')}}" tabindex="4">Forgot Password?</a>
            </section>
        </form>
        </section>
</div>

@stop
@section('footer')@stop