@extends('layouts.app')

@section('main')
<div class="body mb-5">
    <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col"><h4><b>Shopping Cart</b></h4></div>
                        <div class="col align-self-center text-right text-muted">{{ count($cartItemsWithDetails) }} items</div>
                    </div>
                </div>
                
                @foreach($cartItemsWithDetails as $item)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="{{ asset('assets/images/' . $item['image']) }}"></div>
                            <div class="col">
                                <div class="row text-muted">{{ $item['category'] }}</div>
                                <div class="row">{{ $item['name'] }}</div>
                            </div>
                            <div class="col">
                                <a href="{{ route('cart.decrease', $item['id']) }}">-</a>
                                    <span href="#" class="border">{{ $item['quantity'] }}</span>
                                <a href="{{ route('cart.increase', $item['id']) }}">+</a>
                            </div>
                            <div class="col">$ {{ number_format($item['price'], 2) }} 
                                <a href="{{ route('cart.remove', $item['id']) }}" class="close">&#10005;</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="back-to-shop"><a href="{{ url('') }}">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
            </div>

            <div class="col-md-4 summary">
                <div><h5><b>Summary</b></h5></div>
                <hr>
                <div class="row">
                    <div class="col" style="padding-left:0;">ITEMS {{ count($cartItemsWithDetails) }}</div>
                    <div class="col text-right">$ {{ number_format($totalPrice, 2) }}</div>
                </div>
                <form method="post" action="{{ route('cart.checkout') }}">
                    @csrf 
                    <p>SHIPPING</p>
                    <select><option class="text-muted">Standard-Delivery- $5.00</option></select>
                    <p>GIVE CODE</p>
                    <input id="code" placeholder="Enter your code">
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">$ {{ number_format($totalPrice + 5, 2) }}</div>
                    </div>
                    <button class="btn">CHECKOUT</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
