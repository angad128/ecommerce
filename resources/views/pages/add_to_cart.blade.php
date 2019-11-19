@extends('layout')

@section('breadcrumbs')
Add to Cart
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
			<div class="table-responsive cart_info">
				@if(\Cart::isEmpty())
                    <p class="alert alert-warning">Your shopping cart is empty.</p>
                @else
				<table class="table table-hover table-striped table-responsive">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Description</td>
							<td class="price">Price (NRS)</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total (NRS)</td>
							<td class="action">Action</td>
						</tr>
					</thead>
					<tbody>
						@foreach($cart_contents as $result)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('images/product/image'.$result->image)}}" width="80px" height="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$result->name}}</a></h4>
								<p>P ID: {{$result->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{$result->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{url('cart/update')}}" method="post">
										@csrf
										<!-- <a class="cart_quantity_up" href=""> + </a> -->
										<input class="cart_quantity_input" type="text" name="quantity" value="{{$result->quantity}}" autocomplete="off" size="2">
										<input class="cart_quantity_input" type="hidden" name="id" value="{{$result->id}}">
										<!-- <a class="cart_quantity_down" href=""> - </a> -->
										<input type="submit" name="update" value="update" class="btn btn-sm btn-default">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$result->quantity*$result->price}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ route('checkout.cart.remove', $result->id) }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@endif
			</div>
		</div>
		
	</section> <!--/#cart_items-->

	<div class="total_area">
		<ul>
			<li>Cart Sub Total <span>NRS {{Cart::getSubTotal()}}</span></li>
			<li>VAT <span>{{Cart::getCondition('VAT 12.5%')}}</span></li>
			<li>Shipping Cost <span>Free</span></li>
			<li>Total <span>{{Cart::getTotal()}}</span></li>
		</ul>
		<a class="btn btn-default update" href="{{ route('checkout.cart.clear') }}">Clear</a>
		@if(Session::get('customer_id'))
		<a class="btn btn-default check_out" href="{{url('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
		@else
		<a class="btn btn-default check_out" href="{{url('/login-check')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
		@endif
	</div>
@endsection



						