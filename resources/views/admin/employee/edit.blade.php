@extends('admin.layout.master')

@section('page-title')
Edit Employee
@endsection()

@section('content')

	<!-- Main Content -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>  
    <section class="section">
    	<div class="row">
    		<div class="col-6">
	        	<h5>Edit Employee</h5>
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
	            	<h2>Edit Employee</h2>
		        	<div class="productWrap stockWrap minInput">
						<div class="card-body">							
							<form class="contact-form" method="post" action="{{ route('employees.update', $employee->id) }}">
								@csrf
								<div class="card-body">
									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>First Name</label>
									    		<input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}" required="">
									  		</div>												
										</div>
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Last Name</label>
												<input type="text" name="last_name" value="{{ $employee->last_name }}" class="form-control" required="">
									  		</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Join Date</label>
									    		<input name="join_date" value="{{ $employee->join_date }}" type="text" class="form-control" required="" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
									  		</div>												
										</div>
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Address</label>
									    		<input type="text" name="address" value="{{ $employee->address }}" class="form-control" >
									  		</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Select Designation</label>
						                    	<select class="form-control" name="designation" value="{{ $employee->designation }}" required="">
						                        	<option value="" selected="false" disabled="disabled"></option>
						                        	<option value="Team Leader" {{ $employee->designation == "Team Leader" ? 'selected="selected"' : '' }}>Team Leader</option>
						                        	<option value="Manager" {{ $employee->designation == "Manager" ? 'selected="selected"' : '' }}>Manager</option>
						                        	<option value="Assistant Manager" {{ $employee->designation == "Assistant Manager" ? 'selected="selected"' : '' }}>Assistant Manager</option>
						                        	<option value="Executive" {{ $employee->designation == "Executive" ? 'selected="selected"' : '' }}>Executive</option>
						                        	<option value="Accountant" {{ $employee->designation == "Accountant" ? 'selected="selected"' : '' }}>Accountant</option>
						                        	<option value="Director" {{ $employee->designation == "Director" ? 'selected="selected"' : '' }}>Director</option>
						                        	<option value="Coordinator" {{ $employee->designation == "Coordinator" ? 'selected="selected"' : '' }}>Coordinator</option>
						                        	<option value="Administrator" {{ $employee->designation == "Administrator" ? 'selected="selected"' : '' }}>Administrator</option>
						                        	<option value="Controller" {{ $employee->designation == "Controller" ? 'selected="selected"' : '' }}>Controller</option>
						                        	<option value="Engineer" {{ $employee->designation == "Engineer" ? 'selected="selected"' : '' }}> Engineer </option>
						                        	<option value="Junior Engineer" {{ $employee->designation == "Junior Engineer" ? 'selected="selected"' : '' }}>Junior Engineer</option>
						                        	<option value="Senior Assistant" {{ $employee->designation == "Senior Assistant" ? 'selected="selected"' : '' }}>Senior Assistant</option>
						                        	<option value="Assistant" {{ $employee->designation == "Assistant" ? 'selected="selected"' : '' }}>Assistant</option>
						                        	<option value="Driver" {{ $employee->designation == "Driver" ? 'selected="selected"' : '' }}>Driver</option>
						                        	<option value="Operator" {{ $employee->designation == "Operator" ? 'selected="selected"' : '' }}>Operator</option>
						                        	<option value="Pump Operator" {{ $employee->designation == "Pump Operator" ? 'selected="selected"' : '' }}>Pump Operator</option>
						                        	<option value="Peon" {{ $employee->designation == "Peon" ? 'selected="selected"' : '' }}>Peon</option>
						                        	<option value="Chowkidar" {{ $employee->designation == "Chowkidar" ? 'selected="selected"' : '' }}>Chowkidar</option>
						                        	<option value="Sweeper" {{ $employee->designation == "Sweeper" ? 'selected="selected"' : '' }}>Sweeper</option>
						                        	<option value="Naib Tehsildar" {{ $employee->designation == "Naib Tehsildar" ? 'selected="selected"' : '' }}>Naib Tehsildar</option>
						                    	</select>
									  		</div>												
										</div>
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Account Status</label>
						                    	<select class="form-control" name="timing_status" value="{{ $employee->timing_status }}" required="">
						                        	<option value="" selected="false" disabled="disabled"></option>
						                        	<option value="Full Time Employee" {{ $employee->timing_status == "Full Time Employee" ? 'selected="selected"' : '' }}>Full Time Employee</option>
						                        	<option value="Part Time Employee" {{ $employee->timing_status == "Part Time Employee" ? 'selected="selected"' : '' }}>Part Time Employee</option>
						                    	</select>
									  		</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>CNIC</label>
									    		<input type="text" name="cnic" value="{{ $employee->cnic }}" class="form-control" data-inputmask="'mask': '99999-9999999-9'" name="cnic" required="" >
									  		</div>												
										</div>
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Mobile</label>
									    		<input type="text" name="phone" value="{{ $employee->phone }}" class="form-control" data-inputmask="'mask': '0399-99999999'" required=""  type = "number" maxlength = "12" required="">
									  		</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Email</label>
									    		<input type="text" name="email" value="{{ $employee->email }}" class="form-control">
									  		</div>
										</div>
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Employee Status</label>
						                    	<select class="form-control" name="status" value="{{ $employee->status }}" required="">
						                        	<option value="" selected="false" disabled="disabled"></option>
						                        	<option value="Active" {{ $employee->status == "Active" ? 'selected="selected"' : '' }}>Active</option>
						                        	<option value="De-active" {{ $employee->status == "De-active" ? 'selected="selected"' : '' }}>De-active</option>
						                    	</select>
									  		</div>
										</div>
									</div>

									<div class="row">										
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
									</div>

									<div class="row justify-content-end">										
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="form-group passShow">
									    		<input type="checkbox" onclick="myFunctionPassword()">
									    		<p>Show Password</p>
									  		</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="btnArea mbspr">
										  		<button type="submit" >Save</button>
											</div>
										</div>
										
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<form action="" method="">
												<div class="btnArea2">
											  		<a href="{{ route('employees.index') }}">Cancel</a>
												</div>
											</form>
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
