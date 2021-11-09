    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
         	<div class="sidebar-brand">
            	<a href="javascript">
            		<img alt="image" src="{{ asset('public/assets/admin/images/paniwalay-Logo.png') }}" class="header-logo" />
            	</a>
        	</div>
        	<ul class="sidebar-menu">
	            <li class="dropdown {{ Request::is('admin/dashboard') ? 'active' : '' }}">
	            	<a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
	            </li>

	            <li class="dropdown {{ Request::is('admin/admins') ? 'active' : '' }}">
	            	<a href="{{ route('admins.index') }}" class="nav-link"><i data-feather="user-plus"></i><span>Admin</span></a>
	            </li>

				<li class="dropdown {{ Request::is('admin/order') ? 'active' : '' }}">
					<a href="{{ route('order.index') }}" class="nav-link"><i data-feather="circle"></i><span>Orders</span></a>
				</li>


	            <li class="dropdown {{ Request::is('admin/products', 'admin/fillingStocks', 'admin/stockInOuts', 'admin/stockBalances') ? 'active' : '' }}">
	            	<a href="javascript:void();" class="menu-toggle nav-link has-dropdown"><i data-feather="box"></i><span>Products</span></a>
	            	<ul class="dropdown-menu">
	                	<li><a class="nav-link {{ Request::is('admin/products') ? 'active' : '' }}" href="{{ route('products.index') }}">Products</a></li>
	                	<hr class="linBttm">

	                	<li><a class="nav-link {{ Request::is('admin/fillingStocks') ? 'active' : '' }}" href="{{ route('fillingStocks.index') }}">Bottle Filling Stock</a></li>
	                	<hr class="linBttm">

	                	<li><a class="nav-link" href="#">Filling Stock History</a></li>

	                	<hr class="linBttm">
	                	<li><a class="nav-link {{ Request::is('admin/stockInOuts') ? 'active' : '' }} " href="{{ route('stockInOuts.index') }}">Stock In / Out</a></li>
	                	<hr class="linBttm">
	                	<li><a class="nav-link {{ Request::is('admin/stockBalances') ? 'active' : '' }}" href="{{ route('stockBalances.index') }}">Check Stock Balance</a></li>
	              	</ul>
	            </li>
            	<li class="dropdown {{ Request::is('admin/customers') ? 'active' : '' }}">
              		<a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Customer</span></a>
		            <ul class="dropdown-menu">
		                <li><a class="nav-link {{ Request::is('admin/customers') ? 'active' : '' }}" href="{{ route('customers.index') }}">Customer</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link" href="#">New Sale Order</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link" href="#">Add Customer Payment</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link" href="#">Customer Ledger</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link" href="#">Customer Security Amount</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link" href="#">Customer Balance Sheet</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link" href="#">Product Price To Customer</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link" href="#">Customer Pin From G-Map</a></li>
		            </ul>
		        </li>

            	<li class="dropdown {{ Request::is('admin/vendors') ? 'active' : '' }}">
              		<a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="trello"></i><span>Vendor</span></a>
		            <ul class="dropdown-menu">
		                <li><a class="nav-link {{ Request::is('admin/vendors') ? 'active' : '' }}" href="{{ route('vendors.index') }}">Vonder Account</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link" href="#">New Purchase Order</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link" href="#">Add Vendor Payment</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link" href="#">Vendor Ledger</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link" href="#">Vendor Balance Sheet</a></li>
		            </ul>
	            </li>

	            <li class="dropdown {{ Request::is('admin/employees', 'admin/areaAssigns') ? 'active' : '' }}">
	            	<a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Employee</span></a>
		            <ul class="dropdown-menu">
		                <li><a class="nav-link {{ Request::is('admin/employees') ? 'active' : '' }}" href="{{ route('employees.index') }}">Employees</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link {{ Request::is('admin/areaAssigns') ? 'active' : '' }}" href="{{ route('areaAssigns.index') }}">Area Assign To Employee</a></li>					                
		            </ul>
	            </li>
	            <li class="dropdown">
	            	<a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file-text"></i><span>Reports</span></a>
		            <ul class="dropdown-menu">
		                <li><a class="nav-link" href="#">Print Daily Area & Tickets</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link" href="#">Daily Sales Report</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link" href="#">Monthly Sales Report</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link" href="#">Yearly Sales Report</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link" href="#">Product Wise Sales Report</a></li>
		            </ul>
	            </li>
	            <li class="dropdown  {{ Request::is('admin/investments', 'admin/expenditures') ? 'active' : '' }}">
	            	<a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="activity"></i><span>Expenditure</span></a>
		            <ul class="dropdown-menu">
		                <li><a class="nav-link {{ Request::is('admin/expenditures') ? 'active' : '' }}" href="{{ route('expenditures.index') }}">Expenditure</a></li>
		                <hr class="linBttm">
		                <li><a class="nav-link {{ Request::is('admin/investments') ? 'active' : '' }}" href="{{ route('investments.index') }}">Investment</a></li>
		            </ul>
	            </li>
	            <li class="dropdown">
	            	<a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="framer"></i><span>Transaction</span></a>
	            </li>
	            <li class="dropdown">
	            	<a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="settings"></i><span>Settings</span></a>
	            </li>
	            <li class="dropdown">
	            	<a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-toggle nav-link has-dropdown"><i data-feather="power"></i><span>Logout</span></a>
	            </li>
	            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
          	</ul>
        </aside>
    </div>