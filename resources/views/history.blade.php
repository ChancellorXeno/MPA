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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Order History</h1>
            <hr>
            @foreach($orders as $order)
                <h2>Order ID: {{$order->id}}</h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($orders as $item)
                                <li class="list-group-item">
                                    <span class="badge">€{{$item['price']}}</span>
                                    {{$item['item']['name']}} | {{$item['qty']}} Unit(s)
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer"><strong>Total Price: €{{$order->cart->totalPrice}}</strong></div>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
