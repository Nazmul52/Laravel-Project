@extends('layouts.app')


@section('title', 'Reservation List')


@section('content')
 	<div class="content">
		 <div class="container-fluid">
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
                          ID
                        </th>
                        <th>
                          Customer Name
                        </th>
                        <th>
                          Phone
                        </th>

                        <th>
                         Email
                        </th>
                         <th>
                         Date & Time
                        </th>
                        <th>
                          Message
                        </th>
                        <th>
                          Status
                        </th>
                         <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                      @foreach($reservations as $key=>$reservation)
							<tr>
								<td>{{$key + 1}}</td>
                <td>{{$reservation->name}}</td>
								<td>{{$reservation->phone}}</td>
                <td>{{$reservation->email}}</td>
								<td>{{$reservation->dateAndTime}}</td>
								<td>{{$reservation->message}}</td>
                <td>
                  @if($reservation->status == true)
                  <span style="color:  #17e332">Confirm</span>
                  @else
                    <span style="color: #e32117">Not Confirm Yet</span>
                  @endif
                </td>
                <td>
                  @if($reservation->status == false)
                    <form id="status-form-{{$reservation->id}}" action="{{ route('reservation.status', $reservation->id) }}" method="POST" accept-charset="utf-8" style="display: none;">
                    @csrf
                   </form>

                    <button  class="btn btn-info" onclick="if(confirm('Are you sure ? You want to confirm this ?')){
                      event.preventDefault();
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