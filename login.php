<?php
// Database connection details (replace with your actual credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

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
        $sql = "SELECT * FROM login WHERE username = '$username'";
        echo $sql;
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();  // Get user data as an associative array

            // Verify password using password_verify (requires password_hash in registration)
            if (password_verify($password, $user['password'])) {
                // Login successful (redirect or start session)
                session_start();  // Start session if not already started
                $_SESSION['user_id'] = $user['id'];  // Store user ID in session
                header("Location: home.php");  // Replace with your home page or further actions
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

</head>
<style>
 body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      
      
  }
  
  form {
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4); 
      padding: 10px;
      border-radius: 2px;
      box-shadow: 0 0 10px rgba(49, 17, 17, 0.1);

  }
  
  input {
      width:100%;
      padding: 10px;
      margin-bottom: 10px;
      box-sizing: border-box;
      background-color: rgba(255, 255, 255, 0.575); 
  }
  
  
  button {
      background-color: #6a1b9a;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
  }
  </style>
<body style="background-image:url(./Images/login.jpg) "
      style="height: 100%;" 
      style="background-position: center;"
      style="background-repeat: no-repeat;"
      style="background-size: cover; " 
 
  
        >
         
        <div class="bg"></div>

    <form>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">  
      <h2 style="color: aliceblue;">Login</h2>
      <label for="username">Username:
      <style="color: aliceblue></label>
       <input type="text" id="username" name="username" required>


        <br> <br>

        <label for="password"
        style="color: aliceblue;">Password:</label>
        <input type="password" id="password" name="password" required>
        <br> <br>
        <button type="submit">Login</button>   
    </form>
    </body>

</html>
