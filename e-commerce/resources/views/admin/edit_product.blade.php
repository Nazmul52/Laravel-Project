@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Product</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Product</h2>

						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
						
					</div>
					<div class="box-content">
						
						<form class="form-horizontal" method="post" action="{{url('/update_product', $product_info->product_id)}}">
							{{ csrf_field() }}
						  <fieldset>
						
							<div class="control-group">
							  <label class="control-label" for="date01">Product name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " id="date01" name="product_name" value="{{$product_info->product_name}}">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Category</label>
							  <div class="controls">
							  

							  	<select id="select" name="category_id" class="input-xlarge" data-live-search="true">
							  		  <option>Select Category</option>
							  			<?php
                            $all_publish_Category =DB::table('tbl_category')
                            ->where('publication_status', 1)
                            ->get();

                            foreach ($all_publish_Category as  $v_category) {
                                # code...
                           
                            ?>
                          
							  		<option value="{{$v_category->id}}"> {{$v_category->category_name}}</option>
							  		 <?php
 }
                            ?>
							  	</select>	

								  </div>
							</div>


							<div class="control-group">
							  <label class="control-label" for="date01">Manufacture Name</label>
							  <div class="controls">
							  

							  	<select id="select" class="input-xlarge"  name="manufacture_id">
							  		 <option>Select Manufacture</option>
							  			<?php
                            $all_publish_manufacture =DB::table('tbl_manufacture')
                            ->where('publication_status', 1)
                            ->get();

                            foreach ($all_publish_manufacture as  $v_manufacture) {
                                # code...
                           
                            ?>
                            
							  		<option value="{{$v_manufacture->manufacture_id}}"> {{$v_manufacture->manufacture_name}}</option>
							  		 <?php
 }
                            ?>
							  	</select>	

								  </div>
							</div>

							<!-- <div class="control-group">
							  <label class="control-label" for="date01">Category name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " id="date01" name="category_id" value="{{$product_info->category_id}}">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Manufacture Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " id="date01" name="manufacture_id" value="{{$product_info->manufacture_id}}">
							  </div>
							</div> -->

							<div class="control-group">
							  <label class="control-label" for="date01">Product Short Description</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " id="date01" name="product_short_desc" value="{{$product_info->product_short_desc}}">
							  </div>
							</div>


							<div class="control-group">
							  <label class="control-label" for="date01">Product Long Description</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " id="date01" name="product_long_desc" value="{{$product_info->product_long_desc}}">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " id="date01" name="product_price" value="{{$product_info->product_price}}">
							  </div>
							</div>
							<br>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " id="date01" name="product_color" value="{{$product_info->product_color}}">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " id="date01" name="product_size" value="{{$product_info->product_size}}">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Image</label>
							  <div class="controls">
							  	<img src="{{URL::to($product_info->product_image )}}" width="80px" height="50px" name="product_image">
								
							  </div>
							</div>

							<!-- <div class="control-group">
							  <label class="control-label" for="date01">Upload Image</label>
							  <div class="controls">
							  <input type="file" class="input-xlarge" name="product_image" />
								
							  </div>
							</div>
 -->

						<!-- 	<div class="control-group">
							  <label class="control-label" for="fileInput">File input</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file">
							  </div>
							</div>   -->        
							
							

							

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Category</button>
							  <a href="{{url
							  ('/all-category')}}" type="reset" class="btn">Cancel</a>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection