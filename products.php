<?php
include 'db.php';

// Insert a new product
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $discount_price = $_POST['discount_price'];
    $image = $_POST['image'];

    $stmt = $conn->prepare("INSERT INTO products (name, price, discount_price, image) VALUES (:name, :price, :discount_price, :image)");
    $stmt->execute([
        'name' => $name,
        'price' => $price,
        'discount_price' => $discount_price,
        'image' => $image,
    ]);
    echo "Product added successfully!";
}

// Fetch all products
function getProducts($conn) {
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$products = getProducts($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
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
    <h1>Add New Product</h1>
    <form method="POST">
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="number" name="price" placeholder="Price" required>
        <input type="number" name="discount_price" placeholder="Discount Price">
        <input type="text" name="image" placeholder="Image URL">
        <button type="submit" name="add_product">Add Product</button>
    </form>

    <h1>All Products</h1>
    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                <h3><?= $product['name'] ?></h3>
                <p>Price: $<?= $product['price'] ?></p>
                <p>Discounted Price: $<?= $product['discount_price'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
</body>
</html>
