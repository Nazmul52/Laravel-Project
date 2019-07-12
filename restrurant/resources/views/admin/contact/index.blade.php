@extends('layouts.app')


@section('title', 'Contact Information List')


@section('content')
 	<div class="content">
		 <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              @include('layouts.partial.msg')

        <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Contact Information</h4>
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
                         Email
                        </th>

                        <th>
                          Subject
                        </th>
                        <th>
                          Message
                        </th>

                         <th>
                          Send At
                        </th>
                         <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                      @foreach($contacts as $key=>$contact)
							<tr>
								<td>{{$key + 1}}</td>
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}}</td>
								<td>{{$contact->subject}}</td>
                <td>{{$contact->message}}</td>
								<td>{{$contact->created_at}}</td>
                <td>
                 {{--  @if($contact->status == true)
                  <span style="color:  #17e332">Confirm</span>
                  @else
                    <span style="color: #e32117">Not Confirm Yet</span>
                  @endif
                </td>
                <td>
                  @if($contact->status == false)
                    <form id="status-form-{{$contact->id}}" action="{{ route('contact.status', $contact->id) }}" method="POST" accept-charset="utf-8" style="display: none;">
                    @csrf
  </form>

                    <button  class="btn btn-info" onclick="if(confirm('Are you sure ? You want to confirm this ?')){
                      event.preventDefault();
                      document.getElementById('status-form-{{$contact->id}}').submit();
                    }else{
                      event.preventDefault();

                    }">Confirm</button>

                    @endif --}}
                    <form id="delete-form-{{$contact->id}}" action="{{ route('contact.destroy', $contact->id) }}" method="POST" accept-charset="utf-8" style="display: none;">
                                      @csrf
                                      @method('DELETE')
                    </form>

                                      <button  class="btn btn-info" onclick="if(confirm('Are you sure ? You want to delete this ?')){
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$contact->id}}').submit();
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