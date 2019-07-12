 @extends('layouts.app')

@section('content')


<div class="col-md-9 col-lg-9 col-sm-9 pull-left">

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>{{ $company->c_name }}</h1>
        <p class="lead">{{$company->c_description}}</p>
       <!--  <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
      </div>

      <!-- Example row of columns -->
      <div class="row" style="background-color: white; margin: 10px;">
      	<a class="pull-right btn btn-info btn-sm" href="/projects/create/">Add new Project</a> 
      	@foreach($company->projects as $project)
        <div class="col-lg-4">
          <h2>{{ $project->p_name}}</h2>
   
          <p>{{$project->p_description}}</p>
          <p><a class="btn btn-primary" href="/project/{{ $project->p_id }}" role="button">View Project &raquo;</a></p>
        </div>
        @endforeach

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
              <li><a href="/companies/{{ $company->id }}/edit/">Edit</a></li>
              <li><a href="/companies/">List of Company</a></li>
              <li><a href="/projects/create/">Add Project</a></li>
              <li><a href="/companies/create/">Create new Company</a></li>

              <li>

              	  <a   
              href="#"
                  onclick="
                  var result = confirm('Are you sure you wish to delete this Company?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                          >
                  Delete
              </a>

              <form id="delete-form" action="{{ route('companies.destroy',[$company->id]) }}" 
                method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
			 </form>

              </li>
              <!-- <li><a href="#">Add New member</a></li> -->
              <!-- <li><a href="/companies/">All Commpanies</a></li> -->
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Memeber</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
            
            </ol>
          </div>
          
        </div><!-- /.blog-sidebar -->

       

    
   

      @endsection