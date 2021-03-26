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
    <div class="row history_block">
        <div class="col-md-8 col-md-offset-2">
            <h1>Order History</h1>
            <hr>
            @foreach($orders as $order)
                <?php $totalPrice = 0; ?>
                <h2>Order ID: {{$order->id}}</h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($order->product_order as $item)
                                <li class="list-group-item">
                                    <span class="badge">€{{$item->product['price']}}</span>
                                    {{$item->product['name']}} | {{$item['product_qty']}} Unit(s)
                                </li>
                                <?php 
                                    $totalPrice = $totalPrice + $item->product['price'] * $item['product_qty'];
                                ?>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer"><strong>Total Price: €{{$totalPrice}}</strong></div>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>



