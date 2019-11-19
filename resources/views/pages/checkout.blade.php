@extends('layout')

@section('title')
Checkout
@endsection

@section('content')
	<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<p>Bill To</p>
				<div class="login-form">
					<form method="post" action="{{url('save/shipping_details')}}">
						@csrf
						<input type="text" name="shipping_email" placeholder="Email*">
						<input type="text" name="shipping_fname" placeholder="First Name *">
						<input type="text" name="shipping_lname" placeholder="Last Name *">
						<input type="text" name="shipping_address" placeholder="Address *">
						<input type="text" name="phone" placeholder="Phone Number *">
						<select name="city">
							<option>-- City --</option>
							<option>Kathmandu</option>
							<option>Lalitpur</option>
							<option>Bhaktapur</option>
						</select>
						<button type="submit" class="btn btn-defult check_out">Done</button>
					</form>
				</div>	
			</div>

			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>
		</div>
	</section>

			

@endsection