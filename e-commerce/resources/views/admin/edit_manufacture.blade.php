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
					<a href="#">Manufacture</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Manufacture</h2>

						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
						
					</div>
					<div class="box-content">
						
						<form class="form-horizontal" method="post" action="{{url('/update_manufacture', $manufacture_info->manufacture_id)}}">
							{{ csrf_field() }}
						  <fieldset>
						
							<div class="control-group">
							  <label class="control-label" for="date01">Manufacture name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " id="date01" name="manufacture_name" value="{{$manufacture_info->manufacture_name}}">
							  </div>
							</div>

						<!-- 	<div class="control-group">
							  <label class="control-label" for="fileInput">File input</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file">
							  </div>
							</div>   -->        
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Manufacture Description</label>
							  <div class="controls">
								<textarea class="input-xlarge" name="manufacture_desc" rows="3" >
									{{$manufacture_info->manufacture_desc}}
								</textarea>
							  </div>
							</div>

							

							

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Manufacture</button>
							  <a href="{{url
							  ('/all_manufacture')}}" type="reset" class="btn">Cancel</a>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection