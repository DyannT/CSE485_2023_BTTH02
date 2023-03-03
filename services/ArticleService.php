<?php
include("config/DBConnection.php");
include("models/Article.php");
class ArticleService{
    public function getAllArticles(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM baiviet";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article( $row['hinhanh'], $row['ten_bhat'],$row['ma_bviet']);
            array_push($articles,$article);
        }

        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }

    public function getDetailArticle($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
 
         // B2. Truy vấn
         $sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat,baiviet.tomtat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet, baiviet.hinhanh FROM baiviet JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai WHERE baiviet.ma_bviet = '" . $id . "'";
         $stmt = $conn->query($sql);

                 // B3. Xử lý kết quả
        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article($row['hinhanh'], $row['ten_bhat'],$row['ma_bviet'],$row['tieude'], $row['tomtat'],$row['ten_tgia'],$row['ten_tloai'],$row['ngayviet']);
            array_push($articles,$article);
        }

        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }
    public function getAllArticle(){
                // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM baiviet";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['hinhanh']);
            array_push($articles,$article);
        }

        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }
}