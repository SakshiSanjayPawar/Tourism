<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z24KMTDPxk6jzZu4z0J3R9Et6f4z5IbVJ7k7sk" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <div class="container">
        <div class="logo text-center mb-4">
            <img src="logo.jpeg" alt="Logo" class="img-fluid">
        </div>
        <section>
            <div id="headerAdmin">
                <h2 class="text-center mb-3">Admin Login</h2>
                <p class="text-center text-muted">Please enter the password to log in as an admin.</p>
                <input type="password" id="password" placeholder="Password" class="form-control mb-3">
                <button onclick="login()" class="btn btn-primary w-100">Login</button>
            </div>
        </section>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-Ky5S3W1h6P+Xnq6jz3elFszO41+a4ErIQqD/XlytpEhylM/2d2n0hqayfJxkMS1P" crossorigin="anonymous"></script>
    <script>
        function login() {
            var password = document.getElementById("password").value;
            if (password === "admin@123") {
                window.location.href = "Admin/dashboard.php"; // Redirect to enquiry.php if password matches
            } else {
                alert("Invalid credentials!");
            }
        }
    </script>
</body>

</html>