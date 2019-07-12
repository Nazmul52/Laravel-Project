@extends('layouts.app')

@section('content')


<div class=" col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
  <div class="panel panel-info ">
    <div class="panel-heading">Project <a class="btn tbn-primary pull-right btn-md" style="margin-top: -6px;" href="/projects/create/">Create new Project</a></div>
    <div class="panel-body">
     
        <ul class="list-group">
          @foreach($projects as $project)
          <li class="list-group-item"><a href="/projects/{{ $project->id}}">{{ $project->p_name}}</a></li>
         @endforeach
        </ul>



    </div>
  </div>
</div>
</div>
</div>

@endsection