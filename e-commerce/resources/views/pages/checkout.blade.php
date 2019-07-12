@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
				
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Shipping Details</p>
							<div class="form-one">
								<form method="post" action="{{url('/save_shipping_details')}}">
									{{csrf_field()}}
								
									<input type="text" placeholder="Email*" name="shipping_email" required="">
									
									<input type="text" placeholder="First Name *" name="first_name"  required="">
									
									<input type="text" placeholder="Last Name *" name="last_name"  required="">
									<input type="text" placeholder="Address*" name="shipping_address"  required="">
									<input type="text" placeholder="Mobile Number*" name="shipping_phone"  required="">
									<input type="text" placeholder="City*" name="shipping_city"  required="">
									<button type="submit" class="btn btn-info">Subit</button>
								</form>
							</div>
							
						</div>
					</div>
								
				</div>
			</div>
		
			
		</div>
	</section> <!--/#cart_items-->

@endsection