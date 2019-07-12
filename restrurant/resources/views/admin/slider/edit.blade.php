@extends('layouts.app')


@section('title', 'Slider')


@section('content')
 	<div class="content">
		 <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

                   @include('layouts.partial.msg')

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Edit Slider</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('slider.update', $slider->id)}}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                   @csrf
                  @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Title</label>
                            <input type="text" name="title" value="{{$slider->title}}" class="form-control">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Sub Title</label>
                            <input type="text" value="{{$slider->sub_title}}" name="sub_title" class="form-control">
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
                      <a href="{{route('slider.index')}}" class="btn btn-info">Back</a>
                  </form>
                </div>
              </div>
            </div>

          </div>
       	 </div>
    </div>

@endsection