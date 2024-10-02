<?php
session_start();
include("connect.php");

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Access the username from the query parameter
$username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : "Guest";

$query = "SELECT * FROM songs WHERE language = 'Telugu'";
$songs_result = $conn->query($query);
if (!$songs_result) {
    die("Error fetching songs: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telugu Songs</title>
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
            background-color: #73D7FF;
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
        .video-player {
            display: none;
            margin-top: 30px;
            text-align: center;
            margin-left: 30px;
            margin-right: 30px;
        }
        .video-player video {
            width: 100%;
            max-width: 900px;
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
<a href="dashboard.php" class="back-btn">&larr; Back</a>
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

    <div class="container">
        <h1 class="text-center my-4">TOLLYWOOD</h1>
        <!-- Songs List -->
        <div class="row songs-list">
            <?php while ($song = $songs_result->fetch_assoc()): ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="<?php echo $song['image_url']; ?>" class="card-img-top" alt="Song Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($song['title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($song['artist']); ?></p>
                            <button class="btn btn-primary play-song" data-video="<?php echo htmlspecialchars($song['video_url']); ?>">Play</button>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

         <!-- Video Player -->
         <div class="video-player" id="video-player">
            <h3>Now Playing:</h3>
            <video id="song-video" width="900" controls>
                <source src="" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>

    <script>
        // Handle play button click
        document.querySelectorAll('.play-song').forEach(button => {
            button.addEventListener('click', function() {
                var videoUrl = this.getAttribute('data-video');
                var videoPlayer = document.getElementById('video-player');
                var videoElement = document.getElementById('song-video');
                videoElement.src = videoUrl;
                videoPlayer.style.display = 'block';
            });
        });

        // Toggle profile menu
        document.getElementById('profile-icon').addEventListener('click', function() {
            var menu = document.getElementById('profile-menu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        });
    </script>
</body>
</html>
