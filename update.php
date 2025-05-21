<?php
function update()
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $sql = "UPDATE products SET name = :name, price = :price, category = :category WHERE id = :id";
    $db = getDBConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);

    $produit = [
        "id" => $id,
        "name" => $name,
        "price" => $price,
        "category" => $category
    ];

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "produit" => $produit]);
    } else {
        echo json_encode(["error" => "Failed to update product"]);
    }

    $db = null; // Close the database connection
}
