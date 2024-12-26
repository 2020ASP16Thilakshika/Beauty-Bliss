<?php
include 'db.php';

// Insert a new purchase
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_purchase'])) {
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];

    $stmt = $conn->prepare("INSERT INTO purchases (user_id, product_id) VALUES (:user_id, :product_id)");
    $stmt->execute(['user_id' => $user_id, 'product_id' => $product_id]);
    echo "Purchase added successfully!";
}

// Fetch user purchases
function getPurchases($conn) {
    $stmt = $conn->prepare("SELECT p.name, p.price, pu.status 
                            FROM purchases pu 
                            JOIN products p ON pu.product_id = p.id");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$purchases = getPurchases($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Purchases</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <a href="index.php" class="logo">Beauty<span>Bliss</span></a>
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="products.php">Products</a>
        <a href="purchases.php">Purchases</a>
        <a href="account.php">Account</a>
    </nav>
</header>

<section>
    <h1>Make a Purchase</h1>
    <form method="POST">
        <input type="number" name="user_id" placeholder="User ID" required>
        <input type="number" name="product_id" placeholder="Product ID" required>
        <button type="submit" name="add_purchase">Add Purchase</button>
    </form>

    <h1>Your Purchases</h1>
    <div class="purchases">
        <?php foreach ($purchases as $purchase): ?>
            <div class="purchase">
                <h3><?= $purchase['name'] ?></h3>
                <p>Price: $<?= $purchase['price'] ?></p>
                <p>Status: <?= $purchase['status'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
</body>
</html>
