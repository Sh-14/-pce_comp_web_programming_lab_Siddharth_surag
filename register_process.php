<?php
// Database connection details (replace with your actual credentials)
$servername = "sql208.infinityfree.com";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user input to prevent SQL injection
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Hash the password before storing
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if user already exists
$sql = "SELECT * FROM login WHERE username = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User already exists
    header("Location: http://dtest.lovestoblog.com/the_main/registration.php?error=Email already exists.");
    exit;
} else {
    // Insert user data if not existing
    $sql = "INSERT INTO login (username, password) VALUES ('$email', '$hashed_password')";
    if ($conn->query($sql) === TRUE) {
        // Registration successful (redirect to login or success page)
        header("Location: success.php");  // Replace with your success page
    } else {
        // Registration failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>