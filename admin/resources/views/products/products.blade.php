<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="keywords" content="">

   <title>Products</title>

   <!-- CSS Link -->
   <link rel="stylesheet" href="css/productManagement.css">

   <!-- GF Link -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Markazi+Text:wght@400..700&display=swap" rel="stylesheet">

   <!-- FA Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

   <!-- Bootstrap CSS Link -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</head>

<body>

   <!-- Navigation Bar Start -->
   <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Sixteen Clothing</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
        aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="{{route('admin.dashboard')}}">Dashboard</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('categories.category_view')}}">Category</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('product.view_product')}}">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('orders.order_view')}}">Order</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('user.user_view')}}">Costomers</a>
          </li>
        </ul>

        
      </div>
    </div>
  </nav>
  <!-- Navigation Bar End -->

   <!-- Table -->
   <div class="container pt-5 mt-4">
      <main class="content col-lg-12 col-md-12 col-sm-12 Content">
         <h4 class="text-center">Products</h4>

         <!-- Search -->
         <div class="Search card p-3 my-3">
            <form class="form-inline d-flex gap-2" action="{{ route('products.product_search') }}" method="GET">
               <input class="form-control mr-sm-2" type="search" name="search" placeholder="Enter Product ID"
                  aria-label="Search" value="{{ request('search') }}">
               <button class="btn my-2 my-sm-0 SButton" type="submit">Search</button>
               <button class="btn btn-primary" type="submit" action="{{route('product.view_product')}}">Reset</button>
            </form>
         </div>
         

         <table class="table">
            <thead class="table-warning">
               <tr>
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Status</th>
                  <th>Image</th>
                  <th>Category_ID</th>
               </tr>
            @foreach($post as $post)
            </thead>
            <tbody>
               <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->name}}</td>
                  <td>{{$post->description}}</td>
                  <td>{{$post->price}}</td>
                  <td>{{$post->quantity}}</td>
                  <td>{{$post->status}}</td>
                  <td>
                 @if($post->image)
                  <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="150">
                @else
                  <span>No Image</span>
                 @endif
                  </td>

                  <td>{{$post->category_id}}</td>
                  <td class="action-btns">
                      
                     <a href="{{ route('editp_post.{id}', $post->id) }}" method="POST" class="btn btn-sm me-1 btn-warning text-white">
                      <i class="bi bi-pencil-square"></i>
                     </a>
                     <a href="{{ route('deletep_post.{id}', $post->id) }}" method="POST" class="btn btn-sm me-1 btn-danger">
                      <i class="bi bi-trash"></i>
                     </a>

                  </td>
               </tr>
               
            </tbody>
            @endforeach
            </tbody>
         </table>
      </main>
   </div>
   </section>

   <!-- Footer Start -->
   <footer class="footer bg-dark text-light pt-5 pb-4 mt-5">
      <div class="container text-md-left">
         <div class="row text-md-left">

            <!-- About -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
               <h5 class="text-uppercase fw-bold mb-4">Sixteen Clothing</h5>
               <p>We offer the best fashion deals for men, women, and kids. Enjoy secure shopping, fast delivery, and
                  stylish
                  clothing!</p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
               <h6 class="text-uppercase fw-bold mb-4">Quick Links</h6>
               <p><a href="#" class="text-light text-decoration-none">Customers</a></p>
               <p><a href="#" class="text-light text-decoration-none">Products</a></p>
               <p><a href="#" class="text-light text-decoration-none">Orders</a></p>
               <p><a href="#" class="text-light text-decoration-none">Dashboard</a></p>
            </div>

            <!-- Contact -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
               <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
               <p><i class="bi bi-house-door me-2"></i> 123 Fashion Street, Colombo, Sri Lanka</p>
               <p><i class="bi bi-envelope me-2"></i> support@Sixteen Clothing.com</p>
               <p><i class="bi bi-phone me-2"></i> +94 77 123 4567</p>
            </div>

            <!-- Social Media -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mt-3">
               <h6 class="text-uppercase fw-bold mb-4">Follow Us</h6>
               <a href="#" class="btn btn-outline-light btn-floating m-1"><i class="bi bi-facebook"></i></a>
               <a href="#" class="btn btn-outline-light btn-floating m-1"><i class="bi bi-instagram"></i></a>
               <a href="#" class="btn btn-outline-light btn-floating m-1"><i class="bi bi-twitter"></i></a>
               <a href="#" class="btn btn-outline-light btn-floating m-1"><i class="bi bi-linkedin"></i></a>
            </div>

         </div>

         <hr class="mb-4">

         <!-- Footer bottom -->
         <div class="row align-items-center">
            <div class="col-md-7 col-lg-8">
               <p class="text-center text-md-start">© 2025 Sixteen Clothing. All Rights Reserved.</p>
            </div>
         </div>
      </div>
   </footer>
   <!-- Footer End -->

   <!-- Bootstrap JS Link -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>


