@extends('layouts.inc')
@section('content')
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix text-center">
        @if(Cart::count()!=0)
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <form action="" >
                
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>
                                <a href="{{route('product.show',$item->id)}}" title="" class="thumb">
                                    <img src="{{asset($item->options['image'])}}" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="{{route('product.show',$item->id)}}" title="" class="name-product">{{$item->name}}</a>
                            </td>
                            <td>{{number_format($item->price,0,',','.')}}</td>
                            <td>
                                <input type="number" name="num-order" value="{{$item->qty}}" min="1" class="num-order" num-order-id = {{$item->id}} row-id = {{$item->rowId}} >
                            </td>
                            <td id="sub_total{{$item->id}}">{{number_format($item->subtotal,0,',','.')}}</td>
                            <td>
                                <a href="{{route('cart.remove',$item->rowId)}}" title="" class="del-product"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span>{{Cart::total(0,',','.')}}</span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <a href="{{route('invoices.show')}}" title="" id="update-cart">Lịch sử đơn hàng</a>
                                        <a href="{{route('cart.show_checkout')}}" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                </form>
            </div>
        </div>
        <div class="section" id="action-cart-wp" >
            <div class="section-detail">
                {{-- <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p> --}}
                <a href="{{url('/')}}" title=""  class="btn btn-info p-2 mr-2">Mua tiếp</a>
                <a href="{{route('cart.destroy')}}" title=""  class="btn btn-danger p-2">Xóa giỏ hàng</a>
            </div>
        </div>
        @else
        <p>Không có sản phẩm nào trong giỏ hàng</p>
        <a href="{{route('invoices.show')}}" title="" id="update-cart">Lịch sử đơn hàng</a>
        <a href="{{url('/')}}" title=""  id="buy-cart">Mua tiếp</a>
        @endif
    </div>
</div>
@endsection