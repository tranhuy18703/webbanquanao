<?php

include "ketnoi.php";

// B ltru
// Sản Phẩm
class sanpham extends ketnoi{
    public $masanpham;
    public $nhomid;
    public $tensanpham;
    public $mota;
    public $dongia;
    public $img;
    public $enable;
    public $ghichu;
    public $tenanhcu;
    public $tenanh;
    public $soluong;
    function hienthi(){
        $sql = "SELECT sanpham.*, sanpham_nhom.tennhom FROM sanpham, sanpham_nhom WHERE sanpham.nhom_id = sanpham_nhom.id ";
        $result = mysqli_query($this->conn, $sql); // dùng đê thực hiện truy vấn sql và trả về kết quả cho biến result
        return $result;
    
    }
    function hienthisanpham($masp){
        $sql = "SELECT * FROM sanpham WHERE masp = '$masp'" ;
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    function hienthinhom(){
        $sql = "SELECT * FROM sanpham_nhom";
        $result_nhom = mysqli_query($this->conn, $sql);
        return $result_nhom;
    
    }
    function themsanpham(){
        $sql = "INSERT INTO `sanpham`(`masp`, `nhom_id`, `tensp`, `mota`, `dongia`,`dongiaold`,`enable`, `ghichu`, `soluong`)
        VALUES ('".$this->masanpham."','".$this->nhomid."','".$this->tensanpham."','".$this->mota."','".$this->dongia."','".$this->dongiaold."','".$this->enable."', '".$this->ghichu."','".$this->soluong."')";
        $result = mysqli_query($this->conn, $sql);
   
        $target_dir = "upload/";
        $filename = basename($_FILES["img"]["name"]);
        $targer_file = $target_dir.$filename;
        if(move_uploaded_file($_FILES["img"]["tmp_name"], $targer_file)){
        $sql = "UPDATE `sanpham` SET `img` = '$filename' WHERE `masp` = '".$this->masanpham."'";
        $result = mysqli_query($this->conn, $sql);
    }
    
  
     
    
    if($result){
             echo "<script>alert('Thêm thành công')</script>";
             echo "<script> window.location ='sanpham.php' </script>";
    }
    else{
        echo "<script> alert('Lỗi')</script>";
    }
    
    }
    function updatesanpham(){
        $sql = "UPDATE `sanpham` SET
        `nhom_id`='".$this->nhomid."',
        `tensp`='".$this->tensanpham."',
        `mota`='".$this->mota."',
        `dongia`='".$this->dongia."',
        `dongiaold`='".$this->dongiaold."',
        `soluong` = '".$this->soluong."',
        `enable`='".$this->enable."',
        `ghichu`='".$this->ghichu."' 
        WHERE masp = '".$this->masanpham."'";
        $result = mysqli_query($this->conn, $sql);
        $target_dir = "upload/";
        $filename = basename($_FILES["img"]["name"]);
        $targer_file = $target_dir.$filename;
        if(move_uploaded_file($_FILES["img"]["tmp_name"], $targer_file)){
            $sql = "UPDATE `sanpham` SET `img`='$filename' WHERE masp = '".$this->masanpham."'";
            mysqli_query($this->conn, $sql);
            // unlink("./anh/".$this->tenanhcu);
        }
        if($result){
                 echo "<script>alert('Sửa thành công')</script>";
                 echo "<script> window.location ='sanpham.php' </script>";
        }
        else{
            echo "<script> alert('Lỗi')</script>";
        }
    
    }
    function deletesanpham($masp){
        // unlink("./upload/".$this->tenanh."");
    $sql = "DELETE FROM `sanpham` WHERE masp = '$masp'";
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
    
    class nhomsanpham extends ketnoi{
    public $id;
    public $tennhom;
    public $ghichu;

    function insert(){
        $sql = "INSERT INTO `sanpham_nhom`(`id`, `tennhom`, `ghichu`)
        VALUES ('".$this->id."','".$this->tennhom."','".$this->ghichu."')";
        $result = mysqli_query($this->conn, $sql);
        if($result){
           echo "<script>alert('Thêm thành công')</script>";
           echo "<script>window.location = 'sanpham_nhom.php'</script>";
        }
        else{
           echo "<script>alert('Lỗi')</script>";
        }
    }
    function hienthiid($id){
        $sql = "SELECT * FROM sanpham_nhom WHERE id = '$id'" ;
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    function update(){
        $sql = "UPDATE `sanpham_nhom` SET
        `id`='".$this->id."',
        `tennhom`='".$this->tennhom."',
        `ghichu`='".$this->ghichu."' 
        WHERE id = '".$this->id."'";
        $result = mysqli_query($this->conn, $sql);
        if($result){
                 echo "<script>alert('Sửa thành công')</script>";
                 echo "<script> window.location ='sanpham_nhom.php' </script>";
        }
        else{
            echo "<script> alert('Lỗi')</script>";
        }
    }
    function delete($id){
        $sql = "DELETE FROM `sanpham_nhom` WHERE id = '$id'";
        $result = mysqli_query($this->conn, $sql);
        if($result){
            echo "<script> alert('Xóa thành công') </script>";
            echo "<script> window.location = 'sanpham_nhom.php' </script>";
        
        }
        else{
            echo "<script> alert('Lỗi') </script>";
        
        }
    
    
    }
    };

?>