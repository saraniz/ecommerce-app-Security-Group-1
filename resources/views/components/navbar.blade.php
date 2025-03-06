<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('') }}">
                <h2>Sixteen <em>Clothing</em></h2>
            </a>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('products') }}">Our Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('contact') }}">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('cart') }}">
                        <i class="fas fa-shopping-cart mr-2"></i> 
                    </a>
                </li>
                <!-- Wishlist Icon Link -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('wishlist') }}">
                        <i class="fas fa-heart mr-2"></i> 
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item" ><a class="nav-link" href="{{ url('login') }}"><span class="glyphicon glyphicon-user"></span><i class="fas fa-user mr-2"></i> Login </a></li>
                <li class="nav-item" ><a class="nav-link" href="{{ url('register') }}"><span class="glyphicon glyphicon-log-in"></span><i class="fas fa-user-plus mr-2"></i>  Sign up</a></li>
            </ul>
        </div>
    </nav>
</header>
