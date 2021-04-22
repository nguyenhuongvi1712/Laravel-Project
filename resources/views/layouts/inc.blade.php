<!DOCTYPE html>
<html>
    <head>
        <title>ARACA</title>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{asset('css/bootstrap/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/bootstrap/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/reset.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/carousel/owl.theme.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/fontawesome-free-5.15.3-web/css/all.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css"/>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        
        <script src="{{asset('js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/elevatezoom-master/jquery.elevatezoom.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/bootstrap/bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/carousel/owl.carousel.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/main.js')}}" type="text/javascript"></script>

        <script src="https://code.jquery.com/ui/1.8.5/jquery-ui.min.js" integrity="sha256-fOse6WapxTrUSJOJICXXYwHRJOPa6C1OUQXi7C9Ddy8=" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <a href="/" title="" id="payment-link" class="fl-left">Arata　−　日本の料理を楽しもう！</a>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="/" title="">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Menu</a>
                                    </li>
                                    <li>
                                        <a href="?page=blog" title="">Blog</a>
                                    </li>
                                    <li>
                                        <a href="{{route('reservation.show')}}" title="">Đặt bàn</a>
                                    </li>
                                    <li>
                                        <a href="?page=detail_blog" title="">Liên hệ</a>
                                    </li>
                                    <li>
                                        @if(Auth::check())
                            
                                        <div class="sm:flex sm:items-center sm:ml-6">
                                            <!-- Teams Dropdown -->
                                            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                                <div class="ml-3 relative">
                                                    <x-jet-dropdown align="right" width="60">
                                                        <x-slot name="trigger">
                                                            <span class="inline-flex rounded-md">
                                                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                                                    {{ Auth::user()->currentTeam->name }}
                            
                                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                                    </svg>
                                                                </button>
                                                            </span>
                                                        </x-slot>
                            
                                                        <x-slot name="content">
                                                            <div class="w-60">
                                                                <!-- Team Management -->
                                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                                    {{ __('Manage Team') }}
                                                                </div>
                            
                                                                <!-- Team Settings -->
                                                                <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                                    {{ __('Team Settings') }}
                                                                </x-jet-dropdown-link>
                            
                                                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                                    <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                                        {{ __('Create New Team') }}
                                                                    </x-jet-dropdown-link>
                                                                @endcan
                            
                                                                <div class="border-t border-gray-100"></div>
                            
                                                                <!-- Team Switcher -->
                                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                                    {{ __('Switch Teams') }}
                                                                </div>
                            
                                                                @foreach (Auth::user()->allTeams() as $team)
                                                                    <x-jet-switchable-team :team="$team" />
                                                                @endforeach
                                                            </div>
                                                        </x-slot>
                                                    </x-jet-dropdown>
                                                </div>
                                            @endif

                                            <!-- Settings Dropdown -->
                                            <div class="ml-3 relative">
                                                <x-jet-dropdown align="right" width="48">
                                                    <x-slot name="trigger">
                                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                                            </button>
                                                        @else
                                                            <span class="inline-flex rounded-md">
                                                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                                    {{ Auth::user()->name }}
                            
                                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                                    </svg>
                                                                </button>
                                                            </span>
                                                        @endif
                                                    </x-slot>
                            
                                                    <x-slot name="content">
                                                        <!-- Account Management -->
                                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                                            {{ __('Manage Account') }}
                                                        </div>
                            
                                                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                                            {{ __('Profile') }}
                                                        </x-jet-dropdown-link>

                                                        @if(Auth::user()->role_id==2)
                                                        <x-jet-dropdown-link href="{{ route('Admin') }}">
                                                            {{ __('Admin manager') }}
                                                        </x-jet-dropdown-link>
                                                        @endif
                                                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                                {{ __('API Tokens') }}
                                                            </x-jet-dropdown-link>
                                                        @endif
                            
                                                        <div class="border-t border-gray-100"></div>
                            
                                                        <!-- Authentication -->
                                                        <form method="POST" action="{{ route('logout') }}">
                                                            @csrf
                            
                                                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                                     onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                                                                {{ __('Log Out') }}
                                                            </x-jet-dropdown-link>
                                                        </form>
                                                    </x-slot>
                                                </x-jet-dropdown>
                                            </div>
                                        </div>
                                        @else
                                            <a href="{{url('login')}}" title="">Đăng nhập</a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="/" title="" id="logo" class="fl-left"><img src="{{asset('storage/photos/layout-system/logo.jpeg')}}"/></a>
                            <div id="search-wp" class="fl-left">
                                <form method="POST" action="{{route('product.search')}}">
                                    @csrf
                                    <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                    <div id="searchList"></div>
                                    {{-- <button type="submit" id="sm-s"><i class="fa fa-search"></i></button> --}}
                                </form>
                            </div>
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">Hotline</span>
                                    <span class="phone">0987.654.321</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="{{route('cart.show')}}" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">{{Cart::count()}}</span>
                                </a>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num">{{Cart::count()}}</span>
                                    </div>
                                    <div id="dropdown">
                                        @if(!empty(Cart::content()))
                                        <p class="desc">Có <span>{{Cart::count()}} sản phẩm</span> trong giỏ hàng</p>
                                        <ul class="list-cart">
                                            @foreach(Cart::content() as $item)
                                            <li class="clearfix">
                                                <a href="{{url('products/'.$item->id)}}" title="" class="thumb fl-left">
                                                    <img src="{{asset($item->options['image'])}}" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="{{url('products/'.$item->id)}}" title="" class="product-name">{{$item->name}}</a>
                                                    <p class="price">{{number_format($item->price,0,',','.')}}</p>
                                                    <p class="qty">Số lượng: <span>{{$item->qty}}</span></p>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right">{{Cart::total(0,',','.')}}</p>
                                        </div>
                                        <div class="action-cart clearfix">
                                            <a href="{{url('Cart')}}" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            @if(Cart::count()!=0)
                                            <a href="{{route('cart.show_checkout')}}" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')

                <div id="footer-wp">
                    <div id="foot-body">
                        <div class="wp-inner clearfix">
                            <div class="block" id="info-company">
                                <h3 class="title">Araka</h3>
                                <a href="/" title="" id="logo" class="d-block"><img src="{{asset('storage/photos/layout-system/logo.jpeg')}}"/></a>
                                <p class="desc">Araka luôn cung cấp luôn là sản phẩm chính hãng có thông tin rõ ràng, chính sách ưu đãi cực lớn cho khách hàng có thẻ thành viên.</p>
                                <div id="payment">
                                    <div class="thumb">
                                        <img src="{{asset('storage/photos/layout-system/img-foot.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="block menu-ft" id="info-shop">
                                <h3 class="title">Thông tin cửa hàng</h3>
                                <ul class="list-item">
                                    <li>
                                        <p>106 - Trần Bình - Cầu Giấy - Hà Nội</p>
                                    </li>
                                    <li>
                                        <p>0987.654.321 - 0989.989.989</p>
                                    </li>
                                    <li>
                                        <p>vshop@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="block menu-ft policy" id="info-shop">
                                <h3 class="title">Chính sách mua hàng</h3>
                                <ul class="list-item">
                                    <li>
                                        <a href="" title="">Quy định - chính sách</a>
                                    </li>
                                    <li>
                                        <a href="" title="">Chính sách bảo hành - đổi trả</a>
                                    </li>
                                    <li>
                                        <a href="" title="">Chính sách hội viện</a>
                                    </li>
                                    <li>
                                        <a href="" title="">Giao hàng - lắp đặt</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="block" id="newfeed">
                                <h3 class="title">Bảng tin</h3>
                                <p class="desc">Đăng ký với chung tôi để nhận được thông tin ưu đãi sớm nhất</p>
                                <div id="form-reg">
                                    <form method="POST" action="">
                                        <input type="email" name="email" id="email" placeholder="Nhập email tại đây">
                                        <button type="submit" id="sm-reg">Đăng ký</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="foot-bot">
                        <div class="wp-inner">
                            <p id="copyright">© Bản quyền thuộc về unitop.vn | Php Master</p>
                        </div>
                    </div>
                </div>
                </div>
                <div id="menu-respon">
                    <a href="/" title="" class="logo"><img src="{{asset('storage/photos/layout-system/logo.jpeg')}}"/></a>
                    <div id="menu-respon-wp">
                        @if (Auth::check())
                        <div :class="{'block': open, 'hidden': ! open}" class="sm:hidden">
                            <!-- Responsive Settings Options -->
                            <div class="pt-4 pb-1 border-t border-gray-200">
                                <div class="flex items-center px-1">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <div class="flex-shrink-0 mr-1">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                        </div>
                                    @endif
                    
                                    <div>
                                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                        <div class="font-medium text-gray-500" style="font-size: 10px">{{ Auth::user()->email }}</div>
                                    </div>
                                </div>
                    
                                <div class="mt-3 space-y-1">
                                    <!-- Account Management -->
                                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                        {{ __('Profile') }}
                                    </x-jet-responsive-nav-link>
                    
                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                            {{ __('API Tokens') }}
                                        </x-jet-responsive-nav-link>
                                    @endif
                    
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                    
                                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-jet-responsive-nav-link>
                                    </form>
                    
                                    <!-- Team Management -->
                                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                        <div class="border-t border-gray-200"></div>
                    
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Team') }}
                                        </div>
                    
                                        <!-- Team Settings -->
                                        <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                            {{ __('Team Settings') }}
                                        </x-jet-responsive-nav-link>
                    
                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                                {{ __('Create New Team') }}
                                            </x-jet-responsive-nav-link>
                                        @endcan
                    
                                        <div class="border-t border-gray-200"></div>
                    
                                        <!-- Team Switcher -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>
                    
                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        <ul class="" id="main-menu-respon">
                            @if(!Auth::check())
                            <li>
                                <a href="login" title>Login</a>
                            </li>
                            @endif
                            <li>
                                <a href="/" title>Trang chủ</a>
                            </li>
                            <li>
                                <a href="/" title>Menu</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{url('Menu/Appetizer')}}" title="">Appetizers</a>
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
                            </li>
                            <li>
                                <a href="?page=blog" title>Blog</a>
                            </li>
                            <li>
                                <a href="{{route('reservation.show')}}" title>Đặt bàn</a>
                            </li>
                            <li>
                                <a href="#" title>Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="btn-top"><img src="{{asset('storage/photos/layout-system/icon-to-top.png')}}" alt=""/></div>
                <div id="fb-root"></div>
                <script>(function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>
                </body>
                </html>


                