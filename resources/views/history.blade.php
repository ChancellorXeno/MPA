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
        <h1 class="center">Order History</h1>
        <hr>
        @foreach($orders as $order)
            <?php $totalPrice = 0; ?>
            <div class="order">
                @if (Auth::user()->username == 'admin')
                <a href="{{ route('user.deleteOrder', ['order_id' => $order['id']]) }}">Delete Order</a>
                    <h2 class="center">Order ID: {{$order->id}}</h2> 
                    <h2 class="center">Ordered by {{$order->user->username}}</h2>
                @else
                    <h2 class="center">Order ID: {{$order->id}}</h2>
                @endif
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($order->product_order as $item)
                                <a href="{{ route('product.product', ['id' => $item->product['id']]) }}">
                                    <li class="list-group-item">
                                        @if ($item->product['name'] == 'Rainbow')
                                        <span class="badge">€{{$item->product['price']}}</span>
                                        @else
                                        <span class="badge">€{{$item->product['price']}}</span>
                                        @endif
                                        {{$item->product['name']}} | {{$item['product_qty']}} Unit(s)
                                    </li>
                                </a>
                                <?php 
                                    $totalPrice = $totalPrice + $item->product['price'] * $item['product_qty'];
                                ?>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer center total_price"><strong>Total Price: €{{$totalPrice}}</strong></div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>