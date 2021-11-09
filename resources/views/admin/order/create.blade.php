@extends('admin.layout.master')

@section('page-title')
    Add Order
@endsection()

@section('content')
    <style>
        .pac-container{
            z-index:999999;
        }
    </style>
    <!-- Main Content -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <section class="section">
        <div class="row">
            <div class="col-6">
                <h5>Add Order</h5>
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
                    <h2>Create Order</h2>
                    <div class="productWrap stockWrap minInput">
                        <div class="card-body">
                            <form class="contact-form" method="post" action="{{ route('order.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="input-block">
                                                <label>Select Employee</label>
                                                <select class="form-control" name="employee_id" required="">
                                                    <option value="" selected="false" disabled="disabled" value="{{ old('employee_id') }}"></option>
                                                    @foreach($employees as $employee)
                                                        <option value="{{ $employee->id }}" >{{ $employee->first_name }} {{ $employee->last_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="input-block">
                                                <label>Select Customer</label>
                                                <select class="form-control" name="customer_id" required="">
                                                    <option value="" selected="false" disabled="disabled" value="{{ old('customer_id') }}"></option>
                                                    @foreach($customers as $customer)
                                                        <option value="{{ $customer->id }}" >{{ $customer->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="input-block">
                                                <label>Street Address</label>
                                                <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="input-block">
                                                {{--												<label>Location</label>--}}
                                                <input type="text" id="location" name="location" value="{{ old('location') }}" class="form-control">
                                                <input type="hidden" name="lat" id="latitude" value="{{ old('lat') }}">
                                                <input type="hidden" name="lng" id="longitude" value="{{ old('lng') }}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="input-block">
                                                <label>Order Type</label>
                                                <select class="form-control" name="order_type" required="">
                                                    <option value="" selected="false" disabled="disabled" value="{{ old('order_type') }}"></option>
                                                    <option value="Weekly" {{ old("order_type") == "Weekly" ? 'selected="selected"' : '' }}>Weekly</option>
                                                    <option value="Monthly" {{ old("order_type") == "Monthly" ? 'selected="selected"' : '' }}>Monthly</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="input-block">
                                                <label>Date</label>
                                                <input name="order_date" value="{{ old('order_date') }}" type="text" class="form-control" required="" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
                                            </div>
                                        </div>
                                    </div>

                                    <div id="productForm">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <div class="input-block mtrd">
                                                    <label>Select Product</label>
                                                    <select class="form-control" name="products[0][product_id]">
                                                        <option value="" selected="false" disabled="disabled" value="{{ old('products[0][product_id]') }}"></option>
                                                        @foreach($products as $product)
                                                            <option value="{{ $product->id }}" >{{ $product->product_name }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-4 col-xl-4">
                                                <div class="input-block">
                                                    <label>Qty</label>
                                                    <input type="number" name="products[0][qty]" value="{{ old('products[0][qty]') }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                <button type="button" onclick="cloneProduct(this);" class="btn btn-primary">Add More</button>
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
                                                    <a href="{{ route('order.index') }}">Cancel</a>
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
    <script>
        var i = 0;
        function cloneProduct() {
            ++i;
            var body = `<div class="row">
           <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
             <div class="input-block mtrd">
                    <select class="form-control selectric" name="products[${i}][product_id]">
                  <option value="" selected="false" disabled="disabled" value="{{ old('products[${i}][product_id]') }}"></option>
                  @foreach($products as $product)
                <option value="{{ $product->id }}" >{{ $product->product_name }} </option>
                   @endforeach
                </select>
                  </div>
                  </div>
                <div class="col-sm-10 col-md-10 col-lg-4 col-xl-4">
                      <div class="input-block">
                       <input type="number" name="products[${i}][qty]" value="{{ old('products[${i}][qty]') }}" class="form-control">
                        </div>
                           </div>
                                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <button type="button" onclick="cloneProduct(this);" class="btn btn-primary">Add More</button>
                                        <button type="button" onclick="removeProduct(this);" class="btn btn-danger">-</button>
                                        </div></div>`;
            $('#productForm').append(body);
            return false;
        }
        function removeProduct(input) {
            let self = $(input);
            self.parent().parent().remove();
            return false;
        }
    </script>
    <script>
        $(document).ready(function() {
            let input = document.getElementById('location');
            let autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.setComponentRestrictions(
                {'country': ['PK']});
            autocomplete.setFields(
                ['address_components', 'geometry', 'icon', 'name']);

            autocomplete.addListener('place_changed',function () {
                let place = autocomplete.getPlace();
                if (place.geometry) {
                    $("#latitude").val(place.geometry.location.lat());
                    $("#longitude").val(place.geometry.location.lng());
                }else {
                    document.getElementById('auto_address').placeholder = 'Address';
                }
            });
            $("#location").keyup(function(e) {
                if(e.keyCode == 8){
                    $("#latitude").val("");
                    $("#longitude").val("");
                }
            });
        });
    </script>

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
