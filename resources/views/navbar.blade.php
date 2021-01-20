<nav id="menu" class="navbar">
    <div class="navbar-header"><span class="visible-xs visible-sm"> منو <b></b></span></div>
    <div class="container">
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a class="home_link" title="خانه" href="{{route('home')}}">خانه</a></li>
                <li class="dropdown"><a href="{{route('shop.all')}}">بازار</a>
                <li class="dropdown"><a href="{{route('cart.show')}}">سبد خرید</a>
                <li class="dropdown"><a href="{{route('user.profile')}}">پروفایل</a>
                <li class="dropdown"><a href="{{route('contactus')}}">تماس با ما</a>
            </ul>
        </div>
    </div>
</nav>
<form action="{{route('shop.search')}}">
    <div class="topnav">
        <input name="value" style="width: 50%;margin: 2% 20% 0% 0%" type="text" placeholder="جستجو بر اساس نام فروشگاه">
        <button style="border-radius: 15px" class="btn btn-sm btn-primary">جستجو</button>
    </div>
</form>
