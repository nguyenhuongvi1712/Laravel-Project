@extends('layouts.inc')
@section('content')
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">ホームページ</a>
                    </li>
                    <li>
                        <a href="" title="">{{$category_name}}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left">{{$category_name}}</h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị {{count($products)}} trên {{$count}} sản phẩm</p>
                    </div>
                </div>
                @if(!empty($products))
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        @foreach($products as $item)
                        <li>
                            <a href="{{url('products/'.$item->id)}}" title="" class="thumb">
                                <img src="{{asset($item->image)}}">
                            </a>
                            <a href="{{url('products/'.$item->id)}}" title="" class="product-name">{{Str::of($item->name)->limit(29)}}</a>
                            <div class="price">
                                <span class="new">{{$item->price}}</span>
                            </div>
                            <div class="action clearfix">
                                <a num-order-id="{{$item->id}}" title="Thêm giỏ hàng" class="add-cart">Add cart</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    {{-- {{$products->links()}} --}}
                </div>
                @endif
                
            </div>
            <div class="section" id="paging-wp">
                {{$products->links()}}
            </div>
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