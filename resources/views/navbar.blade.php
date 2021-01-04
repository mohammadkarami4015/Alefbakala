<nav id="menu" class="navbar">
    <div class="navbar-header"><span class="visible-xs visible-sm"> منو <b></b></span></div>
    <div class="container">
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a class="home_link" title="خانه" href="{{route('home')}}">خانه</a></li>
                <li class="dropdown"><a href="{{route('shop.all')}}">بازار</a>
                <li class="dropdown"><a href="{{route('cart.show')}}">سبد خرید</a>
                <li class="dropdown"><a href="{{route('user.profile')}}">پروفایل</a>
                <li class="dropdown"><a href="{{route('shop.all')}}">نقشه</a>
            </ul>
        </div>
    </div>
</nav>
