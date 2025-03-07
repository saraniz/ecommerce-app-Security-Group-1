@extends('layouts.app')

@section('main')
    <!-- Page Content -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Best Offer</h4>
            <h2>New Arrivals On Sale</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Flash Deals</h4>
            <h2>Get your best products</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Last Minute</h4>
            <h2>Grab last minute deals</h2>
          </div>
        </div>
      </div>
    </div>

    <section class="relative w-full h-screen bg-cover bg-center" id="herosection">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center text-center px-4">
            <h1 class="text-5xl font-bold text-white mb-4">Upgrade Your Style Today!</h1>
            <p class="text-lg text-gray-200 mb-6 max-w-2xl">
                Discover the latest trends and exclusive deals on premium fashion and accessories. Shop now and redefine your look!
            </p>
            <a href="#product" class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold py-3 px-6 rounded-full text-lg transition duration-300">
                Shop Now
            </a>
        </div>
    </section>
    <!-- Update your product section like this -->
    <section id="product">
      <div class="latest-products">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Latest Products</h2>
                <a href="{{ url('products') }}">view all products <i class="fa fa-angle-right"></i></a>
              </div>
            </div>

            <!-- Loop over the products -->
            @foreach($products as $product)
            <a href="{{ route('product.view', $product->id) }}">
            <div class="col-md-4">
                <div class="product-item">
                <a href="{{ route('product.view', $product->id) }}">
                  <img src="{{ asset('assets/images/' . $product->image) }}" alt="" style="max-width: 300px; max-height: 300px; object-fit: contain; width: 100%; height: auto; border-radius: 8px;">
                </a>
                  <div class="down-content">
                    <a href="#"><h4>{{ $product->name }}</h4></a>
                    <h6>${{ number_format($product->price, 2) }}</h6>
                    <p>{{ $product->description }}</p>
                    <ul class="stars">
                      <!-- You can implement a dynamic star rating system here -->
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>Reviews ({{ rand(10, 50) }})</span> <!-- Random reviews for demonstration -->
                  </div>
                </div>
              </div>
            </a>
              @endforeach

          </div>
        </div>
      </div>
    </section>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Sixteen Clothing</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Looking for the best products?</h4>
              <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing" target="_parent">This template</a> is free to use for your business websites. However, you have no permission to redistribute the downloadable ZIP file on any template collection website. <a rel="nofollow" href="https://templatemo.com/contact">Contact us</a> for more info.</p>
              <ul class="featured-list">
                <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                <li><a href="#">Consectetur an adipisicing elit</a></li>
                <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                <li><a href="#">Corporis, omnis doloremque</a></li>
                <li><a href="#">Non cum id reprehenderit</a></li>
              </ul>
              <a href="about.html" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/feature-image.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action mb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
                </div>
                <div class="col-md-4">
                  <a href="#" class="filled-button">Purchase Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="py-16 bg-gray-100 text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-8">What Our Customers Say</h2>
        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center">
                <img src="{{ asset('assets/images/user.jpeg') }}" alt="John Doe" class="w-16 h-16 rounded-full mb-4 object-cover">
                <div class="flex mb-2">
                    ⭐⭐⭐⭐⭐
                </div>
                <p class="text-gray-600 italic">"The quality of the products is outstanding! I ordered a dress, and it fits perfectly. The material feels luxurious, and I get compliments every time I wear it. The delivery was also super quick! Will definitely shop again!"</p>
                <h4 class="font-semibold mt-4">- John Doe</h4>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center">
              <img src="{{ asset('assets/images/user.jpeg') }}" alt="John Doe" class="w-16 h-16 rounded-full mb-4 object-cover">
                <div class="flex mb-2">
                    ⭐⭐⭐⭐⭐
                </div>
                <p class="text-gray-600 italic">"Shopping here was an amazing experience! The website is easy to navigate, and the customer service team was so helpful. My order arrived earlier than expected, and I love everything I bought. Highly recommended!"</p>
                <h4 class="font-semibold mt-4">- Sarah Lee</h4>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center">
                <img src="{{ asset('assets/images/user.jpeg') }}" alt="John Doe" class="w-16 h-16 rounded-full mb-4 object-cover">
                <div class="flex mb-2">
                    ⭐⭐⭐⭐⭐
                </div>
                <p class="text-gray-600 italic">"Absolutely love the collection here! I’ve purchased multiple items, and every single one has exceeded my expectations. The quality, price, and fast shipping make this my go-to shopping destination."</p>
                <h4 class="font-semibold mt-4">- Michael Smith</h4>
            </div>
        </div>
    </section>
    
    <script src="{{ asset('assets/js/custom.js') }}" defer></script>
        <script src="{{ asset('assets/js/owl.js') }}" defer></script>
        <script src="{{ asset('assets/js/slick.js') }}" defer></script>
        <script src="{{ asset('assets/js/isotope.js') }}" defer></script>
        <script src="{{ asset('assets/js/accordions.js') }}" defer></script>
@endsection
