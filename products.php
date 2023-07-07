<?php
  include_once 'config.php';
  $dbh = new Dbh();
  $stmt = $dbh->connect()->prepare("SELECT * FROM product");
  $stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Display</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    .product {
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    .product img {
      max-width: 100%;
    }
    .product-title {
      font-weight: bold;
      margin-bottom: 5px;
    }
    .product-price {
      color: #888;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Product Display</h1>
    <?php if($stmt->rowCount() > 0) : ?>
      <?php while($row = $stmt->fetch()):?>
      <div class="row">
        <div class="col-md-4">
          <div class="product">
            <img src="product-img/<?= $row['imageUrl']?>" alt="Product Image">
            <h2 class="product-title"><?= $row['title']?></h2>
            <p class="product-price"><?= $row['price']?></p>
            <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In euismod tristique luctus.</p>
            <a href="order.php?id=<?= $row['id']?>" class="btn btn-primary">Buy Now</a>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <p>No Data found</p>
    <?php endif;?>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
