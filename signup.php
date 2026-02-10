<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riget Zoo Adventures</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<section class="header"> 
<nav class="navbar">
    <!-- LOGO -->
    <div class="logo">
    <a href="index.php"><img src="images/Copilot_20260122_145735.png" alt="Riget Zoo Adventures Logo"></a>
    </div>

    <!-- NAV LINKS --> 
    <ul class="links">
        <li><a href="index.php">Home</a></li>
        <li><a href="tickets.php">Tickets</a></li>
        <li><a href="hotel.php">Hotel</a></li>
        <li><a href="log.php">Log In</a></li>
    </ul>
</nav>


<div class="banner">
    <div class="banner-text">
      <h1>Special 20% of Foods and Hotels when visitng with 5 people or more!</h1>
    </div>
  </div> 

<div class="signup-form">

<?php 
if (isset($_POST['SUBMIT'])) {
    // Retrieve form data
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    $errors = array();

    if (empty($title) || empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
        $errors[] = "All fields are required!";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format!";
    }

    if (!preg_match("/^\+?[0-9]{10,15}$/", $phone)) {
        $errors[] = "Invalid phone number format!";
    }

    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long!";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match!";
    }

    if (empty($errors)) {
        // Hash the password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'rza_db');

        // Check connection
        if ($conn->connect_error) {
            die("<p style='color:red;'>Connection failed: " . $conn->connect_error . "</p>");
        } else {
            $sql = "INSERT INTO users (title, first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("ssssss", $title, $first_name, $last_name, $email, $phone, $passwordHash);
                $stmt->execute();
                echo "<div class='success'>Account created successfully for $first_name $last_name!</div>";
                $stmt->close();
            } else {
                echo "<p style='color:red;'>Something went wrong!</p>";
            }
        }
        $conn->close();
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>

<form action="signup.php" method="post">
    <div class="sign-up">
    <h1> Create an RZA Account</h1>
    <label for = "title">Title:</label>
    <select id="title" name="title" required>
        <option value="choose">Please Choose</option>
        <option value="mr">Mr.</option>
        <option value="mrs">Mrs.</option>
        <option value="ms">Ms.</option>
        <option value="dr">Dr.</option>
    </select>
<br> 
<br>  
    <label for = "first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" placeholder="First Name" required>    
<br>
<br>
    <label for = "last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>  
<br>
<br>
    <label for = "email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Email" required>
<br>    
<br>    
    <label for = "phone">Phone Number:</label>
    <input type="phone" id="phone" name="phone" placeholder="+44123456789" required>
<br>
<br>
<label for = "password">Password:</label>
<input type="password" id="password" name="password" placeholder="Password" required>
<br>
<br>
    <label for ="confirm-password">Confirm Password:</label>
    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
<br>
<br>
<p> Already have an account?  <a href="log.php"> Click Here</a></p>
    <button type="submit" class="btn" name="SUBMIT">Sign Up</button>
    
    
    </div>
</form>
</div>
</div>

<footer>
    <div class="useful">
      <h1> Useful Links </h1>
      <p><a href="tickets.php">Book Tickets</a></p>
      <p><a href="index.php">Back to website</a></p>
      <p><a href="accessibility.php">Accessibility</a></p>
      <p><a href="support.php">Support</a></p>
      <p><a href="zoo-map.php">Zoo Map</a></p>
      <p>© 2024 Riget Zoo Adventures. All rights reserved.</p>
    </div>
  
  <div class="terms">
      <h1> Terms & Conditions </h1>
      <p><a href="copyright.php">Copyright</a></p>
      <p><a href="support.php">Support</a></p>
      <p><a href="privacy.php">Privacy Policy</a></p>
      <p><a href="terms.php">Terms of Service</a></p>
    </div>
  
    <div class="socials">
      <h1> Follow Us </h1>
      <p><a href="https://facebook.com">Facebook</a></p>
      <p><a href="https://instagram.com">Instagram</a></p>
      <p><a href="https://twitter.com">Twitter</a></p>
      <p><a href="https://tiktok.com">TikTok</a></p>
    </div>    
  
    
  </footer>