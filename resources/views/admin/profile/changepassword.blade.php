@extends('layout.admin_default')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading p-b-15">
	 <div class="pull-left p-20 p-b-0">{!! Breadcrumbs::render('changepassword') !!}</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<h3 class="profile_heading m-b-10 m-0">Change password</h3>
		@include('errors.index')
		<form class="form-horizontal" method="POST" role="form" id="form_changePassword" data-parsley-validate="" action="{{ URL::route('postchangepassword') }}" >
			<div class="col-lg-12 col-sm-12 col-xs-12 p-0 ibox-title">
				<div class="col-lg-12 col-sm-12 col-xs-12 p-20 row">
					<div class="col-lg-6 col-sm-12 col-xs-12 m-b-10 editprofsec">
						<div class="col-lg-12 col-sm-12 col-xs-12 p-0 changepasswordform">						
							{{ csrf_field() }}
						  	<div class="form-group">
						    	<label class="control-label col-sm-4" for="old_password"  >Current Password:</label>
							    <div class="col-sm-8">
							       <input   type="password" 
				                            placeholder="Current Password" 
				                            name="old_password" 
				                            id="old_password" 
				                            class="form-control" 
				                            tabindex="1"
				                            data-parsley-required-message="Current Password is required"
				                            data-parsley-type="alphanum"
				                            data-parsley-type-message="Current Password should be alphanumeric and greater than 6 characters."
				                            data-parsley-minlength="6"
				                            data-parsley-minlength-message="Current Password should be alphanumeric and greater than 6 characters. "
				                            autocomplete="off"
				                            required/>
							    </div>
						  	</div>
							<div class="form-group">
						    	<label class="control-label col-sm-4" for="old_password"  >Password:</label>
							    <div class="col-sm-8">
							      	<input  type="password" 
				                            placeholder="Password" 
				                            name="password" 
				                            id="password" 
				                            class="form-control" 
				                            tabindex="2"
				                            data-parsley-required-message="Password is required"
				                            data-parsley-type="alphanum"
				                            data-parsley-type-message="Password should be alphanumeric and greater than 6 characters."
				                            data-parsley-minlength="6"
				                            data-parsley-minlength-message="Password should be alphanumeric and greater than 6 characters. "
				                            autocomplete="off"
				                            required/>
							    </div>
						  	</div>
						  	<div class="form-group">
						    	<label class="control-label col-sm-4" for="old_password"  >Confirm Password:</label>
							    <div class="col-sm-8">
							      	<input  type="password" 
				                            placeholder="Confirm Password" 
				                            name="conf_password" 
				                            id="conf_password" 
				                            class="form-control"
				                            tabindex="3"
				                            data-parsley-required-message="Confirm Password is required."
				                            data-parsley-type="alphanum"
				                            data-parsley-type-message="Confirm Password should Password should be alphanumeric and greater than 6 characters."
				                            data-parsley-minlength="6"
				                            data-parsley-minlength-message="Confirm Password should be alphanumeric and greater than 6 characters."
				                            data-parsley-equalto="#password"
				                            data-parsley-equalto-message="Confirm password doesn't match password."
				                            autocomplete="off"
				                            required/>
							    </div>
						  	</div> 			
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-sm-12 col-xs-12 p-0 m-t-20 m-b-30">
				<div class="pull-right">
					<a href="{{URL::route('viewprofile')}}" tabindex="4"  class="btn btn-gray m-r-10">{{ @trans('locale.cancel')}}</a>   		
					<button type="submit" class="btn btn-blue" tabindex="5" onclick="javascript:$('#form_changePassword').parsley('validate');">Save</button>
				</div>
			</div>
		</form>		
	</div>
</div>
@endsection
