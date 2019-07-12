 @extends('layouts.app')

@section('content')


	<div class="col-md-9 col-lg-9 col-sm-9 pull-left">

 
 

      <!-- Example row of columns -->
      <div class="row col-md-12 col-lg-12 col-sm-12" style="background-color: white; margin: 10px;">
     	<form method="post" action="{{route('projects.store')}}">
       	{{ csrf_field() }}
       

       	<div class="form-group">
       		<label for="project-name">Name<span class="required">*</span>
       		</label>
       		<input type="text" name="p_name" placeholder="Enter Name" id="project-name" spellcheck="false" class="form-control"  required="1">
       	</div>

          @if($companies != null)
         
          <input class="form-control" type="hidden" name="company_id" id="company_id"  value="{{$company_id }}">
       @endif
          @if($companies != null)
       <div class="form-group">
         <label for="company-content">Select Company</label>

         <select name="company_id" class="form-control">
          @foreach($companies as $company)
           <option value="{{$company->id}}">{{$company->c_name}}</option>
           @endforeach
         </select>
       </div>
       @endif

       		<div class="form-group">
       		<label for="project-name">Description<span class="required">*</span>
       		</label>
       		<textarea type="text" style="resize: vertical;" name="p_description" placeholder="Enter Description" id="project-description" spellcheck="false" class="form-control autosize-target text-left" rows="5" required="1"></textarea>
       	</div>

        <div class="form-group">
          <label for="project-name">Days<span class="required">*</span>
          </label>
          <input type="number" name="days" placeholder="Enter Days" id="project-days" spellcheck="false" class="form-control"  required="1">
        </div>
       <div class="form-group">
       	<input type="submit" class="btn btn-info" value="Submit">
       	<a href="/projects" class="btn btn-danger">Back</a>
       </div>


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
              <li><a href="/projects/">List of Projects</a></li>
              
             
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