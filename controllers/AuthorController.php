<?php
    require("services/AuthorService.php");
    class AuthorController{
        // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from author";
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthor();
        // Nhiệm vụ 2: Tương tác với View
        // echo "Tương tác với View from author";
        include "view/author/author.php";
    }

    public function add(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from author";
        // Nhiệm vụ 2: Tương tác với View
        include("view/author/add_author.php");
    }

    public function list(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from author";
        // Nhiệm vụ 2: Tương tác với View
        include("view/author/list_author.php");
    }

    }
?>