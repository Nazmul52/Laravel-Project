@extends('admin_layout')

@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{url('/dashboard')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="{{url('/all_manufacture')}}">Manufacture</a></li>
			</ul>

			<div class="row-fluid ">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Manufacture</h2>
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
							  	 <th>Manufacture Id</th>
								  <th>Manufacture Name</th>
								  <th>Manufacture Description</th>
								  
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  @foreach($all_manufacture as $v_manufacture)
						  <tbody>
							<tr>
								<td>{{ $v_manufacture->manufacture_id }}</td>
								<td>{{ $v_manufacture->manufacture_name }}</td>
								
								<td class="center">{{ $v_manufacture->manufacture_desc }}</td>
								<td class="center">
									@if($v_manufacture->publication_status==1)
									<span class="label label-success">Active</span>
									@else
									<span class="label btn-danger">Unactive</span>

									@endif
								</td>
								<td class="center">
									@if($v_manufacture->publication_status==1)
									<a class="btn btn-success" href="{{URL::to('/active_manufacture/'.$v_manufacture->manufacture_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@else
									<a class="btn btn-danger" href="{{URL::to('/unactive_manufacture/'.$v_manufacture->manufacture_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@endif

									<a class="btn btn-info" href="{{URL::to('/edit_manufacture/'.$v_manufacture->manufacture_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete_manufacture/'.$v_manufacture->manufacture_id)}}" id="delete">
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