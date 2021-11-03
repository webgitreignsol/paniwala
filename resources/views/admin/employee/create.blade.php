@extends('admin.layout.master')

@section('page-title')
Add Employee
@endsection()

@section('content')

	<!-- Main Content -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>  
    <section class="section">
    	<div class="row">
    		<div class="col-6">
	        	<h5>Add Employee</h5>
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
	            	<h2>Create Employee</h2>
		        	<div class="productWrap stockWrap minInput">
						<div class="card-body">							
							<form class="contact-form" method="post" action="{{ route('employees.store') }}">
								@csrf
								<div class="card-body">
									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>First Name</label>
									    		<input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required="">
									  		</div>												
										</div>
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Last Name</label>
												<input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" required="">
									  		</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Join Date</label>
									    		<input name="join_date" value="{{ old('join_date') }}" type="text" class="form-control" required="" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
									  		</div>												
										</div>
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Address</label>
									    		<input type="text" name="address" value="{{ old('address') }}" class="form-control" >
									  		</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Select Designation</label>
						                    	<select class="form-control" name="designation" value="{{ old('designation') }}" required="">
						                        	<option value="" selected="false" disabled="disabled"></option>
						                        	<option value="Team Leader" {{ old("designation") == "Team Leader" ? 'selected="selected"' : '' }}>Team Leader</option>
						                        	<option value="Manager" {{ old("designation") == "Manager" ? 'selected="selected"' : '' }}>Manager</option>


						                        	<option value="Assistant Manager" {{ old("designation") == "Assistant Manager" ? 'selected="selected"' : '' }}>Assistant Manager</option>
						                        	<option value="Executive" {{ old("designation") == "Executive" ? 'selected="selected"' : '' }}>Executive</option>
						                        	<option value="Accountant" {{ old("designation") == "Accountant" ? 'selected="selected"' : '' }}>Accountant</option>
						                        	<option value="Director" {{ old("designation") == "Director" ? 'selected="selected"' : '' }}>Director</option>
						                        	<option value="Coordinator" {{ old("designation") == "Coordinator" ? 'selected="selected"' : '' }}>Coordinator</option>
						                        	<option value="Administrator" {{ old("designation") == "Administrator" ? 'selected="selected"' : '' }}>Administrator</option>
						                        	<option value="Controller" {{ old("designation") == "Controller" ? 'selected="selected"' : '' }}>Controller</option>
						                        	<option value="Engineer" {{ old("designation") == "Engineer" ? 'selected="selected"' : '' }}>Engineer</option>
						                        	<option value="Junior Engineer" {{ old("designation") == "Junior Engineer" ? 'selected="selected"' : '' }}>Junior Engineer</option>
						                        	<option value="Senior Assistant" {{ old("designation") == "Senior Assistant" ? 'selected="selected"' : '' }}>Senior Assistant</option>
						                        	<option value="Assistant" {{ old("designation") == "Assistant" ? 'selected="selected"' : '' }}>Assistant</option>
						                        	<option value="Driver" {{ old("designation") == "Driver" ? 'selected="selected"' : '' }}>Driver</option>
						                        	<option value="Operator" {{ old("designation") == "Operator" ? 'selected="selected"' : '' }}>Operator</option>
						                        	<option value="Pump Operator" {{ old("designation") == "Pump Operator" ? 'selected="selected"' : '' }}>Pump Operator</option>
						                        	<option value="Peon" {{ old("designation") == "Peon" ? 'selected="selected"' : '' }}>Peon</option>
						                        	<option value="Chowkidar" {{ old("designation") == "Chowkidar" ? 'selected="selected"' : '' }}>Chowkidar</option>
						                        	<option value="Sweeper" {{ old("designation") == "Sweeper" ? 'selected="selected"' : '' }}>Sweeper</option>
						                        	<option value="Naib Tehsildar" {{ old("designation") == "Naib Tehsildar" ? 'selected="selected"' : '' }}>Naib Tehsildar</option>
						                    	</select>
									  		</div>												
										</div>
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Account Status</label>
						                    	<select class="form-control" name="timing_status" value="{{ old('timing_status') }}" required="">
						                        	<option value="" selected="false" disabled="disabled"></option>
						                        	<option value="Full Time Employee"{{ old("timing_status") == "Full Time Employee" ? 'selected="selected"' : '' }}>Full Time Employee</option>
						                        	<option value="Part Time Employee"{{ old("timing_status") == "Part Time Employee" ? 'selected="selected"' : '' }}>Part Time Employee</option>
						                    	</select>
									  		</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>CNIC</label>
									    		<input type="text" name="cnic" value="{{ old('cnic') }}" class="form-control" data-inputmask="'mask': '99999-9999999-9'" name="cnic" required="" >
									  		</div>												
										</div>
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Mobile</label>
									    		<input type="text" name="phone" value="{{ old('phone') }}" class="form-control" data-inputmask="'mask': '0399-99999999'" required=""  type = "number" maxlength = "12" required="">
									  		</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Email</label>
									    		<input type="text" name="email" value="{{ old('email') }}" class="form-control">
									  		</div>
										</div>
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Employee Status</label>
						                    	<select class="form-control" name="status" value="{{ old('status') }}" required="">
						                        	<option value="" selected="false" disabled="disabled"></option>
						                        	<option value="Active" {{ old("status") == "Active" ? 'selected="selected"' : '' }}>Active</option>
						                        	<option value="De-active" {{ old("status") == "De-active" ? 'selected="selected"' : '' }}>De-active</option>
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
