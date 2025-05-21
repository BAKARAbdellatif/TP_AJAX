<?php
require_once 'dbConnexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == "add") {
        require_once 'add.php';
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        if (isset($name) && isset($price) && isset($category)) {
            add($name, $price, $category);
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Invalid input"]);
        }
    } else if ($_POST['action'] == "delete") {
        require_once 'delete.php';
        $id = $_POST['id'];
        if (isset($id) && is_numeric($id)) {
            delete($id);
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Invalid ID"]);
        }
    } else if ($_POST['action'] == "update") {
        require_once 'update.php';
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        if (isset($id) && is_numeric($id) && isset($name) && isset($price) && isset($category)) {
            update($id, $name, $price, $category);
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Invalid input"]);
        }
    } else if ($_POST['action'] == 'filtrer') {
        require_once 'filtrer.php';
        $params = [];
        if (isset($_POST['name']) && $_POST['name'] != '') {
            $params['name LIKE ?'] = $_POST['name'] . "%";
        }
        if (isset($_POST['min_price']) && $_POST['min_price'] != '') {
            $params['price >= ?'] = $_POST['min_price'];
        }
        if (isset($_POST['max_price']) && $_POST['max_price'] != '') {
            $params['price <= ?'] = $_POST['max_price'];
        }
        filtrer($params);
    } else {
        http_response_code(400);
        echo json_encode(["error" => "Invalid action"]);
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['action'] == "get") {
        require_once 'get.php';
        $id = $_GET['id'];
        if (isset($id) && is_numeric($id)) {
            get($id);
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Invalid ID"]);
        }
    } else if ($_GET['action'] == "getAll") {
        require_once 'getAll.php';
        getAll();
    }
} else {
    http_response_code(405);
}
