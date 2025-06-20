@extends('layouts.app')

@section('main')
<section class="py-5">
  <div class="container" style="padding-top: 100px;">
    <div class="row gx-5">
      <!-- Product Images Section -->
      <aside class="col-lg-6">
        <div class="mb-4">
          <!-- Main Product Image -->
          <a data-fslightbox="mygallery" class="rounded-4" target="_blank" href="">
            <img style="width: 100%; max-height:500px; max-width:500px; object-fit: cover;" class="rounded-4" src="{{ asset($product->main_image) }}" alt="{{ $product->title }}" />
          </a>
        </div>
      </aside>

      <!-- Product Details Section -->
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="text-dark mb-3">
            {{ $product->title }}
          </h4>
          
          <!-- Product Ratings -->
          <div class="d-flex flex-row mb-3 align-items-center">
            <div class="text-warning mb-1 me-2">
              @for($i = 0; $i < 5; $i++)
                <i class="fa fa-star{{ $i < $product->rating ? '' : '-half-alt' }}"></i>
              @endfor
              <span class="ms-2">
                {{ $product->rating }}
              </span>
            </div>
            <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>{{ $product->orders_count }} orders</span>
            <span class="text-success ms-3">In stock</span>
          </div>

          <!-- Price Section -->
          <div class="mb-3">
            <span class="h5">${{ number_format($product->price, 2) }}</span>
            <span class="text-muted">/per unit</span>
          </div>

          <!-- Product Description -->
          <p>{{ $product->description }}</p>

          <!-- Product Details (Type, Color, Material, Brand) -->
          <div class="row mb-4">
            <div class="col-md-6 col-12">
              <dt class="fw-bold">Type:</dt>
              <dd>{{ $product->type }}</dd>
            </div>
            <div class="col-md-6 col-12">
              <dt class="fw-bold">Color:</dt>
              <dd>{{ $product->color }}</dd>
            </div>
          </div>

          <hr />

          <!-- Size and Quantity Section -->
          <div class="row mb-4">
            <div class="col-md-6 col-12">
              <label class="mb-2">Size</label>
              <select class="form-select border border-secondary" id="size-select" style="height: 35px;">
                @foreach($product->available_sizes as $size)
                  <option value="{{ $size }}">{{ $size }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6 col-12">
              <label class="mb-2">Quantity</label>
              <div class="d-flex justify-content-center mb-3" style="width: 100px;">
                <button class="btn btn-white border border-secondary px-3" style="margin-top: -1px; height: 40px; padding:0;" type="button" id="button-minus" data-mdb-ripple-color="dark">
                  <i class="fas fa-minus"></i>
                </button>
                <input type="number" class="form-control text-center border border-secondary" style="padding:0; width:50px;" value="1" aria-label="Quantity" id="quantity-input" aria-describedby="button-minus" />
                <button class="btn btn-white border border-secondary px-3" style="margin-top: -1px; height: 40px; padding:0;" type="button" id="button-plus" data-mdb-ripple-color="dark">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="d-flex gap-3">
            <a class="btn btn-warning shadow-0" onclick="addToCart()">Buy Now</a>
            <a class="btn btn-primary shadow-0" onclick="addToCart()"> <i class="fa fa-shopping-basket"></i> Add to Cart </a>
          </div>
        </div>
      </main>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
  const sizeSelect = document.getElementById('size-select');
  const selectedSizeDisplay = document.getElementById('selected-size');

  // Function to update the display of selected size
  sizeSelect.addEventListener('change', function() {
    const selectedSize = sizeSelect.value;
    if (selectedSize) {
      selectedSizeDisplay.textContent = selectedSize;
    } else {
      selectedSizeDisplay.textContent = "No size selected";
    }
  });

  // Initial display of size (if there's already a selected size)
  if (sizeSelect.value) {
    selectedSizeDisplay.textContent = sizeSelect.value;
  }
});

  // Get the elements
  const quantityInput = document.getElementById('quantity-input');
  const buttonMinus = document.getElementById('button-minus');
  const buttonPlus = document.getElementById('button-plus');
  const sizeSelect = document.getElementById('size-select');

  // Decrease quantity
  buttonMinus.addEventListener('click', () => {
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
      quantityInput.value = currentValue - 1;
    }
  });

  // Increase quantity
  buttonPlus.addEventListener('click', () => {
    let currentValue = parseInt(quantityInput.value);
    quantityInput.value = currentValue + 1;
  });

  function getProductId() {
    const urlPath = window.location.pathname;
    const segments = urlPath.split('/');
    return segments[segments.length - 1];  // Assuming the last segment is the product ID
  }

  // Add to Cart function
  function addToCart() {
    const productId = getProductId();  // Get the product ID from the server-side
    const size = sizeSelect.value;  // Get the selected size
    const quantity = parseInt(quantityInput.value);  // Get the selected quantity

    if (!size) {
      alert("Please select a size!");
      return;
    }

    // Prepare the data to send to the server
    const cartData = {
      product_id: productId,
      size: size,
      quantity: quantity,
      color: 'red'
    };

    console.log(cartData)

    // Send the data to the backend using fetch
    fetch("{{ url('cart/add') }}", {
      method: "POST",
      credentials: 'include',
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": "{{ csrf_token() }}"  // Make sure to include the CSRF token for POST requests
      },
      body: JSON.stringify(cartData)  // Send the data as a JSON object
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert('Product added to cart successfully!');
        // Optionally, update the cart icon or do other things on success
      } else {
        alert('Failed to add product to cart.');
      }
    })
    .catch(error => {
      console.error("Error:", error);
    });
  }
</script>

@endsection
