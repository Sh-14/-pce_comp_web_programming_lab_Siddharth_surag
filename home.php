<?php
session_start();  // Start session if not already started

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}
?>
<?php
// Include connection script
require_once('connection.php');

// Rest of your script using $conn for database operations
?>
<?php




// Get user ID from session
$user_id = $_SESSION['user_id'];

// Fetch user data based on user ID
$sql = "SELECT username FROM login WHERE id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();  // Get user data as an associative array
    $username = $user['username'];  // Extract username from data
} else {
    // Handle potential error (user ID not found)
    echo "User data not found.";
}

$conn->close();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        .navbar {
            background-color: #f1f1f1;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            text-decoration: none;
            color: black;
            padding: 8px 16px;
            border: 1px solid #ddd;
            margin-right: 10px;
        }

        .navbar a.active {
            background-color: #ddd;
        }

        .navbar a:hover {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a class="active" href="#">Home</a>
        <a href="#">Profile</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="logout.php">Logout</a>
        <?php endif; ?>
    </div>

    <h1>Welcome, <?php echo $username; ?>!</h1> </body>

</body>
</html>