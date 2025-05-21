<?php
function getAll()
{
    $db = getDBConnexion();
    $sql = "SELECT * FROM products";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $db = null; // Close the database connection
    if ($products) {
        echo json_encode($products);
    } else {
        echo json_encode([]);
    }
}
