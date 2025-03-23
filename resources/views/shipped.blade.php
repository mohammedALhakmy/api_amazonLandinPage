<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>00</title>
</head>
<body>
    <h1>Hi {{$user->first_name}}</h1>
    <h3>Your Order has been shipped and will arrive soon</h3>
    <p>Stripe confirmation ID: {{$order->payment_method}}</p>
    @foreach($items as $item)
        <div style="display: flex;padding: 3px">
            <img src="{{$item->image}}" width="100" alt="">
            <div style="margin-left: 10px">
                <h3>{{$item->title}}</h3>
                <p>{{$item->price}}</p>
            </div>
        </div>
    @endforeach

<p>Total price: {{$order->total_decimal}}</p>
<p>Thank you - Amazon Clone</p>
</body>
</html>
