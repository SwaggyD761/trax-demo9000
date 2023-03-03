<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Login_Scripts/css/loginStyle.css">
    <style>
      /* CSS Code for Password Hide/Unhide Functionality */
      .password-icon {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <h1>Login</h1>
    <form action="Login_Scripts/php/checkValidUser.php" method="POST">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <span class="password-icon" onclick="togglePasswordVisibility()">
        <img src="eye.svg" alt="Password Visibility Toggle" width="20">
      </span><br><br>
      <input type="submit" value="Login">
    </form>
    <script>
      // JavaScript Code for Password Hide/Unhide Functionality
      function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var passwordIcon = document.querySelector(".password-icon img");
        if (passwordInput.type === "password") {
          passwordInput.type = "text";
          passwordIcon.src = "eye-slash.svg";
          passwordIcon.alt = "Password Visibility Toggle (Hidden)";
        } else {
          passwordInput.type = "password";
          passwordIcon.src = "eye.svg";
          passwordIcon.alt = "Password Visibility Toggle";
        }
      }
    </script>
  </body>
</html>
