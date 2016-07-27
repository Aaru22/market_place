{{--*/ $image = 'noprofile.png' /*--}}
@if(Auth::check())
	@if(Auth::user()->profile_image)
   		{{--*/ $image = Auth::user()->profile_image /*--}}
	@else
   		{{--*/ $image = 'noprofile.png' /*--}}
   	@endif	
@endif
<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links pull-right">
			<li class="m-0">
				<span class="pull-left m-r-10">
					<img src="{{asset('public/profile/').'/'.$image}}" alt="image" class="img-circle"  width="50" height="50">						
				</span>
				<a data-toggle="dropdown" class="dropdown-toggle pull-left p-0" href="#">
					<span class="clear"> 						
						<span class="text-muted text-xs block">
							@if(Auth::check())
								{{ Auth::user()->username }}
							@endif
							<b class="fa fa-chevron-down "></b>
						</span> 
					</span> 
				</a>
				<ul class="dropdown-menu animated fadeInRight m-t-xs">
					<li><a href="{{ URL::route('viewprofile') }}"><i class="fa fa-user"></i>&nbsp;&nbsp;Profile</a></li>
					<li><a href="{{ URL::route('changepassword') }}"><i class="fa fa-key"></i>&nbsp;&nbsp;Change Password</a></li>
					<li><a href="{{ URL::route('logout') }}"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Logout</a></li>
				</ul>
			</li>
        </ul>

    </nav>
</div>