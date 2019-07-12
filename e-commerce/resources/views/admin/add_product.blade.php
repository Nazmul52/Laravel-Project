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
					<a href="#">Forms</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>

						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
						
					</div>
					<div class="box-content">
						<p class="alert-success">
							<?php
							$message = Session::get('message');
							if($message){
								echo $message;
								Session::put('message', null);
							}
						
							?>

						</p>
						<form class="form-horizontal" method="post" action="{{url('/save_product')}}" enctype="multipart/form-data">
							{{ csrf_field() }}
						  <fieldset>
						
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " id="date01" name="product_name"required>
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

						<!-- 	<div class="control-group">
							  <label class="control-label" for="fileInput">File input</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file">
							  </div>
							</div>   -->        
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea class="input-xlarge" name="product_short_desc" rows="2" required></textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea class="input-xlarge" name="product_long_desc" rows="3" required></textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="number" class="input-xlarge"  name="product_price" required/>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="date01">Product Image</label>
							  <div class="controls">
								<input type="file" class="input-xlarge" name="product_image" />
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " id="date01" name="product_color"required>
							  </div>
							</div>


							<div class="control-group hidden-phone">
							  <label class="control-label" for="date01">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge"  name="product_size" required />
							  </div>
							</div>

							

								<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
								<input type="checkbox"  value="1" name="publication_status" id="publication_status" />
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection