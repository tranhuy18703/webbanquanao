<?php
class ketnoi {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "webbanquanao";
    protected $conn = "";

    // Bước 1: Tạo kết nối
    function __construct() {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        // Kiểm tra kết nối
        if (mysqli_connect_errno()) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }
    }
}
?>