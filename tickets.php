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



<section class="ticket-page">
    <div class="title">
        <h1>Book Your Tickets</h1>
    </div>


    <div class="tickets">
        <form action = "ticket-payment.php" method="POST">
            <label for="visit-date">Select Visit Date:</label>
            <input type="date" id="visit-date" name="visit-date">
            <br>
            <label for="ticket-time">Select Time:</label>
            <select id="ticket-time" name="ticket-time">
                <option value="Morning">10:00 AM</option>
                <option value="Afternoon">12:00 PM</option>
                <option value="Evening">14:00PM</option>
                <option value="Late">16:00PM</option>
            </select>

            <br> 
            <label for="ticket-type">Select Ticket Type:</label>
            <select id="ticket-type" name="ticket-type">
                <option value="kid">Kids - £5</option>
                <option value="junior">Junior - £10</option>
                <option value="adult">Adult - £20</option>
                <option value="senior">Senior - £15</option>
            </select>

            <br>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" max="10" value="1">
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
  
  
  
