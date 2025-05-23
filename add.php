<?php
function add($name, $prix, $categorie)
{
    $sql = "INSERT INTO products (name, category, price) VALUES (:name, :category, :price)";
    $db = getDBConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':category', $categorie, PDO::PARAM_STR);
    $stmt->bindParam(':price', $prix, PDO::PARAM_STR);
    $stmt->execute();
    $product = [
        "id" => $db->lastInsertId(),
        "name" => $name,
        "category" => $categorie,
        "price" => $prix
    ];
    $db = null; // Close the database connection
    if ($product) {
        echo json_encode($product);
    } else {
        echo json_encode([]);
    }
}
