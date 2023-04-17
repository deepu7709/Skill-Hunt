<?php
$conn = mysqli_connect('localhost', 'DEEPIKA', 'DEEPIKA', 'treasure');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // Retrieve the email and password from the form data
  $email = $_POST['email'];
  $password = $_POST['password'];
  // Validate the email address using PHP's built-in filter_var() function
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Invalid email address');
  }
  
  // Validate the password to ensure it meets the requirements
  if (strlen($password) < 8) {
    die('Password must be at least 8 characters long');
  }
  
  // TODO: Store the email and password in a database or file

// Connect to the database
// $localhost="localhost";
// $username = "DEEPIKA";
// $password = "DEEPIKA";
// $dbname = "treasure";



// Escape user input to prevent SQL injection
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$username= mysqli_real_escape_string($conn, $_POST['username']);


// Prepare and execute SQL INSERT statement
$sql = "INSERT INTO user (email, password) VALUES ('$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
  
  // Redirect the user to a confirmation page
  header('Location: login.html');
  exit();
}
?>