<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Sign_Up_Scripts/css/sign_upStyle.css">
    <style>
      /* CSS styling for the page */
      body {
        font-family: Arial, sans-serif;
      }
      
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Sign Up</h1>
      <form id="signup-form" action="Sign_Up_Scripts/php/registerUser.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="number">Phone Number:</label>
        <input type="tel" id="number" name="number" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm-password" required>

        <div id="password-error" class="error"></div>

        <input type="submit" value="Sign Up">
      </form>
    </div>
    <script src="register_user.js"></script>
  </body>
</html>
