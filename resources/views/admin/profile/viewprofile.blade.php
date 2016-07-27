@extends('layout.admin_default')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading p-b-15">
	 <div class="pull-left p-20 p-b-0">{!! Breadcrumbs::render('viewprofile') !!}</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<h3 class="profile_heading m-b-10 m-0 col-lg-12 col-sm-12 col-xs-12 p-0">
			<span class="pull-left m-t-5">My Profile</span>
			<span class="pull-right">
				@if(Auth::user()->hasRole('Admin') )
					<a href="{{URL::route('editprofile')}}" class="btn btn-blue pull-right editicon">Edit Profile</a>
				@endif
			</span>
		</h3>
		
		<div class="col-lg-12 col-sm-12 col-xs-12 p-0 ibox-title">
			<div class="col-lg-12 col-sm-12 col-xs-12 m-t-20 m-b-20 profile-page">
				 @include('errors.index') 
				<?php  if(!isset($error)) { ?>
				<form class="form-horizontal" role="form">				
					<div class="form-group m-0 m-b-10 col-lg-12 col-sm-12 col-xs-12 p-0">
						<label class="control-label col-md-2 col-sm-3 col-xs-5 p-t-0" for="email">User Name</label>
						<div class="col-md-10 col-sm-9 col-xs-7 rigprofcnt">
							<span class="m-r-20">:</span>
							<span class="text_gray">{{$user->username}}</span>
						</div>
					</div>
					<div class="form-group m-0 m-b-10 col-lg-12 col-sm-12 col-xs-12 p-0">
						<label class="control-label col-md-2 col-sm-3 col-xs-5 p-t-0" for="pwd">First Name</label>
						<div class="col-md-10 col-sm-9 col-xs-7 rigprofcnt">
							<span class="m-r-20">:</span>
							<span class="text_gray">{{$user->first_name}}</span>
						</div>
					</div>
					<div class="form-group m-0 m-b-10 col-lg-12 col-sm-12 col-xs-12 p-0">
						<label class="control-label col-md-2 col-sm-3 col-xs-5 p-t-0" for="pwd">Last Name</label>
						<div class="col-md-10 col-sm-9 col-xs-7 rigprofcnt">
							<span class="m-r-20">:</span>
							<span class="text_gray">{{$user->last_name}}</span>
						</div>
					</div>
					<div class="form-group m-0 m-b-10 col-lg-12 col-sm-12 col-xs-12 p-0">
						<label class="control-label col-md-2 col-sm-3 col-xs-5 p-t-0" for="pwd">Email</label>
						<div class="col-md-10 col-sm-9 col-xs-7 rigprofcnt">
							<span class="m-r-20">:</span>
							<span class="text_gray">{{$user->email}}</span>
						</div>
					</div>
					<div class="form-group m-0 m-b-10 col-lg-12 col-sm-12 col-xs-12 p-0">
						<label class="control-label col-md-2 col-sm-3 col-xs-5 p-t-0" for="pwd">Telephone</label>
						<div class="col-md-10 col-sm-9 col-xs-7 rigprofcnt">
							<span class="m-r-20">:</span>
							<span class="text_gray">{{$user->telephone}}</span>
						</div>
					</div>
					<div class="form-group m-0 m-b-10 col-lg-12 col-sm-12 col-xs-12 p-0">
						<label class="control-label col-md-2 col-sm-3 col-xs-5 p-t-0" for="pwd">Address</label>
						<div class="col-md-10 col-sm-9 col-xs-7 rigprofcnt">
							<span class="m-r-20">:</span>
							<span class="text_gray">{{$user->address}}</span>
						</div>
					</div>
					<div class="form-group m-0 m-b-10 col-lg-12 col-sm-12 col-xs-12 p-0">
						<label class="control-label col-md-2 col-sm-3 col-xs-5 p-t-0" for="pwd">Profile  Picture</label>
						<div class="col-md-10 col-sm-9 col-xs-7 rigprofcnt">
							<span class="m-r-20">:</span>
							<img src="{{asset('public/profile/').'/'.($user->profile_image ? $user->profile_image : 'noprofile.png')}}" id="profile_image" name="profile_image" width="30" height="30">
						</div>
					</div>
				</form>
				<?php } else { ?>
				<div class="">{{@error}}</div>
				<?php } ?>
			</div>
		</div>	
	</div>
</div>
@endsection
