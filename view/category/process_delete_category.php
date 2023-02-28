<?php
    require '../includes/database-connection.php';  
    require '../includes/functions.php';  
    // $id = $_GET['id'];
    // $sql = "DELETE FROM `theloai` WHERE `ma_tloai` = '" . $id . "'";
    // $delete = pdo($pdo, $sql)->fetchAll();

    // Sử dụng transaction
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try {
            $pdo->beginTransaction();
            $sql = "DELETE FROM baiviet WHERE ma_tloai = '".$id."'";
            $update = pdo($pdo, $sql)->fetchAll();
            $sql = "DELETE FROM theloai WHERE ma_tloai = '".$id."'";
            $update = pdo($pdo, $sql)->fetchAll();
            $pdo->commit();
        } catch (Exception $e) {
            $pdo->rollBack();
            echo "Failed: " . $e->getMessage();
        }
    }
    header("Location:category.php");
