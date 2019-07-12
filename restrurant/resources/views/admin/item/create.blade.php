@extends('layouts.app')


@section('title', 'Item Create')


@section('content')
 	<div class="content">
		 <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              @include('layouts.partial.msg')

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Add New Item</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('item.store')}}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                   @csrf

                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Category Name</label>

                            <select name="category_id" class="form-control" >
                              <option disabled="" selected="">Select Category</option>
                                 @foreach($categories as $category)

                              <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                            </select>

                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Name</label>
                            <input type="text" name="name" class="form-control">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Description</label>
                            <input type="text" name="description" class="form-control">
                          </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Price</label>
                            <input type="number" name="price" class="form-control">
                          </div>
                        </div>
                    </div>

                       <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Upload Image</label><br>

                            <style>#file { display: none; }</style>
                              <label class="mdl-button mdl-js-button mdl-button--icon mdl-button--file">
                                <i style="color: #d11560; cursor: pointer; font-size: 2.90em;" class="material-icons">cloud_upload</i><input type="file" name="image" class="form-control">
                              </label>
                          </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('item.index')}}" class="btn btn-info">Back</a>

                  </form>
                </div>
              </div>
            </div>

          </div>
       	 </div>
    </div>

@endsection