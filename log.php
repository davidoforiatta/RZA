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

 <div class="container">
<form action="log.php" method="post">
<?php
 if (isset($_POST["login"])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
     require_once "database.php";
     if ($conn) {
         $sql = "SELECT * FROM users WHERE email = ?";
         $stmt = mysqli_prepare($conn, $sql);
         mysqli_stmt_bind_param($stmt, "s", $email);
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
         $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
         if ($user) {
             if (password_verify($password, $user['password'])) {
                 mysqli_close($conn);
                 header("Location: logged.php");
                 die();
             } else {
                 echo "<div class='failure'> Password does not match </div>";
             }
         } else {
             echo "<div class='failure'> Email does not match </div>";
         }
         mysqli_close($conn);
     } else {
         echo "<div class='failure'> Database connection failed </div>";
     }
        
      }
?>

    <div class="login">
        
        <h1> Login to your account</h1>
        <label for ="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <br>
        <label for ="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <p> Dont have an account? <a href="signup.php"> Click Here</a> </p>
        <button type="submit" class="btn" name="login">Log In</button>
     </div>    
    </div>
</form>
</section>

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
  
</body>
</html>
