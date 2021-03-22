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
<?php   foreach($colors as $color){ ?>
            <div class="col-sm-4">
                <h3>{{$color->name}}</h3>
		        <a href="{{ route('color.product', ['id' => $color->id]) }}"><img class="products-image" src="{{$color->image}}" alt="{{$color->name}}"></a>
		        <div class="product-action">
		        	<a title="Add to cart" href="{{ route('color.addToCart', ['id' => $color->id]) }}">€ {{$color->price}}  Add to cart</a>
		        </div>
            </div>
<?      } ?>
    </div>
</div>
</body>
</html>