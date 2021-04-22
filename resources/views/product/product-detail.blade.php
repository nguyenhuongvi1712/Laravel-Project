@extends('layouts.inc')
@section('content')
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="/" title="">ホームページ</a>
                    </li>
                    <li>
                        <a href="" title="">{{$category_name->name}}</a>
                    </li>
                    <li>
                        <a href="" title="">{{$product->name}}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <form action="{{route('cart.add_product',$product->id)}}" method="POST">
                    @csrf
                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img src="{{asset($product->image)}}"/>
                        </a>
                    </div>
                    <div class="thumb-respon-wp fl-left">
                        <img src="{{asset($product->image)}}" alt="">
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name">{{$product->name}}</h3>
                        <h4 class="product-romajiname">{{$product->romaji_name}}</h4>
                        <div class="desc">
                            <p>
                                ディナーのみのデリバリーオーダーとさせて頂きます。 
                                ご注文受付時間：毎日16:00~20:00 　配送時間17:00〜　
                                表示料金は税10％込となります。
                                支払方法:現金のみ（ドライバーへ直接お支払いください）。
                                混雑時にはお届けが遅くなる、 またはお断りさせて頂く場合があります。
                            </p>
                        </div>
                        <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <span class="status">Còn hàng</span>
                        </div>
                        <p class="price">{{$product->price}}</p>
                        <div id="num-order-wp">
                            <a title="" id="minus"><i class="fa fa-minus"></i></a>
                            <input type="text" name="quantity" value="1" min="1" id="num-order">
                            <a title="" id="plus"><i class="fa fa-plus"></i></a>
                            <input type="submit" value="確定" class="add-cart">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                    <p>Máy tính xách tay HP Probook 440 G2 là dòng máy tính xách tay thích hợp cho doanh nghiệp và những người làm văn phòng. Do đó, ngoài cấu hình tốt, thiết kế bền bỉ, máy tính xách tay HP Probook 440 G2 còn có khả năng bảo mật toàn diện giúp bạn luôn yên tâm về dữ liệu của mình.</p>
                    <p>Máy tính xách tay HP Probook 440 G2 là dòng máy tính xách tay thích hợp cho doanh nghiệp và những người làm văn phòng. Do đó, ngoài cấu hình tốt, thiết kế bền bỉ, máy tính xách tay HP Probook 440 G2 còn có khả năng bảo mật toàn diện giúp bạn luôn yên tâm về dữ liệu của mình.</p>
                    <p>Máy tính xách tay HP Probook 440 G2 là dòng máy tính xách tay thích hợp cho doanh nghiệp và những người làm văn phòng. Do đó, ngoài cấu hình tốt, thiết kế bền bỉ, máy tính xách tay HP Probook 440 G2 còn có khả năng bảo mật toàn diện giúp bạn luôn yên tâm về dữ liệu của mình.</p>
                    <p>Máy tính xách tay HP Probook 440 G2 là dòng máy tính xách tay thích hợp cho doanh nghiệp và những người làm văn phòng. Do đó, ngoài cấu hình tốt, thiết kế bền bỉ, máy tính xách tay HP Probook 440 G2 còn có khả năng bảo mật toàn diện giúp bạn luôn yên tâm về dữ liệu của mình.</p>
                </div>
            </div>
           
            @if(!empty($products))
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach($products as $item)
                        <li>
                            <a href="{{url('products/'.$item->id)}}" title="" class="thumb">
                                <img src="{{asset($item->image)}}">
                            </a>
                            <a href="" title="" class="product-name">{{$item->name}}</a>
                            <div class="price">
                                <span class="new">{{$item->price}}</span>
                            </div>
                            <div class="action clearfix text-center">
                                <a href="{{route('cart.add',$item->id)}}" title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
        <div class="sidebar fl-left">
            {{-- <x-category-product> --}}
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
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="{{asset('storage/photos/banners/banner-5.jpg')}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection