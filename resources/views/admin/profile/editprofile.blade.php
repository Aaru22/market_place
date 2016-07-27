@extends('layout.admin_default')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading p-b-15">
	<div class="pull-left p-20 p-b-0">{!! Breadcrumbs::render('editprofile') !!}</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<h3 class="profile_heading m-b-10 m-0 col-lg-12 col-sm-12 col-xs-12 p-0">Edit Profile</h3>
        <form class="form-horizontal" role="form" method="POST" id="form_editadminprofile" data-parsley-validate="" action="{{ URL::route('updateprofile') }}">
			<div class="col-lg-12 col-sm-12 col-xs-12 p-20 ibox-title">
				@include('errors.index')                 
					{{csrf_field()}}
					<div class="col-lg-6 col-sm-12 col-xs-12 m-b-10 editprofsec">
						<div class="col-lg-12 col-sm-12 col-xs-12 p-0 changepasswordform">
							<div class="form-group">
								<label class="control-label col-sm-4" for="first_name">{{ @trans('locale.firstname')}}</label>
								<div class="col-sm-8">
									<input  type="text" 
											name="first_name" 
											id="first_name" 
											class="form-control" 
											tabindex="1"
											data-parsley-required-message="First Name is required"
											data-parsley-pattern="^[a-zA-Z\s]+$"
											data-parsley-pattern-message="First Name must be alphabetic and space only"
											data-parsley-maxlength="20"
											data-parsley-maxlength-message="First Name must be 20 characters only"
											value="{{$user->first_name}}" 
											required/>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="last_name">{{ @trans('locale.lastname')}}</label>
								<div class="col-sm-8">
									<input  type="text" 
											name="last_name" 
											id="last_name" 
											class="form-control" 
											tabindex="2"
											data-parsley-required-message="Last Name is required"
											data-parsley-pattern="^[a-zA-Z\s]+$"
											data-parsley-pattern-message="Last Name must be alphabetic and space only"
											data-parsley-maxlength="20"
											data-parsley-maxlength-message="Last Name must be 20 characters only"
											value="{{$user->last_name}}" 
											required/>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="user_name">{{ @trans('locale.username')}}</label>
								<div class="col-sm-8">
									<input  type="text" 
											class="form-control default-cursor" 
											id="username"  
											name="username" 
											readonly 
											value="{{ $user->username}}">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="email">{{ @trans('locale.email')}}</label>
									<div class="col-sm-8">
										<input  type="email" 
												name="email" 
												id="email" 
												class="form-control" 
												tabindex="3"
												data-parsley-required-message="Email is required"
												data-parsley-type="email"
												data-parsley-type-message="Email ID must be valid"
												data-parsley-email
												data-parsley-trigger="change"
												value="{{$user->email}}" 
												autocomplete="off"
												required/>
									</div>
							</div>  
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-xs-12 m-b-10 editprofsec">
						<div class="col-lg-12 col-sm-12 col-xs-12 p-0 changepasswordform">
							<div class="form-group">
								<label class="control-label col-sm-4" for="phone">{{ @trans('locale.phone')}}</label>
								<div class="col-sm-8">
								   <input   type="text" 
											name="telephone" 
											id="telephone" 
											class="form-control" 
											tabindex="4"
											data-parsley-required-message="Telephone number required"
											data-parsley-pattern="[0-9+]+"
											data-parsley-maxlength="12"
											data-parsley-pattern-message="Telephone should contain numbers and plus only."
											data-parsley-maxlength-message="Telephone should not exceed 12 characters."
											value="{{$user->telephone}}" 
											required/>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="pwd">{{ @trans('locale.status')}}</label>
								<div class="col-sm-8">
									<select name="is_active" 
											id="is_active" 
											class="form-control" disabled="" 
											data-parsley-trigger = "change" 
											data-parsley-required-message="Status is required" 
											required>
										<option value="1" {{ $user->is_active ? 'selected' : '' }}>Active</option>
										<option value="0" {{ ($user->is_active == 0) ? '' : 'selected' }}>Deactive</option>
									</select>
									<input type="hidden" name="is_active" value="1">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="pwd">{{ @trans('locale.address')}}</label>
								<div class="col-sm-8">
									<input  type="text" 
											name="address" 
											id="address" 
											class="form-control" 
											tabindex="5"
											data-parsley-required-message="Address is required"
											data-parsley-maxlength="80"
											data-parsley-required-message="Address should not exceed 80 characters"
											data-parsley-maxlength-message="Address should not exceed 80 characters"
											value="{{$user->address}}" 
											required/>
								</div>
							</div>                            
							<div class="form-group filuploadersec">
								<label class="control-label col-sm-4" for="pwd">{{ @trans('locale.profile_image')}}</label>
								<div class="col-sm-8">  
									<div class="form-group filuploadersec m-0">
										<input id="uploadFile" placeholder="No file choosen" style="max-width: 70%;" class="form-control m-b-10" disabled="disabled" />
										<div class="fileUpload btn btn-blue m-0 m-l-10">
											<span>Browse</span>     
												<input  type="file" 
														class="upload" 
														id="fileToUpload" 
														tabindex="6"
														name="fileToUpload" 
														onchange="app.profile.uploadimage(this.value)"  
														accept="image/jpg,image/png,image/jpeg" />
										</div>    
										<input type="hidden" name="image" id="image"/>
										<input type="hidden" name="id" id="id" value="{{$user->id}}"/>
										<span id="file_error" style="color:#ED7476"></span>
										<div class="upload-img-preview">
											<img src="{{asset('public/profile/').'/'.($user->profile_image ? $user->profile_image : 'noprofile.png')}}" id="profileimage" width="50" height="50">
										</div>
									</div>                               
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-sm-12 col-xs-12 p-0 m-t-20 m-b-30">
				<div class="pull-right">
					<a href="{{URL::route('viewprofile')}}" tabindex="7" class="btn btn-gray m-r-10">{{ @trans('locale.cancel')}}</a>
					<button type="submit" class="btn btn-blue" tabindex="8" onclick="javascript:$('#form_editadminprofile').parsley('validate');">Save</button>            
				</div>
			</div>
        </form> 
    </div>
</div>
@endsection
@section('customscript')
<script src="{{ asset('public/js/validator.js')}}"></script>
@endsection
