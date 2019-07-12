@extends('layouts.app')


@section('title', 'Category List')


@section('content')
 	<div class="content">
		 <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              @include('layouts.partial.msg')

              <a href="{{route('category.create')}}" class="btn btn-info" >Add New </a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Category</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" width="100%">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Category
                        </th>
                        <th>
                          Slug
                        </th>

                        <th>
                          Created At
                        </th>
                        <th>
                          Updated At
                        </th>
                         <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                      @foreach($categories as $key=>$category)
							<tr>
								<td>{{$key + 1}}</td>
								<td>{{$category->name}}</td>
								<td>{{$category->created_at}}</td>
								<td>{{$category->updated_at}}</td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}"><i class="material-icons " style="color: #17bce6">edit</i></a> ||

                    <form id="delete-form-{{$category->id}}" action="{{ route('category.destroy', $category->id) }}" method="POST" accept-charset="utf-8" style="display: none;">
                    @csrf
                    @method('DELETE')
  </form>

                    <i class="material-icons" style="color: #e6172c; padding-top: :20px; " onclick="if(confirm('Are you sure ? You want to delete this ?')){
                      event.preventDefault();
                      document.getElementById('delete-form-{{$category->id}}').submit();
                    }else{
                      event.preventDefault();

                    }">delete_forever</i>



                 </td>
							</tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
       	 </div>
    </div>

@endsection