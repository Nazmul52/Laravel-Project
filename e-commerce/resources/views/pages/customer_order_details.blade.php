@extends('layout')
@section('content')



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
								   <th>Status</th>
								  <th>Product Sub Total</th>
								 
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($order_details as $v_order)
						  
							<tr>
								<td>{{$v_order->product_id}}</td>
								<td>{{$v_order->product_name}}</td>
								<td>{{$v_order->product_price}}</td>
								<td>{{$v_order->product_sales_quantity}}</td>
								<td>{{$v_order->order_status}}</td>
								<td>{{$v_order->product_price*$v_order->product_sales_quantity}}</td>
								
								
							</tr>
								@endforeach
							
						  </tbody>
						  <tfoot>
						  	<tr>
						  		<td colspan="5">Total with vat: </td>
						  		<td><strong>= {{$v_order->order_total}} Tk</strong></td>
						  	</tr>
						  </tfoot>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->



@endsection