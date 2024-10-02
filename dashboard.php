<?php
session_start();
include("connect.php");

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

// Fetch user details
$query = $conn->prepare("SELECT username FROM users WHERE email = ?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();
$username = $user['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
        }
        .profile {
            position: absolute;
            top: 10px;
            right: 20px;
            text-align: center;
            z-index: 10;
        }
        .profile img {
            border-radius: 50%;
            width: 45px;
            height: 45px;
            cursor: pointer;
        }
        .profile-menu {
            display: none;
            position: fixed;
            top: 60px;
            right: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 20;
            padding: 10px;
        }
        .profile-menu a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }
        .profile-menu a:hover {
            background-color: #f1f1f1;
        }
        .logo {
            display: flex;
            align-items: center;
            margin-left: 10px;
        }
        .logo img {
            height: 50px;
        }
        .search-bar {
            margin-left: auto;
            margin-right: 20px;
            margin-top: 50px;
            width: 300px;
        }
        .card-img-top {
            width: 445px; /* Make the image fill the card horizontally */
            height: 100%;
            object-fit: cover;
        }
        .language-filter {
            margin-top: 45px;
        }
        .language-card {
            margin-bottom: 30px; /* Adds vertical space between cards */
            margin-left: 20px; /* Adds horizontal space between cards */
            cursor: pointer;
            transition: transform 0.3s;
        }
        .language-card:hover {
            transform: scale(1.05);
            color: #dc3545;
        }
        .back-btn {
            position: absolute;
            top: 100px;
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
    <!-- Logo and Search Bar -->
    <a href="index.html" class="back-btn">&larr; Back</a>
    <nav class="navbar navbar-light bg-light">
        <div class="logo">
            <img src="logo.png" alt="Logo">
            <h4 class="ms-3">RhythmHub</h4>
        </div>
        <form class="d-flex search-bar">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </nav>

    <div class="container">
        <div class="profile">
            <img src="profile.png" alt="Profile Icon" id="profile-icon">
            <div class="profile-menu" id="profile-menu">
                <p>Hi <?php echo htmlspecialchars($username); ?></p>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('profile-icon').addEventListener('click', function() {
            var menu = document.getElementById('profile-menu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        });
    </script>

    <!-- Language Filter as Cards -->
    <div class="row language-filter">
        <?php
        $languages = [
            ['lang' => 'Telugu', 'image' => 'teluguplaylist.jpeg'],
            ['lang' => 'Hindi', 'image' => 'hindi.jpeg'],
            ['lang' => 'Punjabi', 'image' => 'punjabi.jpeg'],
            ['lang' => 'English', 'image' => 'english.jpeg'],
            ['lang' => 'Tamil', 'image' => 'tamil.jpeg'],
            ['lang' => 'Malayalam', 'image' => 'malayalam.jpeg'],
            ['lang' => 'Kannada', 'image' => 'kanada.jpeg'],
            ['lang' => 'Private Songs', 'image' => 'privateSongs.jpeg'],
        ];

        foreach ($languages as $language) {
            echo '
                <div class="col-md-4 mb-3">
                    <div class="card language-card" onclick="window.location.href=\'' . strtolower($language['lang']) . '.php\'">
                        <img src="' . $language['image'] . '" class="card-img-top" alt="' . $language['lang'] . ' Songs">
                        <div class="card-body text-center">
                            <h5 class="card-title">' . $language['lang'] . '</h5>
                        </div>
                    </div>
                </div>
            ';
        }
        ?>
    </div>
</body>
</html>
