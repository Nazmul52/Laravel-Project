@extends('layouts.app')


@section('title', 'Slider')


@section('content')
 	<div class="content">
		 <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              @include('layouts.partial.msg')

              <a href="{{route('slider.create')}}" class="btn btn-info" >Add New</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Slider</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" width="100%">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Title
                        </th>
                        <th>
                          Sub Title
                        </th>
                        <th>
                          Image
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
                      @foreach($sliders as $key=>$slider)
							<tr>
								<td>{{$key + 1}}</td>
								<td>{{$slider->title}}</td>
								<td>{{$slider->sub_title}}</td>
								<td><img src="/slider_image/slider/{{$slider->image}}" class="img-responsive img-thumbnil" width="100px" height="70px" alt=""> </td>
								<td>{{$slider->created_at}}</td>
								<td>{{$slider->updated_at}}</td>
                <td>
                    <a href="{{ route('slider.edit', $slider->id) }}"><i class="material-icons " style="color: #17bce6">edit</i></a> ||

                    <form id="delete-form-{{$slider->id}}" action="{{ route('slider.destroy', $slider->id) }}" method="POST" accept-charset="utf-8" style="display: none;">
                    @csrf
                    @method('DELETE')
  </form>

                    <i class="material-icons" style="color: #e6172c; padding-top: :20px; " onclick="if(confirm('Are you sure ? You want to delete this ?')){
                      event.preventDefault();
                      document.getElementById('delete-form-{{$slider->id}}').submit();
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