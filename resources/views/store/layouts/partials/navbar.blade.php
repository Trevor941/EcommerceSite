<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="/" class="nav-item nav-link active">Home</a>
                    <a href="{{route('store.products')}}" class="nav-item nav-link">Products</a>
                    <a href="{{route('cart')}}" class="nav-item nav-link">Cart</a>
                    <a href="{{route('checkout')}}" class="nav-item nav-link">Checkout</a>
                    <a href="{{route('myaccount')}}" class="nav-item nav-link">My Account</a>
                    <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
                </div>
                <div class="navbar-nav ml-auto">
                    <div class="nav-item dropdown">
                        @if(Auth::user())
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Hi' {{auth()->user()->firstname}}</a>
                        @else
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">USER ACCOUNTS</a>
                        @endif
                        <div class="dropdown-menu">
                            
                            @if(Auth::user())
                            @foreach (auth()->user()->roles as $role)
                                @if($role->name === 'Admin')
                                <a href="{{route('home')}}" class="dropdown-item">Dashboard</a>
                                @endif
                            @endforeach
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                <input type="hidden" name="customerform" value="customerform">
                            </form>
                            @else
                            <a href="{{route('customerlogin')}}" class="dropdown-item">Login</a>
                            <a href="{{route('customerlogin')}}" class="dropdown-item">Register</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>