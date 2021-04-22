@extends('layouts.inc')
@section('content')
@if (session('success'))
<script type="text/javascript">
    alert('Đặt hàng thành công. Vui lòng chờ để Arara xác nhận đơn hàng !');
</script>
@endif
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <div class="item">
                        <img src="{{asset('storage/photos/sliders/slider-03.jpg')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{asset('storage/photos/sliders/slider-02.jpg')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{asset('storage/photos/sliders/slider-01.png')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="{{asset('storage/photos/layout-system/icon-1.png')}}">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{asset('storage/photos/layout-system/icon-2.png')}}">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{asset('storage/photos/layout-system/icon-3.png')}}">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{asset('storage/photos/layout-system/icon-4.png')}}">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{asset('storage/photos/layout-system/icon-5.png')}}">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                       @foreach($bsl as $item)
                        <li>
                            <a href="{{route('product.show',$item->id)}}" title="" class="thumb">
                                <img src="{{asset($item->image)}}">
                            </a>
                            <a href="{{route('product.show',$item->id)}}" title="" class="product-name">{{$item->name}}</a>
                            <div class="price">
                                <span class="new">$item->price</span>
                            </div>
                            <div class="action text-center">
                                <a  num-order-id="{{$item->id}}" title="Order" class="add-cart">Order</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @foreach ($products as $items)
            @if(!empty($items))
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">{{$items['name']}}</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        @foreach ($items['list'] as $item)
                        <li>
                            <a href="{{url('products/'.$item->id)}}" title="" class="thumb">
                                <img src="{{asset($item->image)}}">
                            </a>
                            <a href="?page=detail_product" title="" class="product-name">{{Str::of($item->name)->limit(29)}}</a>
                            <p class="product-romaji-name">{{$item->romaji_name}}</p>
                            <div class="price">
                                <span class="new">{{$item->price}}</span>
                            </div>
                            <div class="action text-center">
                                <a  num-order-id="{{$item->id}}" title="Order" class="add-cart">Order</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>  
                </div>
                <div class="text-center mt-3">
                    <a href="Menu/{{Str::of($items['name'])->replace(' ','-')}}" class="see-more">See more</a> 
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Menu</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">
                        <li>
                            <a href="{{url('Menu/Appetizer')}}" title="">Appetizer</a>
                        </li>
                        <li>
                            <a href="#" title="">Main course</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{url('Menu/Sashimi')}}" title="">Sashimi</a>
                                </li>
                                <li>
                                    <a href="{{url('Menu/Udon-&-Ramen')}}" title="">Udon & Ramen</a>
                                </li>
                                <li>
                                    <a href="#" title="">Sushi</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{url('Menu/Special-Roll')}}" title="">Special Roll</a>
                                        </li>
                                        <li>
                                            <a href="{{url('Menu/Gunkan-Sushi')}}" title="">Gunkan Sushi</a>
                                        </li>
                                        <li>
                                            <a href="{{url('Menu/Temaki-Sushi')}}" title="">Temaki Sushi</a>
                                        </li>
                                        <li>
                                            <a href="{{url('Menu/Makimono')}}" title="">Makimono</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{url('Menu/Bento')}}" title="">Bento</a>
                                </li>
                                <li>
                                    <a href="{{url('Menu/Hot-Food')}}" title="">Hot Food</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" title="">Drink & Dessert</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{url('Menu/Drink')}}" title="">Drink</a>
                                </li>
                                <li>
                                    <a href="{{url('Menu/Dessert')}}" title="">Dessert</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Promotions</h3>
                </div>
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="{{asset('storage/photos/banners/banner-5.jpg')}}" alt="">
                    </a>
                </div>
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="{{asset('storage/photos/banners/banner-4.jpeg')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="{{asset('storage/photos/banners/banner-4.jpg')}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection