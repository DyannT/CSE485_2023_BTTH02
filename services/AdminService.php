<?php
require_once("config/DBConnection.php");
include("models/Admin.php");

class AdminService
{
    public function getAllAdmin()
    {
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM user";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $admins = [];
        while ($row = $stmt->fetch()) {
            $admin = new Admin($row['id'], $row['username'], $row['password']);
            array_push($admins, $admin);
        }

        // Mảng (danh sách) các đối tượng Category Model

        return $admins;
    }

    public function login($username, $password)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        try {
            $sql = "SELECT * FROM user WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username]);

            $user = null;
            if ($row = $stmt->fetch()) {
                if (strcmp(md5($password), $row['password']) == 0) {
                    $user = new Admin($row['id'], $row['username'], $row['password']);
                }
            }
            return $user;
        } catch (Exception $e) {
            throw new Exception("Error authenticating user: " . $e->getMessage());
        } finally {
            $conn = null;
        }
    }

    public function register($username, $password)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        try {
            $hash = md5($password); // tạo hash từ password
            $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username, $hash]); // lưu hash vào cơ sở dữ liệu
        } catch (Exception $e) {
            throw new Exception("Error registering user: " . $e->getMessage());
        } finally {
            $conn = null;
        }
    }
}
