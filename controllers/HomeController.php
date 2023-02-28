<?php
    class HomeController{
        public function index(){
            $data = 'data form models';

            include('view/home/index.php');
            // echo 'đm tấn';
        }

        public function add(){
            echo 'đm add tấn';
        }
    }