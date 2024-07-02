<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xiaomi Brasil - Produtos</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <div class="logo">
      <h1>Xiaomi Brasil</h1>
    </div>
    <br>
  </header>

  <main>
    <section class="featured-products">
      <h2>Fique por Dentro das Novidades na Era da Tecnologia!</h2>
      <div class="grid-container">

        <?php
          // Include database connection and functions (replace with your actual file paths)
          include "security/connect.php";
          include "security/function.php";

          // Call function to get products from database
          $products = getProducts($conn);

          // Loop through each product in the results
          if ($products) {
            foreach ($products as $product) {
              // Display product information in a card structure
              echo "<div class='product-card'>";
              echo "  <img src='" . $product['productImage'] . "' alt='" . $product['productName'] . "'>";
              echo "  <h3>" . $product['productName'] . "</h3>";
              echo "  <p>" . substr($product['productDescription'], 0) . "</p>";
              // Optionally add a link to a product details page
              // echo "  <a href='product-details.php?id=" . $product['id'] . "'>Ver Mais</a>";
              echo "</div>";
            }
          } else {
            echo "<p>Nenhum produto encontrado.</p>";
          }
          
          // Close database connection
          $conn->close();
        ?>

      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2024 Xiaomi Products Ltda.</p>
    <br>
  </footer>
</body>
</html>
