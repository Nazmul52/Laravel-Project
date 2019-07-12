@extends('layouts.app')


@section('title', 'Login')


@section('content')
    <div class="content">
         <div class="container-fluid">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-6 col-md-offset-6">

              @include('layouts.partial.msg')

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Login Panel</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('login')}}" method="POST" accept-charset="utf-8" >
                   @csrf

                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Email</label>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}" required="">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Password</label>
                            <input type="password" name="password" value="{{old('password')}}" class="form-control" required="">
                          </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="{{route('welcome')}}" class="btn btn-info">Back</a>

                  </form>
                </div>
              </div>
            </div>

          </div>
         </div>
    </div>

@endsection