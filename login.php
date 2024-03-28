<?php
// Database connection details (replace with your actual credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "astro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Check if login form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Escape user input to prevent SQL injection
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
    // Check if username and password are provided
    if (empty($username) || empty($password)) {
        $error = "Please enter your username and password.";
    } else {
        // Fetch user data based on username
        $sql = "SELECT * FROM details WHERE email= '$username'";

        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();  // Get user data as an associative array
            echo $user;

            // Verify password using password_verify (requires password_hash in registration)
            if (password_verify($password, $user['password'])) {
                // Login successful (redirect or start session)
                session_start();  // Start session if not already started
                $_SESSION['user_id'] = $user['id'];  // Store user ID in session
                header("Location: index.html");  // Replace with your home page or further actions
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Invalid username or password.";
        }
    }
}

$conn->close();
?>
