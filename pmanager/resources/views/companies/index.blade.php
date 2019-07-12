@extends('layouts.app')

@section('content')


<div class=" col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
  <div class="panel panel-info ">
    <div class="panel-heading">Companies <a class="btn tbn-primary pull-right btn-md" style="margin-top: -6px;" href="/companies/create/">Create new Company</a></div>
    <div class="panel-body">
     
        <ul class="list-group">
          @foreach($companies as $company)
          <li class="list-group-item"><a href="/companies/{{ $company->id}}">{{ $company->c_name}}</a></li>
         @endforeach
        </ul>



    </div>
  </div>
</div>
</div>
</div>

@endsection