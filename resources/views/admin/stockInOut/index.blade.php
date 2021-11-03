@extends('admin.layout.master')

@section('page-title')
Stock In / Out
@endsection()

@section('content')

	<!-- Main Content -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <section class="section">
    	<div class="row">
    		<div class="col-6">
	        	<h5>Stock In / Out Details</h5>
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
        			<div class="addedButtn">
    					<a href="{{ route('stockInOuts.create') }}">Add Stock</a>
    				</div>


    				<form class="contact-form" id="dateSearch" method="post" action="{{ route('stockSearch') }}">
					@csrf
	    				<div class="row justify-content-end">
	    					<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
			            		<div class="input-block">
								    <label>From Date</label>
								    <input name="from_date" type="text" class="form-control" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
								</div>
	            			</div>
	            			<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
	            				<div class="input-block">
								    <label>To Date</label>
								    <input name="to_date" type="text" class="form-control" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
								</div>
	        				</div>
	            			<div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
								<div class="cleItm" >
	            					<button type="submit">Search</button>
	            				</div>
	            			</div>
	    				</div>
	    			</form>


            		<div class="table-responsive tableContain">
						<table id="table-1" class="table table-bordered table-hover advanced-web-table" style="width: 100%; table-layout: fixed;">
					  		<thead class="thead-dark">
							    <tr>
								    <th scope="col" style="width: 40px">S.No</th>
								    <th scope="col" style="width: 120px">Date</th>
								    <th scope="col">Product Name</th>
								    <th scope="col" style="width: 150px">Qty</th>
								    <th scope="col" style="width: 150px">Stock Status</th>
								    <th scope="col" style="width: 150px">Salesman</th>
								    <th scope="col" style="width: 150px">Remarks</th>
								    <th scope="col" style="width: 150px">Action</th>
							    </tr>
							</thead>
					  		<tbody>
					  			@foreach($stockInOuts as $key => $stockInOut)
							    <tr>
									<th>{{ $key+1 }}</th>
									<td>{{ $stockInOut->date }}</td>
									<td>{{ $stockInOut->product->product_name }}</td>
									<td>{{ $stockInOut->qty }}</td>
									<td>{{ $stockInOut->stock_status }}</td>
									<td>{{ $stockInOut->employee->first_name }} {{ $stockInOut->employee->last_name }}</td>
									<td>{{ $stockInOut->remarks }}</td>
									<td>
										<a href="{{ route('stockInOuts.edit', $stockInOut->id) }}" style="color: green"><i class="far fa-edit"></i></a>
										&nbsp;
										<a href="{{ route('stockInOuts.destroy', $stockInOut->id) }}" onclick="return confirm('Are You Sure You Want to Delete this Stock!'); " style="color: red"><i class="far fa-trash-alt"></i></a>
									</td>
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
