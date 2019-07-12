 @extends('layouts.app')

@section('content')


<div class="col-md-9 col-lg-9 col-sm-9 pull-left">

      <!-- Jumbotron -->
      <div class="well well-lg">
        <h1>{{ $project->p_name }}</h1>
        <p class="lead">{{$project->p_description}}</p>
       <!--  <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
      </div>

      <!-- Example row of columns -->
      <div class="row" style="background-color: white; margin: 10px;">
      	<a class="pull-right btn btn-info btn-sm" href="/projects/create">Add new Task</a> 

<br>
<div class="row container-fluid">

  <form method="post" action="{{route('comments.store')}}">
        {{ csrf_field() }}

        <input type="hidden" name="commentable_type" value="App\Project">
        <input type="hidden" name="commentable_id" value="{{$project->id}}">
       
        <div class="form-group">
          <label for="comment_body">Comment<span class="required">*</span>
          </label>
          <textarea type="text" style="resize: vertical;" name="comment_body" placeholder="Enter Comment" id="comment_body" spellcheck="false" class="form-control autosize-target text-left" rows="3" required="1"></textarea>
        </div>

        <div class="form-group">
          <label for="company-name">Proof of work done(Url/Photos)<span class="required">*</span>
          </label>
          <textarea  style="resize: vertical;" name="url" placeholder="Enter Url/Photos" id="url" spellcheck="false" class="form-control autosize-target text-left" rows="2" required="1"></textarea>
        </div>
       
         



       <div class="form-group">
        <input type="submit" class="btn btn-info" value="Submit">
        <a href="/companies" class="btn btn-danger">Back</a>
       </div>

</form>

</div>


  @include('partials.comment');
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
              <li><a href="/projects/{{$project->id}}/edit/">Edit</a></li>
              <li><a href="/projects/">List of Project</a></li>
              <li><a href="/projects/create/">Create new Project</a></li>

              @if($project->user_id == Auth::user()->id)

              <li>

              	  <a   
              href="#"
                  onclick="
                  var result = confirm('Are you sure you wish to delete this Project?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                          >
                  Delete
              </a>

              <form id="delete-form" action="{{ route('projects.destroy',[$project->id]) }}" 
                method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
			 </form>

              </li>
              @endif
              <!-- <li><a href="#">Add New member</a></li> -->
              <!-- <li><a href="/companies/">All Commpanies</a></li> -->

            </ol>

</hr>

<h4>Add Member</h4>
            <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12">
  
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Member">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Add</button>
      </span>
   
  </div><!-- /.col-lg-6 -->
  </div><!-- /.col-lg-6 -->

</div><!-- /.row -->
<br>
<h4>Team Member</h4>
  <ol class="list-unstyled">
    <li><a href="">Nazmul Huda</a></li>
    <li><a href="">Mijanur Rahman</a></li>
    <li><a href="">Rana Hossain</a></li>
  </ol>


          </div>
         

       

    
   

      @endsection