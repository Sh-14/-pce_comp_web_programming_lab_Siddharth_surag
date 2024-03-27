<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
}

.container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 8px;
}

h1 {
    text-align: center;
}

p {
    text-align: center;
    margin-bottom: 20px;
}

hr {
    margin: 20px 0;
    border: none;
    border-top: 1px solid #ccc;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="checkbox"] {
    margin-bottom: 15px;
}

.clearfix::after {
    content: "";
    display: table;
    clear: both;
}

.cancel-btn,
.signup-btn {
    width: 49%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.cancel-btn {
    background-color: #f44336;
    float: left;
}

.signup-btn {
    background-color: #4caf50;
    float: right;
}

.cancel-btn:hover,
.signup-btn:hover {
    background-color: #555;
    color: #fff;
}
</style>
</head>
<body>
    <h1>Register</h1>
    <?php
        // Display error message (if any)
        if (isset($_GET['error'])) {
            echo "<p style='color: red;'>".$_GET['error']."</p>";
        }
    ?>
    <form action="register_process.php" method="post">
    <div class="container">
            <h1>Sign Up</h1>
            <p>Ready to explore space? Create your account now.</p>
            <hr>
    
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>
    
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <div class="clearfix">
                <button type="button" class="cancel-btn"><a href="index.html">cancel</a>  </button>
                <button type="submit" class="signup-btn">Sign Up</button>
            </div>
        </div>
    </form>
</body>
</html>