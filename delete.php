<?php
function delete($id)
{
    $sql = "DELETE FROM products WHERE id = :id";
    $db = getDBConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    // Close the database connection
    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
        $db = null;
    } else {
        echo json_encode(["error" => "Failed to delete product"]);
    }
}
