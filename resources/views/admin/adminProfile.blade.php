<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">

  <title>Admin Profile</title>

  <!-- CSS Link -->
  <link rel="stylesheet" href="{{ asset('css/adminProfile.css') }}">

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
            <a class="nav-link active" href="#">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Shop</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Men</a></li>
              <li><a class="dropdown-item" href="#">Women</a></li>
              <li><a class="dropdown-item" href="#">Kids</a></li>
              <li><a class="dropdown-item" href="#">New Arrivals</a></li>
              <li><a class="dropdown-item" href="#">Best Sellers</a></li>
              <li><a class="dropdown-item" href="#">Sale</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Categories</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Tops</a></li>
              <li><a class="dropdown-item" href="#">Bottoms</a></li>
              <li><a class="dropdown-item" href="#">Dresses</a></li>
              <li><a class="dropdown-item" href="#">Outerwear</a></li>
              <li><a class="dropdown-item" href="#">Accessories</a></li>
              <li><a class="dropdown-item" href="#">Shoes</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>

        <div class="d-flex">
          <a href="#" class="nav-icon"><i class="bi bi-person"></i></a>
          <a href="#" class="nav-icon"><i class="bi bi-heart"></i></a>
          <a href="#" class="nav-icon"><i class="bi bi-cart"></i></a>
        </div>
      </div>
    </div>
  </nav>
  <!-- Navigation Bar End -->

  <!-- Profile -->
  <section id="userProfile" class="container position-relative pt-5 UProfile">

    <!-- Form -->
    <div class="container PContainer">
      <div class="row justify-content-center">
        <div class="col-lg-11 col-md-11 col-sm-12">
          <div class="card p-4 Card">
            <div class="row">
              <!-- Image -->
              <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                <div class="profile-picture mb-3">
                  <img id="profile-img" src="images/User.jpg" class="img-fluid rounded-circle PImage"
                    alt="Profile Picture">
                </div>
              </div>

              <!-- Information -->
              <div class="col-md-8">
                <form class="profile-form Form">
                  <div class="mb-4 mt-2">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" id="firstName" name="firstName" class="form-control" placeholder="First Name"
                      value="">
                  </div>
                  <div class="mb-4">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Last Name"
                      value="">
                  </div>
                  <div class="mb-4">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="">
                  </div>
                  <div class="mb-4">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" id="phone" name="phoneNumber" class="form-control" placeholder="Phone Number"
                      value="">
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <label for="gender" class="form-label">Gender</label>
                      <select class="form-select" id="gender" name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                    <div class="col-md-6 mb-4">
                      <label for="dob" class="form-label">DOB</label>
                      <input type="date" class="form-control" id="dob" name="dob" value="">
                    </div>
                  </div>
                  <div class="mb-4">
                    <label for="address" class="form-label">Home Address</label>
                    <input type="text" id="address" name="homeAddress" class="form-control" placeholder="Home Address"
                      value="">
                  </div>
                  <div class="mb-4">
                    <label for="profilePicture" class="form-label">Profile Picture</label>
                    <input type="file" id="profilePicture" name="profilePicture" class="form-control"
                      placeholder="Profile Picture">
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <button type="submit" class="btn w-100 mt-2 RButton">Reset</button>
                    </div>
                    <div class="col-md-6 mb-3">
                      <button type="submit" class="btn w-100 mt-2 UButton">Update</button>
                    </div>
                  </div>
                </form>

                <hr>

                <a href="adminDashboard.html" class="btn px-3 w-100 LinkDashboard">Dashboard <i
                    class="fa-solid fa-up-right-from-square"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer Start -->
  <footer class="footer bg-dark text-light pt-5 pb-4 mt-4">
    <div class="container text-md-left">
      <div class="row text-md-left">

        <!-- About -->
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class="text-uppercase fw-bold mb-4">Sixteen Clothing</h5>
          <p>We offer the best fashion deals for men, women, and kids. Enjoy secure shopping, fast delivery, and stylish
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

</html>