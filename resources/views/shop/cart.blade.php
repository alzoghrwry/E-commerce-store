@extends('layouts.app')

@section('title', 'Cart - RedStore')

@section('content')
<div class="small-container cart-page">
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>

        @foreach ($cartItems as $item)
        <tr>
            <td>
                <div class="cart-info">
                    <img src="images/{{ $item['image'] }}">
                    <div>
                        <p>{{ $item['name'] }}</p>
                        <small>Price: ${{ $item['price'] }}</small>
                        <br>
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" value="{{ $item['quantity'] }}"></td>
            <td>${{ $item['price'] * $item['quantity'] }}</td>
        </tr>
        @endforeach
    </table>

    <div class="total-price">
        <table>
            <tr>
                <td>Subtotal</td>
                <td>${{ array_sum(array_map(fn($i)=>$i['price']*$i['quantity'],$cartItems)) }}</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>$35.00</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>${{ array_sum(array_map(fn($i)=>$i['price']*$i['quantity'],$cartItems)) + 35 }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Cart - RedStore')

@section('content')
<div class="small-container cart-page">
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        @for($i = 1; $i <= 3; $i++)
        <tr>
            <td>
                <div class="cart-info">
                    <img src="{{ asset("images/buy-$i.jpg") }}">
                    <div>
                        <p>Red Printed T-Shirt</p>
                        <small>Price: $50.00</small>
                        <br>
                        <a href="#">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>$50.00</td>
        </tr>
        @endfor
    </table>
    <div class="total-price">
        <table>
            <tr>
                <td>Subtotal</td>
                <td>$200.00</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>$35.00</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>$230.00</td>
            </tr>
        </table>
    </div>
</div>
@endsection
