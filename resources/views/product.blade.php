<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body class="js">
@include('header')

    <tr>
    	<td class="image" data-title="No"><img class="product-image" src="{{$product[0]->image}}" alt="#"></td>
    	<td class="product-des" data-title="Description">
    		<p class="product-name"><a href="#">Name: {{$product[0]->name}}</a></p>
    		<p class="product-des">Category: {{$product[0]->category}} Collection</p>
    	</td>
    	<td class="price" data-title="Price"><span>Price: €{{$product[0]->price}}</span></td>
        <div class="product-action">
			<a title="Add to cart" href="{{ route('product.addToCart', ['id' => $product[0]->id]) }}">€ {{$product[0]->price}}  Add to cart</a>
		</div>
    </tr>

</body>