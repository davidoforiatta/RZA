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
    <br>


<!-- PAYMENT SECTION -->
<section class="payment-page">
    <div class="title">
        <h1> Ticket Payment Page </h1>
    </div>

    <div class="payment">
    <form action="ticket-payment.php" method="POST">
    
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="card-number">Card Number:</label>
        <input type="text" id="card-number" name="card-number" required>

        <label for="expiry-date">Expiry Date:</label>
        <input type="text" id="expiry-date" name="expiry-date" required>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required>

        <button type="submit">Submit Payment</button>
    </form>
</div>


<!-- CSS CODE FOR PAYMENT SECTION -->
<style>
    .payment-page {
  max-width: 600px;
  margin: 50px auto;
  background: #ffffff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}


.payment-page .title h1 {
  text-align: center;
  color: #333;
  margin-bottom: 20px;
}

.payment form {
  display: flex;
  flex-direction: column;
}

.payment form label {
  margin-bottom: 8px;
  font-weight: bold;
  color: #555;
}

.payment form input {
  margin-bottom: 15px;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 100%;
  box-sizing: border-box;
}

.payment form input:focus {
  border-color: #007BFF;
  outline: none;
}

.payment form button {
  background-color: #007BFF;
  color: #fff;
  padding: 12px;
  font-size: 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.payment form button:hover {
  background-color: #0056b3;
}
</style>


</section>

</body>
</html>
