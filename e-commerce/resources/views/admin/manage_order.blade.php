@extends('admin_layout')

@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{url('/dashboard')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="{{url('/all-category')}}">Category</a></li>
			</ul>

			<div class="row-fluid ">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Order</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<br>
					<p class="alert-success">
							<?php
							$message = Session::get('message');
							if($message){
								echo $message;
								Session::put('message', null);
							}
						
							?>

						</p>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable ">
						  <thead>
							  <tr>
							  	 <th>Order Id</th>
								  <th>Customer Name</th>
								  <th>Order Total</th>
								  
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  @foreach($all_order_info as $v_order)
						  <tbody>
							<tr>
								<td>{{ $v_order->order_id }}</td>
								<td>{{ $v_order->customer_name }}</td>
								
								<td class="center">{{ $v_order->order_total }}</td>

								<!-- <td class="center">{{ $v_order->order_status }}</td>
										<td class="center">
									
									<a class="btn btn-success" href="{{URL::to('/active/'.$v_order->order_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									
									<a class="btn btn-danger" href="{{URL::to('/unactive_order/'.$v_order->order_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
								

									<a class="btn btn-info" href="{{URL::to('/view_order/'.$v_order->order_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete_order/'.$v_order->order_id)}}" id="delete">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td> -->

								<td class="center">
									@if($v_order->order_status=="success")
									<span class="label label-success">Delivered</span>
									@else
									<span class="label btn-danger">Pending</span>

									@endif
								</td>
								<td class="center">
									@if($v_order->order_status=="success")
									<a class="btn btn-success" href="{{URL::to('/success_order/'.$v_order->order_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@else
									<a class="btn btn-danger" href="{{URL::to('/pending_order/'.$v_order->order_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@endif

									<a class="btn btn-info" href="{{URL::to('/view_order/'.$v_order->order_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete_order/'.$v_order->order_id)}}" id="delete">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
							
							
						  </tbody>
						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection