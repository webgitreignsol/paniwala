<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>PaniiWala | Dashboard </title>
   	<link rel="stylesheet" href=" {{ asset('public/assets/admin/bundles/pretty-checkbox/pretty-checkbox.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('public/assets/admin/css/app.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('public/assets/admin/css/style.css') }}">

	<link rel="stylesheet" href=" {{ asset('/public/assets/admin/bundles/select2/dist/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/public/assets/admin/bundles/jquery-selectric/selectric.css')}} ">

  	<link rel="stylesheet" href="{{ asset('public/assets/admin/css/components.css') }}">
  	<link rel="stylesheet" href="{{ asset('public/assets/admin/css/custom.css') }}">
  	<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/admin/images/favicon.png') }}">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<link rel="stylesheet" href="{{ asset('public/assets/admin/bundles/datatables/datatables.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('public/assets/admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('public/assets/admin/backend/css/toastr.min.css') }}">

</head>

<body>
	<div class="loader">
		<svg version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" style="display: none;">
			<symbol id="wave">
			    <path d="M420,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C514,6.5,518,4.7,528.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H420z"></path>
			    <path d="M420,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C326,6.5,322,4.7,311.5,2.7C304.3,1.4,293.6-0.1,280,0c0,0,0,0,0,0v20H420z"></path>
			    <path d="M140,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C234,6.5,238,4.7,248.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H140z"></path>
			    <path d="M140,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C46,6.5,42,4.7,31.5,2.7C24.3,1.4,13.6-0.1,0,0c0,0,0,0,0,0l0,20H140z"></path>
		  	</symbol>
		</svg>
		<div class="water-jar">
			<div class="water-filling">
		    	<div class="percentNum" id="count">0</div>
		    	<div class="percentB">%</div>
		  	</div>
		 	<div id="water" class="water">
		    	<svg viewBox="0 0 560 20" class="water_wave water_wave_back">
		    		<use xlink:href="#wave"></use>
		    	</svg>
		   		<svg viewBox="0 0 560 20" class="water_wave water_wave_front">
		     		<use xlink:href="#wave"></use>
		    	</svg>
		  	</div>
		</div>
	</div>

	<div id="app">
    	<div class="main-wrapper main-wrapper-1">
      		<div class="navbar-bg"></div>
		    <nav class="navbar navbar-expand-lg main-navbar sticky">
		        <div class="form-inline mr-auto">
		        	<ul class="navbar-nav mr-3">
		            	<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i data-feather="align-justify"></i></a></li>
		          	</ul>
		        </div>
		        <div class="showPageTitle mr-auto">
		        	<h2>Inventory Software</h2>
		        </div>
		        <ul class="navbar-nav navbar-right">
			        <li class="dropdown">
			        	<a href="javascript:void();" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">Jamil Phullani</a>
						<div class="dropdown-menu dropdown-menu-right pullDown">
		              		<a href="javascript:void();" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile</a>
		              		<a href="javascript:void();" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i> Transaction</a>
		              		<a href="javascript:void();" class="dropdown-item has-icon"> <i class="fas fa-cog"></i> Settings </a>
		              		<div class="dropdown-divider"></div>
		              		<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>Logout</a>
		              		
		              		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                           @csrf
	                        </form>
		              	</div>
		          	</li>
		        </ul>
		    </nav>

		    <!-- Start Sidebar Content -->
		    	@include('admin.layout.sidebar')
		    <!-- End Sidebar Content -->

		    <!-- Main Content -->
		    <div class="main-content">
		    	@yield('content')
       		</div>
       		
	    	<footer class="main-footer">
	        	<div class="footer-left">
	          		&copy; Copyright 2021. <a href="#">Paniwalay</a> All rights reserved. Created by Reignsol.
	        	</div>
	      	</footer>
		</div>
	</div>

	<!-- Start loader script -->
	<script>
		var cnt=document.getElementById("count"); 
		var water=document.getElementById("water");
		var percent=cnt.innerText;
		var interval;
			interval=setInterval(function(){ 
			percent++; 
			cnt.innerHTML = percent; 
			water.style.transform='translate(0'+','+(100-percent)+'%)';
			if(percent==100){
				clearInterval(interval);
			}
		},60);
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWXcC4fpvDCMaOuffxDDJPPBTDSngHMAc&libraries=places"></script>

	<script src="{{ asset('public/assets/admin/bundles/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('public/assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('public/assets/admin/js/page/datatables.js') }}"></script>
	{!! Toastr::message() !!}
	<script>
         @if($errors->any())
         @foreach($errors->all() as $error)
         toastr.error('{{ $error }}', 'Error!!', {
           closeButton:true,
           progressBar:true,
         });
         @endforeach
         @endif
    </script>
	<script src="{{ asset('public/assets/admin/backend/js/toastr.min.js') }}"></script>

	<!--End loader script -->
	<script src="{{ asset('public/assets/admin/js/charts/core.js') }}"></script>
	<script src="{{ asset('public/assets/admin/js/axios.min.js') }}"></script>
	<script src="{{ asset('public/assets/admin/js/charts/charts.js') }}"></script>
	<script src="{{ asset('public/assets/admin/js/charts/animated.js') }}"></script>
	<script src="{{ asset('public/assets/admin/js/app.min.js') }}"></script>
	<script src="{{ asset('public/assets/admin/bundles/apexcharts/apexcharts.min.js') }}"></script>
	<script src="{{ asset('public/assets/admin/js/page/index.js') }}"></script>

	<script src=" {{asset('/public/assets/admin/bundles/select2/dist/js/select2.full.min.js')}} "></script>
	<script src="{{ asset('/public/assets/admin/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
	<script src=" {{ asset('/public/assets/admin/js/page/forms-advanced-forms.js')}} "></script>


	<script src="{{ asset('public/assets/admin/js/scripts.js') }}"></script>
	<script src="{{ asset('public/assets/admin/js/custom.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</body>
</html>