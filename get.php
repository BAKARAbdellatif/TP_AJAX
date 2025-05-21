<?php
function get($id)
{
    $sql = "SELECT * FROM products WHERE id = :id";
    $db = getDBConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $db = null; // Close the database connection
    if ($product) {
        echo json_encode($product);
    } else {
        echo json_encode([]);
    }
}
