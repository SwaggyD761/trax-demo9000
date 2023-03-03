<?php
// Check if email and password were submitted
if (isset($_POST['email']) && isset($_POST['password'])) {
  // Connect to database
  $host = "localhost";
  $username = "your_username";
  $password = "your_password";
  $database = "your_database";
  $conn = mysqli_connect($host, $username, $password, $database);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // Prepare SQL statement to select user from database
  $stmt = mysqli_prepare($conn, "SELECT * FROM verified_users WHERE email=?");
  mysqli_stmt_bind_param($stmt, "s", $_POST['email']);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  // Check if user exists
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    // Check if password matches
    if (password_verify($_POST['password'], $row['password'])) {
      echo "Welcome " . $row['name'] . "!";
    } else {
      echo "Invalid password or email!";
    }
  } else {
    echo "Invalid password or email!";
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: login.php");
  exit();
}
?>
