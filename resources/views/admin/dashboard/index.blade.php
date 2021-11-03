
@extends('admin.layout.master')


@section('page-title')
Dashboard
@endsection


@section('content')
    <section class="section">
    	<div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              	<div class="card">
                	<div class="card-statistic-4">
                  		<div class="align-items-center justify-content-between">
                    		<div class="row ">
                      			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        			<div class="card-content">
			                          	<h5 class="font-15">New Booking</h5>
			                         	<h2 class="mb-3 font-18">258</h2>
			                          	<p class="mb-0"><span class="col-green">10%</span> Increase</p>
                        			</div>
                      			</div>
                      			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        			<div class="banner-img">
                          				<img src="{{ asset('assets/admin/images/banner/11.png') }}" alt="">
                        			</div>
                      			</div>
                    		</div>
                  		</div>
                	</div>
              	</div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              	<div class="card">
                	<div class="card-statistic-4">
                  		<div class="align-items-center justify-content-between">
                    		<div class="row ">
                      			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        			<div class="card-content">
			                          	<h5 class="font-15"> Customers</h5>
			                          	<h2 class="mb-3 font-18">287</h2>
			                          	<p class="mb-0"><span class="col-orange">07%</span> Decrease</p>
                        			</div>
                      			</div>
                      			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        			<div class="banner-img">
                          				<img src="{{ asset('assets/admin/images/banner/22.png') }}" alt="">
                        			</div>
                      			</div>
                    		</div>
                  		</div>
                	</div>
              	</div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              	<div class="card">
                	<div class="card-statistic-4">
                  		<div class="align-items-center justify-content-between">
                    		<div class="row">
                      			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        			<div class="card-content">
			                          	<h5 class="font-15">Total Stock</h5>
			                          	<h2 class="mb-3 font-18">128</h2>



			                          	
			                          	<p class="mb-0"><span class="col-green">18%</span>Increase</p>
                        			</div>
                      			</div>
                      			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        			<div class="banner-img">
                          				<img src="{{ asset('assets/admin/images/banner/33.png') }}" alt="">
                        			</div>
                      			</div>
                    		</div>
                  		</div>
                	</div>
              	</div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              	<div class="card">
                	<div class="card-statistic-4">
                  		<div class="align-items-center justify-content-between">
                   			<div class="row">
                      			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        			<div class="card-content">
			                          	<h5 class="font-15">Revenue</h5>
			                          	<h2 class="mb-3 font-18">Rs. 548,697</h2>
			                          	<p class="mb-0"><span class="col-green">42%</span> Increase</p>
                        			</div>
                      			</div>
                      			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        			<div class="banner-img">
                          				<img src="{{ asset('assets/admin/images/banner/44.png') }}" alt="">
                        			</div>
                      			</div>
                    		</div>
                  		</div>
                	</div>
              	</div>
            </div>
        </div>

    	<div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            	<div class="row">
		            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
		              	<div class="card">
		              		<div class="card-header">
		                  		<h4>Total Order This Week</h4>
		                	</div>		                	
		                	<div class="card-body">
		                  		<div class="summary">
		                    		<div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
		                      			<div id="chartdiv"></div>
		                    		</div>
		                    		<div data-tab-group="summary-tab" id="summary-text"></div>
		                  		</div>
		                	</div>
		              	</div>
		            </div>
		            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
		              	<div class="card">
		                	<div class="card-header">
		                  		<h4>Total Sales This Week</h4>
		                	</div>
		                	<div class="card-body">
		                  		<div id="chartdiv2"></div>
		                	</div>
		              	</div>
		            </div>
		        </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
              	<div class="card ">
                	<div class="card-body">
                  		<div class="row">
                    		<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                      			<div id="chart1"></div>
                      			<div class="row mb-0">
                        			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          				<div class="list-inline text-center">
                            				<div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle" class="col-green"></i>
                              					<h5 class="m-b-0">Rs: 16,675</h5>
                              					<p class="text-muted font-14 m-b-0">Weekly Earnings</p>
                            				</div>
                          				</div>
                        			</div>
                        			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          				<div class="list-inline text-center">
                            				<div class="list-inline-item p-r-30">
                            					<i data-feather="arrow-down-circle" class="col-orange"></i>
                              					<h5 class="m-b-0">Rs: 111,587</h5>
                              					<p class="text-muted font-14 m-b-0">Monthly Earnings</p>
                            				</div>
                          				</div>
                        			</div>
                        			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          				<div class="list-inline text-center">
                            				<div class="list-inline-item p-r-30">
                            					<i data-feather="arrow-up-circle" class="col-green"></i>
                              					<h5 class="mb-0 m-b-0">Rs: 4,545,965</h5>
                              					<p class="text-muted font-14 m-b-0">Yearly Earnings</p>
                            				</div>
                          				</div>
                        			</div>
                      			</div>
                    		</div>
                    		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4" style="padding-left: 25px;">
                      			<div class="row mt-5">
                        			<div class="col-7 col-xl-7 mb-3">Total Customers</div>
                    				<div class="col-5 col-xl-5 mb-3">
                      					<span class="text-big">287</span>
                      					<sup class="col-green">+09%</sup>
                    				</div>
                    				<div class="col-7 col-xl-7 mb-3">Total Income</div>
                					<div class="col-5 col-xl-5 mb-3">
                  						<span class="text-big">Rs: 59,857</span>
                  						<sup class="text-danger">-18%</sup>
                					</div>
                					<div class="col-7 col-xl-7 mb-3">Total Sales</div>
            						<div class="col-5 col-xl-5 mb-3">
              							<span class="text-big">21</span>
              							<sup class="col-green">+16%</sup>
            						</div>
            						<div class="col-7 col-xl-7 mb-3">Total Expense</div>
        							<div class="col-5 col-xl-5 mb-3">
          								<span class="text-big">Rs: 6,287</span>
          								<sup class="col-green">+09%</sup>
        							</div>			                        							
                        			<div class="col-7 col-xl-7 mb-3">New Customers</div>
                        			<div class="col-5 col-xl-5 mb-3">
                          				<span class="text-big">684</span>
                          				<sup class="col-green">+22%</sup>
                        			</div>
                      			</div>
                    		</div>
                  		</div>
                	</div>
              	</div>

              	<div class="row">
              		<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
              			<div class="card">
		                  	<div class="card-body">
		                    	<div class="recent-report__chart">
		                      		<div id="chart3"></div>
		                    	</div>
		                  	</div>
		                </div>
              		</div>

              		<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
              			<!-- progress bar area -->
              			<div class="card progressBarDD">
							<div class="card-body">
								<p>Total Sales</p>
								<div class="progress mb-33">
									<div class="progress-bar" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
								</div>
								<p>Total Revenue</p>
								<div class="progress mb-33">
									<div class="progress-bar" role="progressbar" data-width="63%" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100">63%</div>
								</div>
								<p>Total New Booking</p>
								<div class="progress mb-33">
									<div class="progress-bar" role="progressbar" data-width="27%" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100">27%</div>
								</div>
								<p>Total New Customer</p>
								<div class="progress mb-33">
									<div class="progress-bar" role="progressbar" data-width="18%" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">18%</div>
								</div>
							</div>
						</div>
              		</div>
              	</div>
            </div>
        </div>
    </section>

@endsection

