<?php
include 'db.php';


$user_id = 1;


$borrowedItems = $conn->prepare("SELECT products.name FROM purchases 
                                 JOIN products ON purchases.product_id = products.id 
                                 WHERE user_id = :user_id AND status = 'borrowed'");
$borrowedItems->execute(['user_id' => $user_id]);

$receivedItems = $conn->prepare("SELECT products.name, purchases.time_left FROM purchases 
                                 JOIN products ON purchases.product_id = products.id 
                                 WHERE user_id = :user_id AND status = 'received'");
$receivedItems->execute(['user_id' => $user_id]);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Beauty bliss website</title>
	 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
	<header>
		<input type="checkbox" name="" id="toggler">
		<label for="toggler" class="fas fa-bars"></label>
		<a href="index.php" class="logo">Beauty<span>Bliss</span></a>
		
		<nav class="navbar">
			<a href="index.php">home</a>
			<a href="products.php">products</a>
			<a href="purchases.php">purchases</a>
			<a href="account.php">account</a>
       </nav>
       
	</header>
	<section class="purchases" id="purchases">
		<h1 class="heading">Purchases</h1>
		<div class="container">
        <div class="section">
            <h1>Borrowed (Not Received)</h1>
            <ul>
                <li>
                    <h2>Hydrating Moisturizer</h2>
                    <button class="received-btn">Received</button>
                </li>
                <li>
                    <h2>Vitamin C Serum</h2>
                    <button class="received-btn">Received</button>
                </li>
            </ul>
        </div>
        <div class="section">
           <h1>Received Items</h1>
            <ul>
                <li>
                    <h2>Hydrating Moisturizer</h2>
                    <h2><span class="time-left">Time Left: 15 days</span></h2>
                    <button class="action-btn">Extend Refilling</button>
                    <button class="action-btn">Buy Earlier</button>
                </li>
                <li>
                    <h2>Vitamin C Serum</h2>
                    <h2><span class="time-left">Time Left: 30 days</span></h2>
                    <button class="action-btn">Extend Refilling</button>
                    <button class="action-btn">Buy Earlier</button>
                </li>
            </ul>
        </div>
    </div>
	</section>
	<section class="info_section layout_padding1-top">
    <footer class="footer_section">
	  <div class="container">
	    <p>&copy; 2024 Beauty Bliss. All Rights Reserved.</p>
      </div>
     </footer>
  </section>


</body>
</html>