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

<br>


<!--  hotel.php -->
<?php 
// Initialize variables with default values
$check_in_date = '';
$check_out_date = '';
$room_type = '';
$guests = '';
$errors = array();

if (isset($_POST['submit'])) {
  // Retrieve form data
  // Sanitize input data based on the form's input names

  $check_in_date = htmlspecialchars(strip_tags($_POST['check-in-date']));
  $check_out_date = htmlspecialchars(strip_tags($_POST['check-out-date']));
  $room_type = htmlspecialchars(strip_tags($_POST['room-type']));
  $guests = htmlspecialchars(strip_tags($_POST['guests']));
  $errors = array();

  if (empty($check_in_date) || empty($check_out_date) || empty($room_type) || empty($guests)) {
      $errors[] = "All fields are required!";
  }

  if (!is_numeric($guests) || $guests < 1 || $guests > 10) {
      $errors[] = "Invalid number of guests! The number must be between 1 and 10.";
  }
  }

  if (empty($errors)) {
      // Calculate the number of nights
      $check_in = new DateTime($check_in_date);
      $check_out = new DateTime($check_out_date);
      $interval = $check_in->diff($check_out);
      $nights = $interval->days;

      if ($nights <= 0) {
          $errors[] = "Check-out date must be after check-in date!";
      } else {
          // Calculate total cost based on room type and number of nights
          $room_prices = [
              'single' => 30,
              'double' => 60,
              'family' => 120,
              'suite' => 150
          ];

          $total_cost = $room_prices[$room_type] * $nights;

          // Display booking details
          echo "<div class='success'>";
          echo "<h3>Booking Details</h3>";
          echo "<p>Check-in Date: $check_in_date</p>";
          echo "<p>Check-out Date: $check_out_date</p>";
          echo "<p>Room Type: $room_type</p>";
          echo "<p>Number of Guests: $guests</p>";
          echo "<p>Total Cost: £$total_cost</p>";
          echo "</div>";

          // Database connection
          $conn = new mysqli('localhost', 'root', '', 'rza_db');

          if ($conn->connect_error) {
              die("<p style='color:red;'>Connection failed: " . $conn->connect_error . "</p>");
          }

          $sql = "INSERT INTO users (payment_id, check_in_date, check_out_date, room_type, guests, nights, total_cost) VALUES (?, ?, ?, ?, ?, ?, ?)";
          $stmt = $conn->prepare($sql);
          if ($stmt) {
              $payment_id = uniqid(); // Generate a unique payment ID
              $stmt->bind_param("sssssid", $payment_id, $check_in_date, $check_out_date, $room_type, $guests, $nights, $total_cost);
              $stmt->execute();
              echo "<div class='success'>Booking successful! Thank you for choosing us!</div>";
              $stmt->close();
          } else {
              echo "<p style='color:red;'>Something went wrong! Please try again later or contact support.</p>";
              error_log("Database error: " . $conn->error); // Log the error for debugging
          }
          $conn->close();
      }
  }

  if (!empty($errors)) {
      foreach ($errors as $error) {
          echo "<p style='color:red;'>$error</p>";
      }
  }

?>


<!-- HOTEL BOOKING SECTION -->
  <section class="hotel-page">
    <div class="title">
        <h1>Book Your Hotel</h1>
    </div>


    <div class="hotels">
        <form action = "hotel-payment.php" method="POST">
            <label for="check-in-date">Check-in Date:</label>
            <input type="date" id="check-in-date" name="check-in-date">

            <label for="check-out-date">Check-out Date:</label>
            <input type="date" id="check-out-date" name="check-out-date">
            
            <label for="room-type">Select Room Type:</label>
            <select id="room-type" name="room-type">
              <option value="single">Single Room - £30 per night</option>
              <option value="double">Double Room - £60 per night</option>
              <option value="family">Family Room - £120 per night</option>
              <option value="suite">Suite Room - £150 per night</option>
            </select>
            <label for="guests">Number of Guests:</label>
            <input type="number" id="guests" name="guests" min="1" max="10" value="1">
            <br>
            <button type="submit" class="btn">Book Now</button>
        </form>
    </div>
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