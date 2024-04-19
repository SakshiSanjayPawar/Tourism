<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

        <button onclick="redirectToLoginAdmin()" class="btn btn-primary w-100 mb-3">Admin</button>
        <button onclick="redirectToHome()" class="btn btn-primary w-100">Customer</button>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-Ky5S3W1h6P+Xnq6jz3elFszO41+a4ErIQqD/XlytpEhylM/2d2n0hqayfJxkMS1P" crossorigin="anonymous"></script>
    <script>
        function redirectToLoginAdmin() {
            window.location.href = "loginadmin.php"; // Redirect to loginadmin.php for Admin
        }

        function redirectToHome() {
            window.location.href = "Customer/home.php"; // Redirect to home.php for Customers
        }
    </script>
</body>

</html>