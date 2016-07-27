@if(Auth::check())
   {{--*/ $image = Auth::user()->profile_image /*--}}
@else
   {{--*/ $image = 'noprofile.png' /*--}}
@endif
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element text-center">
					<span>
						 <img src="{{ asset('public/img/Logo.png')}}" alt="" class="profile-img-card" />			
					</span>								
                </div>               
            </li>
            <li id="menu_1">
                <a href="{{ URL::route('dashboard') }}"><i class="dashboardicon"></i><span class="nav-label">Dashboard</span></a>
            </li>
            <li id="menu_2">
				<a href="{{ URL::route('dashboard') }}"><i class="examicon"></i> <span class="nav-label">Exams</span> <span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="{{ URL::route('dashboard') }}">ECG / EKG </a></li>
					<li><a href="{{ URL::route('dashboard') }}">Spirometry</a></li>
					<li><a href="{{ URL::route('dashboard') }}">Vital Signs</a></li>
					<li><a href="{{ URL::route('dashboard') }}">Blood Test</a></li>
					<li><a href="{{ URL::route('dashboard') }}">ABAP/(MAPA)</a></li>
					<li><a href="{{ URL::route('dashboard') }}">Holter</a></li>
					<li><a href="{{ URL::route('dashboard') }}">Electroencephalogram</a></li>
				</ul>
            </li>
            <li id="menu_3">
				<a href="{{ URL::route('dashboard') }}"><i class="telecons"></i> <span class="nav-label">Teleconsultation</span> <span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="{{ URL::route('dashboard') }}">Message </a></li>
					<li><a href="{{ URL::route('dashboard') }}">Chat</a></li>
				</ul>
            </li>
            
            </li>
            <!-- <li id="menu_6">
                <a href="{{ URL::route('dashboard') }}"><i class="reporst_icon"></i> <span class="nav-label">Reports</span></a>
            </li> -->
        </ul>
    </div>
</nav>

