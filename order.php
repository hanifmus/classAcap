<?php
  include_once 'config.php';
  $productid = $_GET['id'];

  session_start();
  $userid = $_SESSION['id'];

  $conn = new Dbh();

  $pstmt = $conn->connect()->prepare("SELECT * FROM product WHERE id = :id");
  $pstmt->bindParam(":id",$productid);
  $pstmt->execute();
  $product = $pstmt->fetch();

  $ustmt = $conn->connect()->prepare("SELECT * FROM user WHERE id = :id");
  $ustmt->bindParam(":id",$userid);
  $ustmt->execute();
  $user = $ustmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    h1 {
      font-size: 30px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    .product-info {
      margin-bottom: 40px;
    }

    .product-info h2 {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #333;
    }

    .product-info p {
      color: #777;
      margin-bottom: 5px;
    }

    .payment-info {
      margin-top: 50px;
    }

    .payment-info h2 {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #333;
    }

    .payment-info p {
      color: #777;
      margin-bottom: 5px;
    }

    .btn-primary {
      display: block;
      width: 100%;
      padding: 12px;
      font-size: 16px;
      font-weight: bold;
      text-transform: uppercase;
      border: none;
      border-radius: 25px;
      background-color: #4CAF50;
      color: #fff;
      cursor: pointer;
    }

    .btn-primary:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Checkout</h1>
    <div class="product-info">
      <h2><?= $product['title']?></h2>
      <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <p>Price: <?= $product['price']?></p>
      <!-- Add more product information here -->
    </div>
    <div class="payment-info">
      <h2>Payment Details</h2>
      <p>User: <?= $user['username']?></p>
      <p>Payment Method: Credit Card</p>
      <!-- Add more payment information here -->
    </div>
    <button type="button" class="btn btn-primary">Place Order</button>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