<style>
  :root {
   /* Colors */
   --backgroundColor: #FFD700;
   --activeLinks: #ffffff;
   --textShadow: #000000;
   --links: #FFEB3B;
   --faqBackground: #fff383;
   --linkHover: #212121;
   --hoverEffects: #212121;
   --titleColor: #0D47A1;
   --titleColorOne: #0d48a1ab;
   --heroText: #E3E3E3;
   --whiteColor: #ffffff;
   --blackColor: #000000;
   --serviceBackground: #dff3ff;
   --blackColor: #212121;
   --bgColorOne: #0D47A1;
   --bgColorTwo: #FF9800;
   --text: #FFFFFF;
   --links: #FFEB3B;
   --hoverEffects: #424242;
   --bodyBackground: #f4f7fc;
 
   /* Fonts */
   --fFamily: "Roboto", sans-serif;
   --foSizing: auto;
   --fWeight: 400;
   --fStyle: normal;
   --fvSettings: "wdth" 100;
 }
 
 body {
   padding-top: 86px;
   background-color: var(--bodyBackground) !important;
 
 }
 
 * {
   font-family: var(--fFamily);
   font-optical-sizing: var(--foSizing);
   font-weight: var(--fWeight);
   font-style: var(--fStyle);
   font-variation-settings: var(--fvSettings);
 }
 
 /* Navigation styles */
 .navbar {
   background-color: #ffffff;
   border-bottom: 1px solid #e0e0e0;
   box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
   transition: background-color 0.3s ease;
 }
 
 .navbar-brand {
   font-size: 1.7rem;
   font-weight: 700;
   color: #343a40;
 }
 
 .navbar-nav .nav-link {
   position: relative;
   font-weight: 500;
   color: #333;
   margin-right: 1rem;
   transition: color 0.3s ease;
 }
 
 .navbar-nav .nav-link::after {
   content: "";
   position: absolute;
   width: 0%;
   height: 2px;
   bottom: 0;
   left: 0;
   background-color: #007bff;
   transition: width 0.3s ease;
 }
 
 .navbar-nav .nav-link:hover,
 .navbar-nav .nav-link.active {
   color: #007bff;
 }
 
 .navbar-nav .nav-link:hover::after,
 .navbar-nav .nav-link.active::after {
   width: 100%;
 }
 
 .dropdown-menu {
   border-radius: 0.25rem;
   box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
   padding: 0.5rem 0;
 }
 
 .dropdown-menu .dropdown-item {
   transition: background-color 0.2s ease, padding-left 0.2s ease;
 }
 
 .dropdown-menu .dropdown-item:hover {
   background-color: #f8f9fa;
   padding-left: 1.5rem;
 }
 
 .nav-icon {
   font-size: 1.3rem;
   margin-left: 18px;
   color: #333;
   transition: color 0.3s ease;
 }
 
 .nav-icon:hover {
   color: #007bff;
 }
 
 @media (max-width: 991.98px) {
   .navbar-nav .nav-link {
     margin-right: 0;
   }
 }
 
 /* Table */
 
 .Content {
   margin: 50px auto;
   padding: 20px;
   background: var(--whiteColor);
   border-radius: 5px;
   margin-top: -60px;
   box-shadow: 2px 2px 4px var(--hoverEffects);
 }
 
 .Content .Search {
   border: none;
   border-radius: 0px;
   background-color: var(--faqBackground);
 }
 
 .Content .Search .SButton {
   color: var(--hoverEffects);
   font-weight: 500;
   background-color: var(--faqBackground);
   border: 2px solid var(--hoverEffects);
   transition: all 200ms;
 }
 
 .Content .Search .SButton:hover {
   color: var(--whiteColor);
   background-color: var(--backgroundColor);
   border: 2px solid var(--whiteColor);
 }

</style>

</html>