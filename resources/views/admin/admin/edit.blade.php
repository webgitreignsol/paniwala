@extends('admin.layout.master')

@section('page-title')
Edit Admin
@endsection()

@section('content')

	<!-- Main Content -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>  
    <section class="section">
    	<div class="row">
    		<div class="col-6">
	        	<h5>Edit Admin</h5>
    		</div>
    		<div class="col-6">
    			<div class="headingArea">
		        	<img src="{{ asset('public/assets/admin/img/wall-6.webp') }}">
		        </div>
    		</div>
    	</div>

    	<div class="container">
    	   	<div class="row">
	            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
	            	<h2>Create Admin</h2>
		        	<div class="productWrap stockWrap minInput">
						<div class="card-body">
							<form class="contact-form" method="post" action="{{ route('admins.update', $admin->id) }}" novalidate="">
								@csrf
								<div class="row">
									<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
										<div class="input-block">
								    		<label>Admin Name</label>
								    		<input type="text" name="name" id="admin-name" value="{{ $admin->name }}" class="form-control">
								  		</div>
									</div>

									<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
										<div class="input-block">
								    		<label>Email</label>
								    		<input name="email" type="email" class="form-control" value="{{ $admin->email }}" required="">
								  		</div>
									</div>

									<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
										<div class="input-block">
								    		<label>Mobile</label>
								    		<input type="text" name="phone" class="form-control" value="{{ $admin->phone }}" data-inputmask="'mask': '0399-99999999'" required=""  type = "number" maxlength = "12" required="">
								  		</div>
									</div>

									<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
										<div class="input-block">
								    		<label>Address</label>
								    		<input type="text" name="address" value="{{ $admin->address }}" class="form-control">
								  		</div>
									</div>

									<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
										<div class="input-block">
								    		<label>Password</label>
								    		<input type="password" name="password" id="passwordInputShow" class="form-control" >
								  		</div>
									</div>

									<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
										<div class="input-block">
								    		<label>Confirm Password</label>
								    		<input type="password" name="confirm-password" id="passwordInputShow2" class="form-control" >
								  		</div>
									</div>

									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<div class="form-group passShow">
								    		<input type="checkbox" onclick="myFunctionPassword()">
								    		<p>Show Password</p>
								  		</div>
									</div>
									
									<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
										<div class="btnPrit">
									  		<button type="submit">Save</button>
										</div>
									</div>

									<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
										<div class="cleItm">
									  		<a href="{{ route('admins.index') }}">Cancel</a>
										</div>
									</div>										
								</div>
							</form>								
						</div>
					</div>
	            </div>
	        </div>
	    </div>
    </section>

	<!-- Start show password script -->
	<script>
		function myFunctionPassword() {
		  var x = document.getElementById("passwordInputShow");
		  if (x.type === "password") {
		    x.type = "text";
		  } else {
		    x.type = "password";
		  }
		
		  var x = document.getElementById("passwordInputShow2");
		  if (x.type === "password") {
		    x.type = "text";
		  } else {
		    x.type = "password";
		  }
		}

	</script>
	<!-- End show password script -->

    <!-- Start mobile number and CNIC input format Script -->
	<script>
		$(":input").inputmask();
	</script>
	<!-- End mobile number and CNIC input format Script -->

	<!-- Start lable active deactive in input script -->
	<script>
		//material contact form animation
		$(".contact-form")
		    .find(".form-control")
		    .each(function () {
		        var targetItem = $(this).parent();
		        if ($(this).val()) {
		            $(targetItem)
		                .find("label")
		                .css({
		                    top: "-6px"
		                    , fontSize: "12px"
		                    , color: "#333"
		                });
		        }
		    });
		$(".contact-form")
		    .find(".form-control")
		    .focus(function () {
		        $(this)
		            .parent(".input-block")
		            .addClass("focus");
		        $(this)
		            .parent()
		            .find("label")
		            .animate({
		                    top: "-6px"
		                    , fontSize: "12px"
		                    , color: "#333"
		                }
		                , 300
		            );
		    });
		$(".contact-form")
		    .find(".form-control")
		    .blur(function () {
		        if ($(this).val().length == 0) {
		            $(this)
		                .parent(".input-block")
		                .removeClass("focus");
		            $(this)
		                .parent()
		                .find("label")
		                .animate({
		                        top: "20px"
		                        , fontSize: "16px"
		                    }
		                    , 300
		                );
		        }
		    });
	</script>
	<!-- End lable active deactive in input script -->

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
	<!--End loader script -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

@endsection()
