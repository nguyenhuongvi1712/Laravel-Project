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
                        <a href="" title="">Invoice</a>
                    </li>
                    <li>
                        <a href="" title="">{{$invoice->id}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix text-center">
        <div class="section" id="info-invoice-wp">
            <h1 class = "text-center"><i class="fas fa-file-alt"></i> Thông tin chi tiết đơn hàng</h1>
            <p><i class="fas fa-user-alt"></i><b>Tên khách hàng : </b>{{$invoice->customer_name}}</p>
            <p><i class="fas fa-phone-square-alt"></i><b>Số điện thoại nhận hàng : </b>{{$invoice->tel}}</p>
            <p><i class="fas fa-map-marker-alt"></i><b>Địa chỉ nhận hàng : </b>{{$invoice->address}}</p>
            <i class="fas fa-sticky-note"></i><b>Notes : </b>
            <p></p>
            <p><i class="fas fa-clock"></i><b>Thời gian đặt hàng</b>{{$invoice->created_time}}</p>
            <p>
                <i class="fas fa-bell"></i><b>Trạng thái : </b>
                @if($invoice->status==0)Chờ xác nhận 
                @elseif($invoice->status==1)Đã xác nhận
                @elseif($invoice->status==2)Đã giao hàng
                @else
                @endif
            </p>
            @if(!empty($invoice->completed_time))
            <p><i class="fas fa-shipping-fast"></i><b>Thời gian giao hàng : </b>{{$invoice->completed_time}}</p>
            @endif

        </div>
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
                            <td>Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoice_details as $item)
                        <tr>
                            <td>{{$item->product_id}}</td>
                            <td>
                                <a href="{{route('product.show',$item->product_id)}}" title="{{$item->name}}" class="thumb">
                                    <img src="{{asset($item->image)}}" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="{{route('product.show',$item->product_id)}}" title="" class="name-product">{{$item->name}}</a>
                            </td>
                            <td>{{number_format($item->price,0,',','.')}}</td>
                            <td>
                                <input type="number" name="num-order" value="{{$item->quantity}}" min="1" class="num-order" disabled="disabled">
                            </td>
                            <td>{{number_format($item->price * $item->quantity,0,',','.')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span>{{number_format($invoice->total_price,0,',','.')}}</span></p>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                </form>
            </div>
        </div>
        <a href="{{route('invoices.show')}}" title=""  class="btn btn-info p-2 mr-2">Trở về danh sách đơn hàng</a>
       
    </div>
</div>
@endsection