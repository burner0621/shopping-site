@extends('layouts.app')
@section('title', 'Checkout')
@section('content')

<!-- start page content -->
<div class="container">
    <div class="row">
        <div class="col-md-5 offset-md-1">
            <hr>
            <h1 class="lead" style="font-size: 1.5em">Checkout</h1>
            <hr>
            <h3 class="lead" style="font-size: 1.2em; margin-bottom: 1.6em;">Billing details</h3>
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf()
                <div class="form-group">
                    <label for="email" class="light-text">Email Address</label>
                    @guest
                        <input type="text" name="email" class="form-control my-input" required>
                    @else
                        <input type="text" name="email" class="form-control my-input" value="{{ auth()->user()->email }}" readonly required>
                    @endguest
                </div>
                <div class="form-group">
                    <label for="name" class="light-text">Name</label>
                    <input type="text" name="name" class="form-control my-input" required>
                </div>
                <div class="form-group">
                    <label for="address" class="light-text">Address</label>
                    <input type="text" name="address" class="form-control my-input" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city" class="light-text">City</label>
                            <input type="text" name="city" class="form-control my-input" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="province" class="light-text">Province</label>
                        <input type="text" name="province" class="form-control my-input" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="postal_code" class="light-text">Postal Code</label>
                            <input type="text" name="postal_code" class="form-control my-input" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="light-text">Phone</label>
                        <input type="text" name="phone" class="form-control my-input" required>
                    </div>
                </div>
                <h2 style="margin-top:1em; margin-bottom:1em;">Payment details</h2>
                <div class="form-group">
                    <label for="name_on_card" class="light-text">Name on card</label>
                    <input type="text" name="name_on_card" class="form-control my-input" required>
                </div>
                <div class="form-group">
                    <label for="credit_card" class="light-text">Credit Card</label>
                    <input type="text" name="credit_card" class="form-control my-input" required>
                </div>
                <button type="submit" class="btn btn-success custom-border-success btn-block">Complete Order</button>
            </form>
        </div>
        <div class="col-md-5 offset-md-1">
            <hr>
            <h3>Your Order</h3>
            <hr>
            <table class="table table-borderless table-responsive">
                <tbody>
                    @foreach (Cart::instance('default')->content() as $item)
                        <tr>
                            <td>
                                <a href="{{ route('shop.show', $item->model->slug) }}">
                                    <img src="{{ productImage($item->model->image) }}" height="100px" width="100px"></td>
                                </a>
                            <td>
                            <td>
                                <a href="{{ route('shop.show', $item->model->slug) }}" class="text-decoration-none">
                                    <h3 class="lead light-text">{{ $item->model->name }}</h3>
                                    <p class="light-text">{{ $item->model->details }}</p>
                                    <h3 class="light-text lead text-small">${{ $item->model->price }}</h3>
                                </a>
                            </td>
                            <td>
                                <span class="quantity-square">{{ $item->qty }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <span class="light-text">Subtotal</span>
                </div>
                <div class="col-md-4 offset-md-4">
                    <span class="light-text" style="display: inline-block">${{ format($subtotal) }}</span>
                </div>
            </div>
            @if (session()->has('coupon'))
                <div class="row">
                    <div class="col-md-4">
                        <span class="light-text inline">Discount({{ session('coupon')['code'] }})</span>
                    </div>
                    <div class="col-md-4">
                        <form class="form-inline" action="{{ route('coupon.destroy') }}" method="POST" style="display:inline">
                            @csrf()
                            @method('DELETE')
                            <button class="inline-form-button" type="submit">Remove</button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <span class="light-text" style="display: inline">- ${{ format($discount) }}</span>
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col-md-4">
                        <span class="light-text">New Subtotal</span>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <span class="light-text" style="display: inline-block">${{ format($newSubtotal) }}</span>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-4">
                    <span class="light-text">Tax(21%)</span>
                </div>
                <div class="col-md-4 offset-md-4">
                    <span class="light-text" style="display: inline-block">${{ format($tax) }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <span>Total</span>
                </div>
                <div class="col-md-4 offset-md-4">
                    <span class="text-right" style="display: inline-block">${{ format($total) }}</span>
                </div>
            </div>
            <hr>
            @if (!session()->has('coupon'))
                <form action="{{ route('coupon.store') }}" method="POST">
                    @csrf()
                    <label for="coupon_code">Have a coupon ?</label>
                    <input type="text" name="coupon_code" id="coupon" class="form-control my-input" placeholder="123456" required>
                    <button type="submit" class="btn btn-success custom-border-success btn-block">Apply Coupon</button>
                </form>
            @endif
        </div>
    </div>
</div>
<!-- end page content -->

@endsection