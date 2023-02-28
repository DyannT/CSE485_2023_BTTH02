<?php
require '../includes/database-connection.php';
require '../includes/functions.php';

// $id = $_GET['id'];
// $sql = "DELETE FROM `tacgia` WHERE `ma_tgia` = '" . $id . "'";
// $delete = pdo($pdo, $sql)->fetchAll();

// Sử dụng transaction

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $pdo->beginTransaction();
        $sql = "DELETE FROM `baiviet` WHERE `ma_tgia` = '".$id."'";
        $update = pdo($pdo, $sql)->fetchAll();
        $sql = "DELETE FROM `tacgia` WHERE `ma_tgia` = '".$id."'";
        $update = pdo($pdo, $sql)->fetchAll();
        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Failed: " . $e->getMessage();
    }
}
header("Location:author.php");
?>