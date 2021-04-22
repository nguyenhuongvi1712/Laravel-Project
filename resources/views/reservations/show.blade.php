@extends('layouts.inc')
@section('content')
@if (session('success'))
<script type="text/javascript">
    alert('Đặt bàn thành công.Xin chờ để admin xác nhận !');
</script>
@endif
<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Đặt bàn</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <form method="POST" action="{{route('reservation.store')}}" name="form-checkout">
            @csrf
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên</label>
                            <input type="text" name="fullname" id="fullname">
                            @error('fullname')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" name="phone" id="phone">
                            @error('phone')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="numofCustomer">Số khách</label>
                            <input type="text" name="numofCustomer" id="numofCustomer">
                            @error('numofCustomer')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-col fl-right">
                            <label for="date">Ngày</label>
                            <input type="date" name="date" id="date">
                            @error('date')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="hour">Giờ</label>
                            <select name="hour" id="hour" >
                                <option value="">Giờ</option>
                                <option value="10">10 giờ</option>
                                <option value="11">11 giờ</option>
                                <option value="12">12 giờ</option>
                                <option value="13">13 giờ</option>
                                <option value="14">14 giờ</option>
                                <option value="15">15 giờ</option>
                                <option value="16">16 giờ</option>
                                <option value="17">17 giờ</option>
                                <option value="18">18 giờ</option>
                                <option value="19">19 giờ</option>
                                <option value="20">20 giờ</option>
                                <option value="21">21 giờ</option>
                                <option value="22">22 giờ</option>   
                            </select>
                            @error('hour')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-col fl-right">
                            <label for="minute">Giờ</label>
                            <select name="minute" id="minute" >
                                <option value="">Phút</option>
                                <option value="0">00</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="45">45</option>  
                            </select>
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
                <h1 class="section-title">Ưu đãi</h1>
            </div>
            <div class="section-detail">
                <p>Đăng ký tài khoản khách hàng ARATA để có voucher giảm 10% ! <i class="far fa-address-card"></i> </p>
                <p>Tặng voucher giảm giá 5% trong tuần sinh nhật !! <i class="fas fa-birthday-cake"></i></i></p>
                <p>Ưu đãi tặng món tráng miệng cho nhóm khách 10 người có đặt bàn trước ! <i class="fas fa-gifts"></i></p>
                <p>Ưu đãi cho chủ thẻ Lotte Mart !! <i class="fab fa-git-square"></i></p>
                <p>Đăng ký tài khoản khách hàng ARATA ngay hôm nay để nhận được nhiều ưu đãi hơn !!! <i class="fas fa-gift"></i></p>
                <div class="place-order-wp clearfix">
                    <input type="submit" id="order-now" value="Đặt hàng">
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection