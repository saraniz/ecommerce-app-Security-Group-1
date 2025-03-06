@extends('layouts.app')

@section('main')
<section class="py-5" >
  <div class="container" style="padding-top: 100px;">
    <div class="row gx-5">
      <!-- Product Images Section -->
      <aside class="col-lg-6">
        <div class="mb-4">
          <!-- Main Product Image -->
          <a data-fslightbox="mygallery" class="rounded-4" target="_blank" href="">
            <img style="width: 100%; height: auto; object-fit: cover;" class="rounded-4" src="https://th.bing.com/th/id/OIP.ILULWcgdwbf7KSMgK1McGAHaHa?rs=1&pid=ImgDetMain" alt="{{ $product->title }}" />
          </a>
        </div>

        <!-- Thumbnail Images -->
        <div class="d-flex justify-content-start gap-3">
          @foreach($product->gallery_images as $image)
            <a data-fslightbox="mygallery" class="border mx-1 rounded-2" target="_blank" href="{{ asset('storage/'.$image) }}">
              <img width="80" height="80" class="rounded-2" src="{{ asset('storage/'.$image) }}" alt="thumbnail" />
            </a>
          @endforeach
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
            <div class="col-md-6 col-12">
              <dt class="fw-bold">Material:</dt>
              <dd>{{ $product->material }}</dd>
            </div>
            <div class="col-md-6 col-12">
              <dt class="fw-bold">Brand:</dt>
              <dd>{{ $product->brand }}</dd>
            </div>
          </div>

          <hr />

          <!-- Size and Quantity Section -->
          <div class="row mb-4">
            <div class="col-md-6 col-12">
              <label class="mb-2">Size</label>
              <select class="form-select border border-secondary" style="height: 35px;">
                @foreach($product->available_sizes as $size)
                  <option>{{ $size }}</option>
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
            <a href="#" class="btn btn-warning shadow-0">Buy Now</a>
            <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to Cart </a>
            <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a>
          </div>
        </div>
      </main>
    </div>
  </div>
</section>
<script>
  // Get the elements
  const quantityInput = document.getElementById('quantity-input');
  const buttonMinus = document.getElementById('button-minus');
  const buttonPlus = document.getElementById('button-plus');

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
</script>
@endsection
