@extends('layouts.inc')
@section('content')
<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <form method="POST" action="{{route('cart.checkout')}}" name="form-checkout">
        @csrf
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên</label>
                            <input type="text" name="fullname" id="fullname" @if(Auth::check()) value="{{Auth::user()->name}}" @endif>
                            @error('fullname')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" name="phone" id="phone" @if(Auth::check() && Auth::user()->tel) value="{{Auth::user()->tel}}" @endif>
                            @error('phone')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row" id="customer_address">
                        <div class="form-col">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address">
                            @error('address')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row" id="note">
                        <div class="form-col">
                            <label for="notes">Ghi chú</label>
                            <textarea name="note"></textarea>
                        </div>
                    </div>
            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <div class="section-detail">
                @if(Cart::count()!=0)
                <table class="shop-table">
                    <thead>
                        <tr>
                            <td>Sản phẩm</td>
                            <td>Tổng</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::content() as $item)
                        <tr class="cart-item">
                        <td class="product-name">{{$item->name}}<strong class="product-quantity">x {{$item->qty}}</strong></td>
                        <td class="product-total">{{number_format($item->subtotal,0,',','.')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="order-total">
                            <td>Tổng đơn hàng:</td>
                            <td><strong class="total-price">{{Cart::total(0,',','.')}}</strong></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="place-order-wp clearfix">
                    <input type="submit" id="order-now" value="Đặt hàng">
                </div>
                @else
                <p style="color: white">Không tồn tại sản phẩm nào trong giỏ hàng</p>
                @endif
            </div>
        </div>
    </form>
    </div>
</div>
@endsection