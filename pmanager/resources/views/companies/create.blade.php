 @extends('layouts.app')

@section('content')


	<div class="col-md-9 col-lg-9 col-sm-9 pull-left">

 
 

      <!-- Example row of columns -->
      <div class="row col-md-12 col-lg-12 col-sm-12" style="background-color: white; margin: 10px;">
     	<form method="post" action="{{route('companies.store')}}">
       	{{ csrf_field() }}
       

       	<div class="form-group">
       		<label for="company-name">Name<span class="required">*</span>
       		</label>
       		<input type="text" name="c_name" placeholder="Enter Name" id="company-name" spellcheck="false" class="form-control"  required="1">
       	</div>

       		<div class="form-group">
       		<label for="company-name">Description<span class="required">*</span>
       		</label>
       		<textarea type="text" style="resize: vertical;" name="c_description" placeholder="Enter Description" id="company-description" spellcheck="false" class="form-control autosize-target text-left" rows="5" required="1"></textarea>
       	</div>
       <div class="form-group">
       	<input type="submit" class="btn btn-info" value="Submit">
       	<a href="/companies" class="btn btn-danger">Back</a>
       </div>

</form>
		</div>
	</div>



        <div class="col-sm-3 col-md-3 col-lg-3   pull-right" style="background-color: #dce2ed">
         <!--  <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
          <div class="sidebar-module">
            <h4>Actions </h4>
            <ol class="list-unstyled">
              <li><a href="/companies">List of Companies</a></li>
              
             
            </ol>
          </div>
        <!--   <div class="sidebar-module">
            <h4>Memeber</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
            
            </ol>
          </div> -->
          
        </div><!-- /.blog-sidebar -->

       

    
   

      @endsection