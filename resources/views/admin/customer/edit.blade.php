@extends('admin.layout.master')

@section('page-title')
Edit Customer
@endsection()

@section('content')

	<!-- Main Content -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <section class="section">
    	<div class="row">
    		<div class="col-6">
	        	<h5>Edit Customer</h5>
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
	            	<h2>Edit Customer</h2>
		        	<div class="productWrap stockWrap minInput">
						<div class="card-body">							
							<form class="contact-form" method="post" action="{{ route('customers.update', $customer->id) }}">
								@csrf
								<div class="card-body">
									<div class="row">
							            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								        	<div class="productWrap stockWrap">												
												<div class="row">
													<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
												  		<div class="input-block">
												    		<label>Date</label>
												    		<input name="date" value="{{ $customer->date }}" type="text" class="form-control" required="" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
												  		</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
														<div class="input-block">
												    		<label>Customer Name</label>
												    		<input type="text" name="name" value="{{ $customer->name }}" class="form-control" required="">
												  		</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
														<div class="input-block">
												    		<label>Mobile</label>
												    		<input type="text" name="phone" value="{{ $customer->phone }}" class="form-control" data-inputmask="'mask': '0399-99999999'" required="" type = "number" maxlength = "12" required="">
												  		</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
														<div class="input-block">
												    		<label>Address</label>
												    		<input type="text" name="address" value="{{ $customer->address }}" class="form-control">
												  		</div>
													</div>
												</div>


												<div class="row">
													<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
														<div class="input-block">
												    		<label>Status</label>
									                    	<select class="form-control" name="status" required="">
									                        	<option value="" selected="false" disabled="disabled" value="{{ $customer->status }}"></option>
									                        	<option value="Active" {{ $customer->status == "Active" ? 'selected="selected"' : '' }}>Active</option>
									                        	<option value="De-active" {{ $customer->status == "De-active" ? 'selected="selected"' : '' }}> De-active</option>
									                    	</select>
												  		</div>
													</div>

													<div class="col-sm-12 col-md-12 col-xl-6 bttQty">
								            			<div class="input-block">
												    		<label>Email</label>
												    		<input type="text" name="email" value="{{ $customer->email }}" class="form-control">
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

												<div class="row justify-content-end" style="margin-bottom: 50px;">
													<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
														<div class="passShow">
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
																<a href="#">Cancel</a>
															</div>
														</form>
													</div>
												</div>

																			
											</div>
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
