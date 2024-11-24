<?php
session_start();
include_once 'config.php';

$error = ''; // Initialize error message

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize the email input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $conn->prepare("SELECT user_id, password, role FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $hashed_password, $role);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                // Set session variables
                $_SESSION['user_id'] = $user_id;
                $_SESSION['email'] = $email; // Store email in session
                $_SESSION['role'] = $role;

                // Redirect based on role
                header('Location: ' . ($role === 'admin' ? 'admin_dashboard.php' : './dashboard/home.php'));
                exit();
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "No account found with that email.";
        }
        
        // Close the statement
        $stmt->close();
    } else {
        $error = "Invalid email format.";
    }
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PawMatch - Login</title>
<!-- Bootstrap CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<style>
    body {
        background-color: #f4f4f4;
        font-family: Arial, sans-serif;
    }
    .text-pink {
  color: #ff4081;
}
/* Site Title Styling */
.site-title {
  font-size: 1.5rem;
  font-weight: bold;
  color: #333;
}
/* Logo Styling */
.logo {
  width: 40px;
  height: 40px;
  color: #ff4081;
}

    .theme-color {
        color: #ff4081;
    }
    .btn-theme {
        background-color: #ff4081;
        color: #fff;
    }
    .btn-theme:hover {
        background-color: #e63971;
    }
    .login-container {
        max-width: 900px;
        margin: 50px auto;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        border-radius: 30px;
        overflow: hidden;
        background-color: white ;
    }
    .login-image {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ffd700;
    }
    .login-image img {
        width: 100%;
        height: 100%;       margin-bottom: 30px;       margin-bottom: 30px;       margin-bottom: 30px;       margin-bottom: 30px;       margin-bottom: 30px;       margin-bottom: 30px;       margin-bottom: 30px;
        object-fit: cover;
    }
    .login-form {
        padding: 40px;
        background-color: #fff;
    }
    @media (max-width: 767.98px) {
        .login-image {
            display: none;
        }

        .login-container {
max-width: 350px;
    }
    }
</style>
</head>
<body>

<div class="container login-container">
    <div class="row g-0">
        <!-- Image Column (Hidden on Mobile) -->
        <div class="col-md-6 login-image d-none d-md-block">
            <img src="./dashboard/img/pet-login.jpeg" alt="Welcome to PawMatch">
        </div>
        <!-- Login Form Column -->
        <div class="col-md-6">
            <br>
            <br>
            <div class="login-form">
                <div class="d-flex align-items-center">
                                <!-- Paw Icon as Logo -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="logo me-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6.5 12.5L3 14V7l3.5 1.5 3.5-1.5v7l-3.5-1.5-3.5 1.5z" />
                </svg>
                <a href="index.html" class="nav-link">

                <h1 class="site-title mb-0">Paw<span class="text-pink">Match</span></h1>

                </a>

        </div>
        <br>
         <!-- Display Error Message if Any -->
         <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

                <p>Login to find your perfect pet companion</p>
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <button type="submit" class="btn btn-theme">Login</button>
                        <a href="forgot_password.php" class="text-decoration-none theme-color">Forgot Password?</a>
                    </div>
                    <p>Don't have an account? <a href="register.php" class="theme-color">Sign Up</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Optional for Interactive Features) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
