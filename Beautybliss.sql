CREATE DATABASE beauty_bliss;


USE beauty_bliss;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    discount_price DECIMAL(10, 2),
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO products (name, price, discount_price, image) VALUES
('Cetaphil Moisturizer', 2000, 4000, 'images/moisturiser.jpeg'),
('Eyeshadow Palette', 500, 1500, 'images/eyeshadow.jpeg'),
('Lux Bodywash', 600, 1000, 'images/bodywash.jpeg'),
('Luxury Perfume', 1500, 2000, 'images/perfume.jpeg'),
('Body Lotion', 700, 1000, 'images/bodylotion.jpeg'),
('Sunscreen', 1500, 2000, 'images/sunscreen.jpeg');

CREATE TABLE purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    status ENUM('borrowed', 'received') DEFAULT 'borrowed',
    time_left INT DEFAULT 30,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO users(full_name,email,password) values('Dilushiya','dilu@gmail.com','abc@123'),('Saraniya','sarani@gmail.com','cba@321');