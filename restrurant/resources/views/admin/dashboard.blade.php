@extends('layouts.app')

@section('title', "Dashboard")



@section('content')
   <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Category/Item</p>
                  <h3 class="card-title">{{$category}}/{{$item}}

                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="#pablo">Total Category/Item</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Slider</p>
                  <h3 class="card-title">{{$slider}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> All Slider
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Reservation</p>
                  <h3 class="card-title">{{$reservations->count()}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> <a href="{{ route('reservation.reserve') }}">Not Confirm Reservation</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">Contact</p>
                  <h3 class="card-title">{{$contact}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Client Message
                  </div>
                </div>
              </div>
            </div>
          </div>

             <div class="row">
            <div class="col-md-12">

              @include('layouts.partial.msg')

        <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Reservation Message</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" width="100%">
                      <thead class=" text-primary">

                        <th>
                          Customer Name
                        </th>
                        <th>
                          Phone
                        </th>


                        <th>
                          Message
                        </th>
                       {{--  <th>
                          Status
                        </th> --}}
                         <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                      @foreach($reservations as $key=>$reservation)
              <tr>
               <td>{{$reservation->name}}</td>
                <td>{{$reservation->phone}}</td>
                <td>{{$reservation->message}}</td>
             {{--    <td>
                  @if($reservation->status == true)
                  <span style="color:  #17e332">Confirm</span>
                  @else
                    <span style="color: #e32117">Not Confirm Yet</span>
                  @endif
                </td> --}}
                <td>
                  @if($reservation->status == false)
                    <form id="status-form-{{$reservation->id}}" action="{{ route('reservation.status', $reservation->id) }}" method="POST" accept-charset="utf-8" style="display: none;">
                    @csrf
                   </form>

                    <button class="btn btn-info" onclick="if(confirm('Are you sure ? You want to confirm this ?')){
                      // event.preventDefault();
                      document.getElementById('status-form-{{$reservation->id}}').submit();
                    }else{
                      event.preventDefault();

                    }">Confirm</button>

                    @endif
                    <form id="delete-form-{{$reservation->id}}" action="{{ route('reservation.destroy', $reservation->id) }}" method="POST" accept-charset="utf-8" style="display: none;">
                                      @csrf
                                      @method('DELETE')
                    </form>

                                      <button  class="btn btn-info" onclick="if(confirm('Are you sure ? You want to delete this ?')){
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$reservation->id}}').submit();
                                      }else{
                                        event.preventDefault();

                                      }">Delete</button>
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
