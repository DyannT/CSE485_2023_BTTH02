<?php
class Article{
    // Thuộc tính

    public $ma_bviet;
    public $hinhanh;
    public $ten_bhat;


    public function __construct($ma_bviet, $hinhanh,$ten_bhat){
        $this->ma_bviet = $ma_bviet;
        $this->hinhanh = $hinhanh;
        $this->ten_bhat = $ten_bhat;
    }

    // Setter và Getter
    public function get_ma_bviet(){
        return $this->ma_bviet;
    }
}