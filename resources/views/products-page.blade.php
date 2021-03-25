<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@include('header')

<div class="container">
    <div class="row">
<?php   foreach($products as $product){ ?>
            <div class="col-sm-4">
                <h3>{{$product->name}}</h3>
		        <a href="{{ route('product.product', ['id' => $product->id]) }}"><img class="products-image" src="{{$product->image}}" alt="{{$product->name}}"></a>
		        <div class="product-action">
		        	<a title="Add to cart" href="{{ route('product.addToCart', ['id' => $product->id]) }}">€ {{$product->price}}  Add to cart</a>
		        </div>
            </div>
<?      } ?>
    </div>
</div>
</body>
</html>