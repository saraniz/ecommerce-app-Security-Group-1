@extends('layouts.app')

@section('main')
<div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>new arrivals</h4>
              <h2>sixteen products</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                  <li class="active" data-filter="*">All Products</li>
                  <li data-filter=".des">Featured</li>
                  <li data-filter=".dev">Flash Deals</li>
                  <li data-filter=".gra">Last Minute</li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
           <div class="row">
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

          <div class="col-md-12 mb-5">
            <ul class="pages">
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
@endsection
