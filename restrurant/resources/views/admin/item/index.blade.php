@extends('layouts.app')


@section('title', 'Item List')


@section('content')
 	<div class="content">
		 <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              @include('layouts.partial.msg')

              <a href="{{route('item.create')}}" class="btn btn-info" >Add New </a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Item</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" width="100%">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Category Name
                        </th>
                        <th>
                          Item Name
                        </th>

                        <th>
                         Description
                        </th>
                        <th>
                          Price
                        </th>
                        <th>
                          Image
                        </th>
                         <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                      @foreach($items as $key=>$item)
							<tr>
								<td>{{$key + 1}}</td>
                <td>{{$item->category->name}}</td>
								<td>{{$item->name}}</td>
								<td>{{$item->description}}</td>
								<td>{{$item->price}}</td>
                <td><img src="/item_image/item/{{$item->image}}" class="img-responsive img-thumbnil" width="100px" height="70px" alt=""> </td>
                <td>
                    <a href="{{ route('item.edit', $item->id) }}"><i class="material-icons " style="color: #17bce6">edit</i></a> ||

                    <form id="delete-form-{{$item->id}}" action="{{ route('item.destroy', $item->id) }}" method="POST" accept-charset="utf-8" style="display: none;">
                    @csrf
                    @method('DELETE')
  </form>

                    <i class="material-icons" style="color: #e6172c; padding-top: :20px; " onclick="if(confirm('Are you sure ? You want to delete this ?')){
                      event.preventDefault();
                      document.getElementById('delete-form-{{$item->id}}').submit();
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