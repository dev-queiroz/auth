<?php

function getProducts($conn) {
    $sql = "SELECT productName, productImage, productDescription FROM products";
  
    $result = $conn->query($sql);
    if (!$result) {
      die("Error retrieving products: " . $conn->error);
    }
  
    $products = [];
  
    while ($row = $result->fetch_assoc()) {
      $products[] = $row;
    }
  
    $result->close();
    return $products;
  }
  