<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@include ('header')

<div class="container">
    <div class="row">
<?php   foreach($color as $bro){ ?>
            <div class="col-sm-4">
                <h3>{{ $bro->name }}</h3>
		        <img class="product-image" src="{{ $bro->image }}" alt="Red">
		        <div class="product-action">
		        	<a title="Add to cart" href="#">[€ {{ $bro->price }}]  Add to cart</a>
		        </div>
            </div>
<?      } ?>
    </div>
</div>
</body>
</html>