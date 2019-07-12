@extends('admin_layout')

@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{url('/dashboard')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="{{url('/all-category')}}">Product</a></li>
			</ul>

			<div class="row-fluid ">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Products</h2>
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
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  
								  <th width="15%">Product Name</th>
								  <th>Category Name</th>
								  <th>Manufacture Name</th>
								  <th width="20%">Product Description</th>
								  <th>Product Color</th>
								  <th>Product Size</th>
								  <th>Product Price</th>
								  <th>Product Image</th>
								  
								  <th>Status</th>
								  <th width="15%">Actions</th>
							  </tr>
						  </thead>   
						  @foreach($all_products as $v_product)
						  <tbody>
							<tr>
								<td>{{ $v_product->product_name }}</td>
								<td>{{ $v_product->category_name }}</td>
								<td>{{ $v_product->manufacture_name }}</td>
								
								<td class="center">{{ $v_product->product_short_desc }}</td>
								<td class="center">{{ $v_product->product_color }}</td>
								<td class="center">{{ $v_product->product_size }}</td>
								<td class="center">{{ $v_product->product_price }}</td>
								<td class="center"><img height="50px" width="80px;" src="{{URL::to($v_product->product_image )}}"></td>
								<td class="center">
									@if($v_product->publication_status==1)
									<span class="label label-success">Active</span>
									@else
									<span class="label btn-danger">Unactive</span>

									@endif
								</td>
								<td class="center">
									@if($v_product->publication_status==1)
									<a class="btn btn-success" href="{{URL::to('/active_product/'.$v_product->product_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@else
									<a class="btn btn-danger" href="{{URL::to('/unactive_product/'.$v_product->product_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@endif

									<a class="btn btn-info" href="{{URL::to('/edit_product/'.$v_product->product_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete_pruduct/'.$v_product->product_id)}}" id="delete">
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