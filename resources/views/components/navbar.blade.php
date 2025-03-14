<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <h2>Sixteen <em>Clothing</em></h2>
            </a>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('wishlist') }}">
                        <i class="fas fa-heart mr-2"></i> 
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right" id="authLinks">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('login') }}">
                        <i class="fas fa-user mr-2"></i> Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('register') }}">
                        <i class="fas fa-user-plus mr-2"></i> Sign up
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Fetch user data to check if the user is logged in
    fetch("{{ url('auth/user') }}", {
        method: "GET",
        credentials: "include",  // This ensures cookies or session data are included
        headers: {
            "Accept": "application/json"
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.user) {
            // Display user info and logout option if logged in
            document.getElementById("authLinks").innerHTML = `
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                        <i class="fas fa-user mr-2"></i> ${data.user.name}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('profile') }}">Profile</a>
                        <a class="dropdown-item" href="#" onclick="logout()">Logout</a>
                    </div>
                </li>
            `;
        }
    })
    .catch(error => {
        console.error("Error fetching user:", error);
    });
});

// Logout function triggered by clicking the "Logout" link
function logout() {
    fetch("{{ url('logout') }}", {
        method: "GET",
        credentials: "include",  // Ensure cookies or session are sent
        headers: {
            "Accept": "application/json"
        }
    })
    .then(response => response.json())
    .then(data => {
        // After logout, reload the page to update UI and show login/signup links
        window.location.reload();
    })
    .catch(error => {
        console.error("Logout failed:", error);
    });
}
</script>
