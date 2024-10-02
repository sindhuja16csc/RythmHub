<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login & Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            background-image: url('login image.jpg');
            background-size: cover;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            margin: 0 auto;
        }
        .toggle-btn {
            margin-bottom: 20px;
        }
        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 20px;
            text-decoration: none;
            color: blueviolet;
            font-weight: bold;
        }
        .back-btn:hover {
            text-decoration: underline;
        }       
    </style>
</head>
<body>
    <a href="index.html" class="back-btn">&larr; Back</a>
    <div class="container">
        <div class="form-container mt-5">
            <div class="toggle-btn">
                <button id="login-btn" class="btn btn-primary">Login</button>
                <button id="signup-btn" class="btn btn-secondary">Signup</button>
            </div>
            <!-- Login Form -->
            <form id="login-form" action="register.php" method="POST">
                <h1>Login</h1>
                <div class="mb-3">
                    <label for="email-login" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email-login" name="email" placeholder="Enter email" required>
                </div>
                <div class="mb-3">
                    <label for="password-login" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password-login" name="password" placeholder="Enter password" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success" name="login">Login</button>
                    <button type="reset" class="btn btn-danger">Clear</button>
                </div>
            </form>
            <!-- Signup Form -->
            <form id="signup-form" action="register.php" method="POST" style="display:none;">
                <h1>Signup</h1>
                <div class="mb-3">
                    <label for="username-signup" class="form-label">User Name:</label>
                    <input type="text" class="form-control" id="username-signup" name="username" placeholder="Enter name" required>
                </div>
                <div class="mb-3">
                    <label for="password-signup" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password-signup" name="password" placeholder="Enter password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender:</label><br>
                    <input type="radio" name="gender" value="male" required> Male
                    <input type="radio" name="gender" value="female" required> Female
                </div>
                <div class="mb-3">
                    <label for="mobile-signup" class="form-label">Mobile No:</label>
                    <input type="tel" class="form-control" id="mobile-signup" name="mobileNo" placeholder="Enter mobile no" required>
                </div>
                <div class="mb-3">
                    <label for="email-signup" class="form-label">Email ID:</label>
                    <input type="email" class="form-control" id="email-signup" name="email" placeholder="Enter email id" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success" name="signup">Signup</button>
                    <button type="reset" class="btn btn-danger">Clear</button>
                </div>
            </form>
        </div>
    </div>
    <script src="toggleForms.js"></script>
</body>
</html>
