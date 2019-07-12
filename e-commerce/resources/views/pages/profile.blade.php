@extends('layout')



@section('content')
<div id="ProfilePage">
    

    <div id="Info">
        <p>
            <strong>Name:</strong>
            <span>{{$customer_info->customer_name}}</span>
        </p>
        <p>
            <strong>Email:</strong>
            <span>{{$customer_info->customer_email}}</span>
        </p>
        <p>
            <strong>Phone Number:</strong>
            <span>{{$customer_info->customer_phone}}</span>
        </p>
       
    </div>

    <!-- Needed because other elements inside ProfilePage have floats -->
    <div style="clear:both"></div>
</div>
@endsection