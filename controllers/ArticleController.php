<?php
   require("services/ArticleService.php");
  
    class ArticleController{
            // Hàm xử lý hành động index
    public function index(){
        $articleService = new ArticleService();
        $articleService->getAllArticle();
    }

    public function add(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View
        include("views/article/add_article.php");
    }

    public function list(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View
        include("views/article/list_article.php");
    }
    }