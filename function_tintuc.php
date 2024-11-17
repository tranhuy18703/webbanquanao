<?php
include "ketnoi.php";
// Tin tuc

class tintuc extends ketnoi {
    public $tentintuc;
    public $tennguoidang;
    public $ngaydang;
    public $mota;
    public $img;
    public $tenanh;

    function hienthi(){
        $sql = "SELECT tintuc.*, tintuc_nhom.tennhom FROM tintuc, tintuc_nhom WHERE tintuc.nhom_id = tintuc_nhom.id ";
        $result = mysqli_query($this->conn, $sql); // dùng đê thực hiện truy vấn sql và trả về kết quả cho biến result        
        
        $arr = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $arr[] = $rows;
        }
        return $arr;        
    }

    function hienthitintuc($tentintuc){
        $sql = "SELECT * FROM tintuc WHERE tentintuc = '$tentintuc'" ;
        $result = mysqli_query($this->conn, $sql);
        return $result;
    
    }

    function hienthinhom(){
        $sql = "SELECT * FROM tintuc_nhom";
        $result_nhom = mysqli_query($this->conn, $sql);
        return $result_nhom;
    
    }

    function themtintuc(){
        $sql = "INSERT INTO `tintuc`(`tentintuc`, `nhom_id`, `tennguoidang`, `ngaydang`, `mota`)
        VALUES ('".$this->tentintuc."','".$this->nhomid."','".$this->tennguoidang."','".$this->ngaydang."','".$this->mota."')";
        $result = mysqli_query($this->conn, $sql);
   
        $target_dir = "upload/";
        $filename = basename($_FILES["img"]["name"]);
        $targer_file = $target_dir.$filename;
        if(move_uploaded_file($_FILES["img"]["tmp_name"], $targer_file)){
            $sql = "UPDATE `tintuc` SET `img` = '$filename' WHERE `tentintuc` = '".$this->tentintuc."'";
            $result = mysqli_query($this->conn, $sql);    
            if($result){
                    echo "<script>alert('Thêm thành công')</script>";
                    echo "<script> window.location ='tintuc.php' </script>";
            } else{
                echo "<script> alert('Lỗi')</script>";
            }
        }    
    }
    
}

class nhomtintuc extends ketnoi {
    public $id;
    public $tennhom;
    public $ghichu;
    
    function insert(){
        $sql = "INSERT INTO `tintuc_nhom`(`id`, `tennhom`, `ghichu`)
        VALUES ('".$this->id."','".$this->tennhom."','".$this->ghichu."')";
        $result = mysqli_query($this->conn, $sql);
        if($result){
            echo "<script>alert('Thêm thành công')</script>";
            echo "<script>window.location = 'tintuc_nhom.php'</script>";
        }
        else{
            echo "<script>alert('Lỗi')</script>";
        }
    }
    
    function hienthiid($id){
        $sql = "SELECT * FROM tintuc_nhom WHERE id = '$id'" ;
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    
    function hienthinhom() {
        $sql = "SELECT * FROM tintuc_nhom";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    
    function update(){
        $sql = "UPDATE `tintuc_nhom` SET
        `id`='".$this->id."',
        `tennhom`='".$this->tennhom."',
        `ghichu`='".$this->ghichu."' 
        WHERE id = '".$this->id."'";
        $result = mysqli_query($this->conn, $sql);
        if($result){
                    echo "<script>alert('Sửa thành công')</script>";
                    echo "<script> window.location ='tintuc_nhom.php' </script>";
        }
        else{
            echo "<script> alert('Lỗi')</script>";
        }
    }
    
    function delete($id){
        $sql = "DELETE FROM `tintuc_nhom` WHERE id = '$id'";
        $result = mysqli_query($this->conn, $sql);
        if($result){
            echo "<script> alert('Xóa thành công') </script>";
            echo "<script> window.location = 'tintuc_nhom.php' </script>";
        
        }
        else{
            echo "<script> alert('Lỗi') </script>";
        
        }
    
    
    }

}

?>