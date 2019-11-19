@extends('pages.index')

@section('contents')
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">Products By Category</h2>
		@foreach($product_by_category as $result)
		<div class="col-sm-4">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<img src="{{URL::to('images/product/image/'.$result->product_image)}}" width="268px" height="236px" alt="" />
						<h2>NRS {{$result->product_price}}</h2>
						<p>{{$result->product_name}}</p>
						<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					</div>
					<div class="product-overlay">
						<div class="overlay-content">
							<h2>NRS {{$result->product_price}}</h2>
							<p>{{$result->product_name}}</p>
							<a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i></a>
						</div>
					</div>
				</div>
				<div class="choose">
					<ul class="nav nav-pills nav-justified">
						<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
						<li><a href="{{URL::to('/product/details/'.$result->product_id)}}"><i class="fa fa-plus-square"></i>Product Details</a></li>
					</ul>
				</div>
			</div>
		</div>
		@endforeach
	</div><!--features_items-->

@endsection