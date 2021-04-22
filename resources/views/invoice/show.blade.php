@extends('layouts.inc')
@section('content')
@if (session('success'))
<script type="text/javascript">
    alert('Đặt hàng thành công. Vui lòng chờ để Arara xác nhận đơn hàng !');
</script>
@endif
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Invoices</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix text-center">
        @if(!empty($invoices))
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <form action="" >
                
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã hóa đơn</td>
                            <td>Tổng thành tiền</td>
                            <td>Trạng thái</td>
                            <td>Đặt hàng</td>
                            <td>Giao hàng</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $item)
                        <tr>
                            <td><a href="{{route('invoices.show_detail',$item->id)}}"><b>{{$item->id}}</b></a></td>
                            <td>{{number_format($item->total_price,0,',','.')}}</td>
                            <td>
                                @if($item->status==0)Chờ xác nhận 
                                @elseif($item->status==1)Đã xác nhận
                                @elseif($item->status==2)Đã giao hàng
                                @else
                                @endif
                            </td>
                            <td>{{$item->created_dateTime}}</td>
                            <td>{{$item->completed_time}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </form>
            </div>
        </div>
        <div class="section" id="action-cart-wp" >
            <div class="section-detail">
                <a href="{{url('/')}}" title=""  id="buy-cart">Mua tiếp</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection