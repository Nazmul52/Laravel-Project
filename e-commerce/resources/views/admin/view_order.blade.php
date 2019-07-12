@extends('admin_layout')

@section('admin_content')




<div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table">
							  <thead>

								  <tr>
									  <th>Customer Name</th>
									  <th>Email</th>
									  <th>Mobile Number</th>
									                                       
								  </tr>
							  </thead>   
							  	
							  <tbody>
							  @foreach($order_by_id as $v_order)
							  	@endforeach
								<tr>
									<td>{{$v_order->customer_name}}</td>
									<td class="center">{{$v_order->customer_email}}</td>
									<td class="center">{{$v_order->customer_phone}}</td>
								                                     
								</tr>
								
								                            
							  </tbody>
							   
						 </table>  
						
					</div>
				</div><!--/span-->
				
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped">
							  <thead>
							  	@foreach($order_by_id as $v_order)
							  	@endforeach
								  <tr>
									  <th>User Name</th>
									  <th>Shipping Address</th>
									  <th>Phone Number</th>
									                                         
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									 <td>{{$v_order->first_name}} {{$v_order->last_name}}</td>
									  <td>{{$v_order->shipping_address}}</td>
									  <td>{{$v_order->shipping_phone}}</td>
									                                 
								</tr>
								                                 
							  </tbody>
						 </table>  
						
					</div>
				</div><!--/span-->
			</div><!--/row-->




			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Order Details</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable ">
						  <thead>
							  <tr>
								  <th>Id</th>
								  <th>Product Name</th>
								  <th>Product Price</th>
								  <th>Sales Quantity</th>
								  <th>Product Sub Total</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($order_by_id as $v_order)
						  
							<tr>
								<td>{{$v_order->product_id}}</td>
								<td>{{$v_order->product_name}}</td>
								<td>{{$v_order->product_price}}</td>
								<td>{{$v_order->product_sales_quantity}}</td>
								<td>{{$v_order->product_price*$v_order->product_sales_quantity}}</td>
								
							</tr>
								@endforeach
							
						  </tbody>
						  <tfoot>
						  	<tr>
						  		<td colspan="4">Total with vat: </td>
						  		<td><strong>= {{$v_order->order_total}} Tk</strong></td>
						  	</tr>
						  </tfoot>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
@endsection