<?php

// Get the form data
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$number = $_POST['number'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Connect to the database
$host = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if email already exists in the database
$sql = "SELECT * FROM verified_users WHERE email = '$email' OR signed_up_users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Email already exists, return an error message to the user
    echo "Email already exists in our database. Please try again.";
} else {
    // Email doesn't exist, insert the user data into the database
    $sql = "INSERT INTO signed_up_users (name, surname, email, number, password) VALUES ('$name', '$surname', '$email', '$number', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        // User data inserted successfully, send verification email
        $to = $email;
        $subject = "Verify your email";
        $message = "Thank you for signing up. Please click on the link below to verify your email address.\n\nhttp://example.com/verify.php?email=".$email;
        $headers = "From: webmaster@example.com";
        
        mail($to, $subject, $message, $headers);
        
        // Redirect the user to the separate_songs page
        header("Location: separate_songs.php");
        exit();
    } else {
        // Error inserting user data into the database
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();

?>
