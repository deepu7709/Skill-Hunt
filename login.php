<?php
session_start();

 $localhost="localhost";
 $username = "DEEPIKA";
 $password = "DEEPIKA";
 $dbname = "treasure";
$conn = mysqli_connect($localhost, $username,$password,$dbname);
// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get email and password from form
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $_SESSION['email']=$email;
    // Check if connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Check if email and password are valid
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
    // Check if user exists
    if (mysqli_num_rows($result)> 0) {
        // Set session variable and redirect to dashboard
        $_SESSION['email'] = $email;
        echo "user exists";
        header("Location:intro.php");
    } else {
        // Display error message
        echo "<p>Invalid email or password</p>";
        echo "get registered first";
        header("Location:login.html");
    }
    
    // Close database connection
    mysqli_close($conn);

   
}
?>