<?php
    require("services/ArticleService.php");
    class HomeController{
        public function index(){
            $articelService = new ArticleService();
            $articles = $articelService->getAllArticles();

            include("view/home/index.php");
        }

    }