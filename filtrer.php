<?php


function filtrer($params = [])
{
    $db = getDBConnexion();
    if (sizeof($params) == 0) {
        $sql = "select * FROM products";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    } else {
        $keys = array_keys($params);
        $values = array_values($params);

        $sql = join(" AND ", $keys);
        $sql = "SELECT * FROM products WHERE $sql";
        $stmt = $db->prepare($sql);

        $stmt->execute($values);
    }

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $db = null; // Close the database connection
    if ($products) {
        echo json_encode($products);
    } else {
        echo json_encode([]);
    }
}
