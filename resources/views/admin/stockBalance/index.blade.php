@extends('admin.layout.master')

@section('page-title')
Check Stock Balance
@endsection()

@section('content')

	<!-- Main Content -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <section class="section">
    	<div class="row">
    		<div class="col-6">
	        	<h5>Check Stock Balance</h5>
    		</div>
    		<div class="col-6">
    			<div class="headingArea">
		        	<img src="{{ asset('public/assets/admin/img/wall-6.webp') }}">
		        </div>
    		</div>
        </div>

    	<div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            	<div class="stockWrapCont">			            		
        			<div class="table-responsive tableContain">
						<table id="table-1" class="table table-bordered table-hover advanced-web-table" style="width: 100%; table-layout: fixed;">
					  		<thead class="thead-dark">
							    <tr>
								    <th scope="col" style="width: 40px">S.No</th>
								    <th scope="col">Product Name</th>
								    <th scope="col" style="width: 150px">Price</th>
								    <th scope="col" style="width: 150px">Bottle Type</th>
								    <th scope="col" style="width: 150px">Filling Stock in Warehouse</th>
								    <th scope="col" style="width: 150px">Empty Stock in Warehouse</th>
								    <th scope="col" style="width: 150px">Total Stock in Warehouse</th>
								    <th scope="col" style="width: 150px">Total Damage Stock</th>
								    <th scope="col" style="width: 150px">Total Stock In Market</th>
							    </tr>
							</thead>
					  		<tbody>
					  			@foreach($fillingStocks as $key => $fillingStock)
							    <tr>
									<th>{{ $key+1 }}</th>
									<td>{{ $fillingStock->product->product_name }}</td>
									<td>{{ $fillingStock->product->price }}</td>
									<td>{{ $fillingStock->product->type }}</td>
									<td>{{ $fillingStock->filling_stock }}</td>
									<td>{{ $fillingStock->empty_stock }}</td>
									<td>{{ $fillingStock->filling_stock + $fillingStock->empty_stock }}</td>
									<td>0</td>
									<td>0</td>
							    </tr>
							    @endforeach
					  		</tbody>
						</table>
					</div>
            	</div>	
            </div>
        </div>

    </section>

    <script>
		$(":input").inputmask();
	</script>

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
