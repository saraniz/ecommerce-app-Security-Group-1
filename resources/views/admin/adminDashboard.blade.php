<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">

  <title>Admin Dashboard</title>

  <!-- CSS Link -->
  <link rel="stylesheet" href="{{ asset('css/adminDashboard.css') }}">

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
            <a class="nav-link active" href="{{ route ('admin.dashboard') }}">Home</a>
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
          <a href="{{ route ('admin.profile') }}" class="nav-icon"><i class="bi bi-person"></i></a>
          <a href="#" class="nav-icon"><i class="bi bi-heart"></i></a>
          <a href="#" class="nav-icon"><i class="bi bi-cart"></i></a>
        </div>
      </div>
    </div>
  </nav>
  <!-- Navigation Bar End -->

  <!-- Admin Dashboard -->
  <section id="userDashboard" class="container position-relative DDashboard">
    <div class="container mb-5">
      <div class="row g-4">

        <!-- Total Sales -->
        <div class="col-md-3">
          <div class="dashboard-card card-sales d-flex flex-column justify-content-center align-items-center">
            <div class="card-title">Total Sales</div>
            <div class="card-value">${{ $totalSales }}</div>
          </div>
        </div>

        <!-- Total Orders -->
        <div class="col-md-3">
          <div class="dashboard-card card-orders d-flex flex-column justify-content-center align-items-center">
            <div class="card-title">Total Orders</div>
            <div class="card-value">{{ $orderCount }}</div>
          </div>
        </div>

        <!-- Total Customers -->
        <div class="col-md-3">
          <div class="dashboard-card card-customers d-flex flex-column justify-content-center align-items-center">
            <div class="card-title">Total Customers</div>
            <div class="card-value">{{ $customerCount }}</div>
          </div>
        </div>

        <!-- Total Products -->
        <div class="col-md-3">
          <div class="dashboard-card card-products d-flex flex-column justify-content-center align-items-center">
            <div class="card-title">Total Products</div>
            <div class="card-value">{{ $productCount }}</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Charts -->
    <div class="container my-5">

      <div class="row g-4">
        <!-- Line Chart -->
        <div class="col-md-6">
          <div class="chart-card">
            <div class="chart-title">Sales Over Time</div>
            <div class="chart-container">
             <canvas id="salesChart" height="200"></canvas>

            </div>
          </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-md-6">
          <div class="chart-card">
            <div class="chart-title">Orders by Category</div>
            <div class="chart-container">
              <canvas id="categoryChart" width="400" height="400"></canvas>

            </div>
          </div>
        </div>
      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      // Sales Line Chart
      const salesCtx = document.getElementById('salesChart').getContext('2d');

const salesChart = new Chart(salesCtx, {
  type: 'line',
  data: {
    labels: @json($salesLabels),
    datasets: [{
      label: 'Sales ($)',
      data: @json($salesData),
      backgroundColor: 'rgba(13, 110, 253, 0.2)',
      borderColor: '#0d6efd',
      borderWidth: 2,
      fill: true,
      tension: 0.3
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: { display: false }
    },
    scales: {
      y: { beginAtZero: true }
    }
  }
});
      // Category Pie Chart
    const ctx = document.getElementById('categoryChart').getContext('2d');
    const categoryData = @json($ordersByCategory);

    const labels = categoryData.map(item => item.category);
    const data = categoryData.map(item => item.total);

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Orders by Category',
                data: data,
                backgroundColor: [
                    '#FF6384', '#36A2EB', '#FFCE56', '#66BB6A', '#BA68C8', '#FF7043'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    </script>

    <!-- Table -->
    <div class="container pt-4">
      <main class="content col-lg-12 col-md-12 col-sm-12 Content">
        <h4 class="text-center">Recent Orders</h4>

        <!-- Search -->
        <div class="Search card p-3 my-3">
          <form class="form-inline d-flex gap-2" action="" method="GET">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Enter Order ID"
              aria-label="Search">
            <button class="btn my-2 my-sm-0 SButton" type="submit">Search</button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary my-2 my-sm-0">Reset</a>
          </form>
        </div>

        <table class="table">
          <thead class="table-warning">
            <tr>
              <th>Order ID</th>
              <th>Customer Name</th>
              <th>Total</th>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
  @forelse ($recentOrders as $order)
    <tr>
      <td>{{ $order->id }}</td>
      <td>{{ $order->user->fullname ?? 'N/A' }}</td>
      <td>${{ number_format($order->total_amount, 2) }}</td>
      <td>{{ $order->created_at->format('Y/m/d') }}</td>
      <td>
        @php
          $statusClass = match ($order->status) {
            'pending' => 'bg-warning',
            'approved' => 'bg-success',
            'cancelled' => 'bg-danger',
            default => 'bg-secondary',
          };
        @endphp
        <span class="badge {{ $statusClass }}">{{ ucfirst($order->status) }}</span>
      </td>
    </tr>
  @empty
    <tr>
      <td colspan="5" class="text-center">No recent orders found.</td>
    </tr>
  @endforelse
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