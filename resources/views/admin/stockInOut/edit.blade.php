@extends('admin.layout.master')

@section('page-title')
Edit Stock
@endsection()

@section('content')

	<!-- Main Content -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>  
    <section class="section">
    	<div class="row">
    		<div class="col-6">
	        	<h5>Edit Stock</h5>
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
	            	<h2>Edit Stock</h2>
		        	<div class="productWrap stockWrap minInput">
						<div class="card-body">							
							<form class="contact-form" method="post" action="{{ route('stockInOuts.update', $stockInOut->id) }}">
								@csrf
								<div class="card-body">

									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
									  		<div class="input-block">
									    		<label>Date</label>
									    		<input name="date" value="{{ $stockInOut->date }}" type="text" class="form-control" required="" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
									  		</div>
										</div>

										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
									  		<div class="input-block">
									    		<label>Select Salesman</label>
						                    	<select class="form-control" name="employee_id" value="{{ $stockInOut->employee_id }}" required="">
						                        	<option value="" selected="false" disabled="disabled"></option>
						                        	@foreach($employees as $employee)
						                        	<option value="{{ $employee->id }}"  {{ $stockInOut->employee_id == $employee->id ? 'selected="selected"' : '' }} >{{ $employee->first_name }} {{ $employee->last_name }}</option>
						                        	@endforeach
						                    	</select>
									  		</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Select Product</label>
									    		<select class="form-control" name="product_id" value="{{ $stockInOut->product_id }}" required="">
									    			<option value="" selected="false" disabled="disabled"></option>
									    			@foreach($products as $product)
									    			<option value="{{ $product->id }}" {{ $stockInOut->product_id == $product->id ? 'selected="selected"' : '' }} >{{ $product->product_name }}</option>
									    			@endforeach
									    		</select>
									  		</div>
										</div>
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Qty</label>
												<input type="number" name="qty" value="{{ $stockInOut->qty }}" class="form-control" required="">
									  		</div>
										</div>
									</div>

									
									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Stock Status</label>
						                    	<select class="form-control" name="stock_status" value="{{ $stockInOut->stock_status }}" required="">
						                        	<option value="" selected="false" disabled="disabled"></option>
						                        	<option value="Stock In (Fill)" {{ $stockInOut->stock_status == "Stock In (Fill)" ? 'selected="selected"' : '' }}>Stock In (Fill)</option>
						                        	<option value="Stock Out (Fill)" {{ $stockInOut->stock_status == "Stock Out (Fill)" ? 'selected="selected"' : '' }}>Stock Out (Fill)</option>
						                        	<option value="Stock In (Empty)" {{ $stockInOut->stock_status == "Stock In (Empty)" ? 'selected="selected"' : '' }}>Stock In (Empty)</option>
						                        	<option value="Stock Out (Empty)" {{ $stockInOut->stock_status == "Stock Out (Empty)" ? 'selected="selected"' : '' }}>Stock Out (Empty)</option>
						                        	<option value="Damage" {{ $stockInOut->stock_status == "Damage" ? 'selected="selected"' : '' }}>Damage</option>
						                    	</select>
									  		</div>												
										</div>

										<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
											<div class="input-block">
									    		<label>Remarks</label>
												<input type="text" name="remarks" value="{{ $stockInOut->remarks }}" class="form-control">
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
											  		<a href="{{ route('products.index') }}">Cancel</a>
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
