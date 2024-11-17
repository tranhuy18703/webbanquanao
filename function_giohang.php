<?php 

include "ketnoi.php";

class giohang extends ketnoi{
    public $id;
    public $tensp;
    public $img;
    public $dongia;
    public $soluong;
    public $thanhtien;
    public $idbill;
    
    function hienthi(){
        $sql = "SELECT * FROM `cart`";
        $result = mysqli_query($this->conn,$sql);
        return $result;
    }
    function hienthiid($id){
        $sql = "SELECT * FROM cart WHERE id = '$id'";
        $result = mysqli_query($this->conn,$sql);
        return $result;
    
    }
    function delete($id){
        $sql = "DELETE FROM `cart` WHERE id = '$id'";
        $result = mysqli_query($this->conn, $sql);
    
       if($result) {
        echo"<script>alert('xóa thành công')</script>";
        echo "<script>window.history.back()</script>";
    }
    else
    {
        echo" <script>alert('lỗi')</script>";
    
    }
    }
}

?>