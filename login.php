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

 
    <form action="loginp.php" method="post">  
      <h2 style="color: aliceblue;">Login</h2>
      <label for="username">Username:
    </label>
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
