<?php
include 'db.php';

$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
		<a href="index.html" class="logo">Beauty<span>Bliss</span></a>
		
		<nav class="navbar">
			<a href="index.php">home</a>
			<a href="products.php">products</a>
			<a href="purchases.php">purchases</a>
			<a href="account.php">account</a>
       </nav>
       
	</header>
	<section class="products" id="products">
		<h1 class="heading">latest <span>products</span></h1>
		<div class="box-container">
			<div class="box">
			<span class="discount">-10%</span>
			<div class="image">
				<img src="images/moisturiser.jpeg" alt="">
				<div class="icons">
					<a href="#" class="cart-btn">add to cart</a>
				</div>
			</div>
			<div class="content">
				<h3>Cetaphil moisturiser</h3>
				<div class="price">LKR 2000 <span>LKR 4000</span></div>
				</div>
			</div>
			<div class="box">
			<span class="discount">-20%</span>
			<div class="image">
				<img src="images/eyeshadow.jpeg" alt="">
				<div class="icons">
					<a href="#" class="cart-btn">add to cart</a>
				</div>
			</div>
			<div class="content">
				<h3>Eyeshadow palate</h3>
				<div class="price">LKR 500 <span>LKR 1500</span></div>
				</div>
			</div>
			<div class="box">
			<span class="discount">-10%</span>
			<div class="image">
				<img src="images/bodywash.jpeg" alt="">
				<div class="icons">
					<a href="#" class="cart-btn">add to cart</a>
				</div>
			</div>
			<div class="content">
				<h3>Lux bodywash</h3>
				<div class="price">LKR 600 <span>LKR 1000</span></div>
				</div>
			</div>
			<div class="box">
			<span class="discount">-30%</span>
			<div class="image">
				<img src="images/perfume.jpeg" alt="">
				<div class="icons">
					<a href="#" class="cart-btn">add to cart</a>
				</div>
			</div>
			<div class="content">
				<h3>Luxury Perfume</h3>
				<div class="price">LKR 1500 <span>LKR 2000</span></div>
				</div>
			</div>
			<div class="box">
			<span class="discount">-20%</span>
			<div class="image">
				<img src="images/bodylotion.jpeg" alt="">
				<div class="icons">
					<a href="#" class="cart-btn">add to cart</a>
				</div>
			</div>
			<div class="content">
				<h3>Body lotion</h3>
				<div class="price">LKR 700 <span>LKR 1000</span></div>
				</div>
			</div>
			<div class="box">
			<span class="discount">-10%</span>
			<div class="image">
				<img src="images/Sunscreen.jpeg" alt="">
				<div class="icons">
					<a href="#" class="cart-btn">add to cart</a>
				</div>
			</div>
			<div class="content">
				<h3>Sunscreen</h3>
				<div class="price">LKR 1500 <span>LKR 2000</span></div>
				</div>
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