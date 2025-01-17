<?php
session_start();


require_once "db.php"; 


$fullName = $email = $password = $confirmPassword = "";
$error = $successMessage = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        $fullName = trim($_POST['full_name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirm_password']);

        
        if (empty($fullName) || empty($email) || empty($password) || empty($confirmPassword)) {
            $error = "Please fill in all fields.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Please enter a valid email address.";
        } elseif ($password !== $confirmPassword) {
            $error = "Passwords do not match.";
        } else {
            
            $sql = "SELECT id FROM user WHERE email = ?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    $error = "An account with this email already exists.";
                } else {
                    
                    $sql = "INSERT INTO user (full_name, email, password) VALUES (?, ?, ?)";
                    if ($stmt = $conn->prepare($sql)) {
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 
                        $stmt->bind_param("sss", $fullName, $email, $hashedPassword);

                        if ($stmt->execute()) {
                            $successMessage = "Account created successfully! You can now log in.";
                        } else {
                            $error = "Something went wrong. Please try again later.";
                        }
                    }
                }
                $stmt->close();
            }
        }
    }
}
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
    <section class="account" id="account">
    <h1 class="heading">My <span>Account</span></h1>

        
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php elseif (!empty($successMessage)): ?>
            <div class="success"><?php echo $successMessage; ?></div>
        <?php endif; ?>
        
    
        <div class="login-container">
        
        <h2>Login to Your Account</h2>
        <form  method="POST" action="">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="login-btn"><a href="index.php" class="btn">Login</a></button>
        </form>
        <p class="signup-link">Don't have an account? <a href="#signup-container">Create one here</a></p>
    </div>
     <div class="signup-container">
        <h2>Create a New Account</h2>
        <form  method="POST" action="">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Create a password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" placeholder="Confirm your password" required>
            </div>
            <button type="submit" class="signup-btn">Create Account</button>
        </form>
        <p class="login-link">Already have an account? <a href="#">Login here</a></p>
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