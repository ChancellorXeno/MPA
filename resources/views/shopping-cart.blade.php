<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body class="js">
@include('header')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="home">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="card">Cart</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Shopping Summery -->
				<table class="table shopping-summery">
					<thead>
						<tr class="main-hading">
							<th>PRODUCT</th>
							<th>NAME</th>
							<th class="text-center">UNIT PRICE</th>
							<th class="text-center">QUANTITY</th>
							<th class="text-center">TOTAL</th> 
							<th class="text-center"><i class="ti-trash remove-icon"></i></th>
						</tr>
					</thead>
					<tbody>
<?php					if($products != null){
							foreach($products as $product){ ?>
								<tr>
									<td class="image" data-title="No"><img src="{{$product['item']['image']}}" alt="#"></td>
									<td class="product-des" data-title="Description">
										<p class="product-name"><a href="#">{{$product['item']['name']}}</a></p>
										<p class="product-des">{{$product['item']['category']}} Collection</p>
									</td>
									<td class="price" data-title="Price"><span>€{{$product['item']['price']}}</span></td>
									<td class="qty" data-title="Qty">
									<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<a href="{{ route('product.decrease', ['id' => $product['item']['id']]) }}" type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</a>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="100" value="{{$product['qty']}}">
											<div class="button plus">
												<a href="{{ route('product.addToCart', ['id' => $product['item']['id']]) }}" type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</a>
											</div>
										</div>
										<!--/ End Input Order -->
									</td>
									<td class="total-amount" data-title="Total"><span>€{{$product['price']}}</span></td>
									<td class="action" data-title="Remove"><a href="{{ route('product.destroy', ['id' => $product['item']['id']]) }}"><i class="ti-trash remove-icon"></i></a></td>
								</tr>
<?php 						} 
						}else{
							echo('The cart is currently empty');
						} ?>
					</tbody>
				</table>
				<!--/ End Shopping Summery -->
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<!-- Total Amount -->
				<div class="total-amount">
					<div class="row">
						<div class="col-lg-8 col-md-5 col-12">
							<div class="left">
								<div class="coupon">
									<form action="#" target="_blank">
										<input name="Coupon" placeholder="Enter Your Coupon">
										<button class="btn">Apply</button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-7 col-12">
							<div class="right">
								<ul>
									<li>Cart Subtotal<span> €{{$totalPrice}}</span></li>
								</ul>
								<div class="button5">
								@if(Auth::check()) 
									<a href="{{ route('cart.checkout') }}" class="btn">Checkout</a>
								@else
									<a href="login" class="btn">Checkout</a>
								@endif
									<a href="home" class="btn">Continue shopping</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/ End Total Amount -->
			</div>
		</div>
	</div>
</div>
<!--/ End Shopping Cart -->
</body>
</html>