@extends('admin.layout.master')

@section('page-title')
Order Details
@endsection()

@section('content')
	<style>
		.head-sec-1 p, .head-sec-2 p, .head-sec-3 p{margin-bottom: 0;}
		.head-sec-1 p span, .head-sec-2 p span, .head-sec-3 p span{font-weight: 700; margin-right: 10px;}

		.invoice-detail-n, .invoice-detail-value{display: inline-block;}
		.invoice-detail-n{font-size: 18px; font-weight: 700; color: #333;}
		.invoice-detail-v{float: right; font-size: 18px; font-weight: 500;}
		.invoice-detail-v-lg{font-weight: 700!important;}
		.ccdds{border:1px solid;}
		.vtdTtl{border-top:1px solid; border-bottom-style: double;}
	</style>
	<!-- Main Content -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<section class="section">
		<div class="section-body">
			<div class="invoice">
				<div class="invoice-print">
					<div class="row">
						<div class="col-lg-12">
							<div class="invoice-title">
								<h2>Invoice</h2>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
									<div class="head-sec-1">
										<p><span>Order ID:</span> # {{ $order->id }}</p>
										<p><span>Order Status:</span> {{ $order->status }}</p>
										<p><span>Payment Method:</span> COD</p>
										<p><span>Order Date:</span> {{ $order->order_date }}</p>
										<p><span>Order Type:</span> {{ $order->order_type }}</p>
									</div>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
									<div class="head-sec-2">
										<p><span>User Info:</span> </p>
										<p><span>Name:</span> {{ $order->customer->name }}</p>
										<p><span>Email:</span> {{ $order->customer->email }}</p>
										<p><span>Phone:</span> {{ $order->customer->phone }}</p>
									</div>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
									<div class="head-sec-3">
										<p><span>Employee Info:</span> </p>
										<p><span>Name:</span> {{ isset($order->employee->first_name)  ? $order->employee->first_name : 'None' }}</p>
										<p><span>Email:</span> {{ isset($order->employee->email)  ? $order->employee->email : 'None' }}</p>
										<p><span>Phone:</span> {{ isset($order->employee->phone)  ? $order->employee->phone : 'None' }}</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="productWrap">
						<form class="contact-form" name="" action="" method="post">
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
									<div class="input-block">
										<label>Order Status</label>
										<select class="form-control" onchange="uppdate(this,{{$order->id}});" name="status" required="">
											<option value="0" selected="false" disabled="disabled"></option>
											<option value="Order in Process" {{ isset($order->status) ? (($order->status == 'Order in Process') ? 'selected' : null) : null }}>Order in Process</option>
											<option value="Ready for pickup" {{ isset($order->status) ? (($order->status == 'Ready for pickup') ? 'selected' : null) : null }}>Ready for pickup</option>
											<option value="Order Picked" {{ isset($order->status) ? (($order->status == 'Order Picked') ? 'selected' : null) : null }}>Order Picked</option>
											<option value="Order Delivered" {{ isset($order->status) ? (($order->status == 'Order Delivered') ? 'selected' : null) : null }}>Order Delivered</option>
											<option value="Pending" {{ isset($order->status) ? (($order->status == 'Pending') ? 'selected' : null) : null }}>Pending</option>
										</select>
									</div>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
									<div class="input-block">
										<label>Change Employee</label>
										<select class="form-control" onchange="uppdate(this,{{$order->id}});" name="employee_id" required="">
											<option value="" selected="false" disabled="disabled"></option>
											@foreach($employees as $employee)
												<option value="{{ $employee->id }}" {{ $order->employee_id == $employee->id ? 'selected="selected"' : '' }} >{{ $employee->first_name }} {{ $employee->last_name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</form>
					</div>

					<div class="row mt-4">
						<div class="col-md-12">
							<div class="table-responsive">
								@if($order != null)
								<table class="table table-striped table-hover table-md">
									<tr>
										<th data-width="40">#</th>
										<th>Product</th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-right">Totals</th>
									</tr>
									@foreach($order->items as $key => $orderitem)
									<tr>
										<td>1</td>
										<td>{{ $orderitem->product->product_name }}</td>
										<td class="text-center">{{ $orderitem->price }}</td>
										<td class="text-center">{{ $orderitem->qty }}</td>
										<td class="text-right">{{ $orderitem->total }}</td>
									</tr>
									@endforeach
								</table>
								@endif
							</div>
							<hr class="ccdds">
							<div class="row mt-4 justify-content-between">
								<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
									<div class="section-title">Payment Method</div>
									<p class="section-lead">The payment method that we provide is to make it easier for you to pay invoices.</p>
{{--									<div class="images">--}}
{{--										<img src="assets/img/cards/visa.png" alt="visa">--}}
{{--										<img src="assets/img/cards/jcb.png" alt="jcb">--}}
{{--										<img src="assets/img/cards/mastercard.png" alt="mastercard">--}}
{{--										<img src="assets/img/cards/paypal.png" alt="paypal">--}}
{{--									</div>--}}
								</div>
								<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
									<div class="invoice-detail-item">
										<div class="invoice-detail-n">Subtotal</div>
										<div class="invoice-detail-v">{{ number_format($order->sub_total, 2) }}</div>
									</div>
									<div class="invoice-detail-item">
										<div class="invoice-detail-n">Vat Tax</div>
										<div class="invoice-detail-v">{{ number_format($order->vat, 2) }}</div>
									</div>
									<hr class="mt-2 mb-2">
										<div class="invoice-detail-item">
										<div class="invoice-detail-n invoice-detail-v-lg">Total</div>
										<div class="invoice-detail-v invoice-detail-v-lg vtdTtl">{{ number_format($order->grand_total, 2) }}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<script>
		function uppdate(input,ids) {
			let data = {
				val:$(input).val(),
				name:$(input).attr('name')
			}
			axios.post('{{ url("admin/order/updatestatus/") }}/'+ids, data).then(function (response) {
				location.reload();
				toastr.success('Updated Successfully');
			})
		}
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
