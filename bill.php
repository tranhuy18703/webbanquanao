<?php include "headernguoidung.php";?>
<?php
    
    include "thuvien.php";
    if(isset($_POST['dongydathang'])){

        // Lấy thông tin khách hàng từ form để tạo đơn hàng
        $name=$_POST['hoten'];
        $address=$_POST['diachi'];
        $tel=$_POST['dienthoai'];
        $email=$_POST['email'];
        $total=tongdonhang();
        $pttt=0;

        // Insert đơn hàng - Tạo đơn hàng mới , // Lấy thông tin giỏ hàng từ session + id đơn hàng vừa tạo

        $idbill=taodonhang($name, $address, $tel,$email,$total,$pttt);

        // Insert vào bảng giỏ hàng 

        for($i=0;$i < sizeof($_SESSION['giohang']);$i++){
            $tensp = $_SESSION['giohang'][$i][1];
            $img = $_SESSION['giohang'][$i][0];
            $dongia = intval($_SESSION['giohang'][$i][2]); // intval dùng để biến thành kiểu số , bên dưới cũng vậy 
            $soluong = intval($_SESSION['giohang'][$i][3]);
            $thanhtien = $dongia * $soluong;
            taogiohang($tensp, $img, $dongia,$soluong,$thanhtien,$idbill);
        }

        // Show confirm giỏ hàng

        $ttkh=' <h2> Mã đơn hàng : '.$idbill.' </h2>
                <h3 class="product__heading">Thông tin nhận hàng</h3>
                <div class="cart__info l-o-1">
                    <div class="cart__info-gr">
                        <span class="cart__info-text">Họ tên</span>
                        <input type="text" value="'.$name.'" class="cart__info-input">
                    </div>
                    <div class="cart__info-gr">
                        <span class="cart__info-text">Địa chỉ</span>
                        <input type="text" value="'.$address.'" class="cart__info-input">
                    </div>
                    <div class="cart__info-gr">
                        <span class="cart__info-text">Điện thoại</span>
                        <input type="text" value="'.$tel.'" class="cart__info-input">
                    </div>
                    <div class="cart__info-gr">
                        <span class="cart__info-text">Email</span>
                        <input type="text" value="'.$email.'" class="cart__info-input">
                    </div>
                </div> ';


        $ttgh = showgiohang1();

        echo "<script> alert('Bạn đã đặt hàng thành công!') </script>";

    }

    // Sau khi đã thêm đơn hàng thành công
    // Xóa sản phẩm đã thêm vào giỏ hàng

    
    $_SESSION['giohang'] = [];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satoru Fashion</title>
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/grid.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="shortcut icon" href="assets/img/iconweb.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="main.js"></script>
    <link rel="stylesheet" href="styles.scss">
    <style>

    /* Image */
    .product__items-img {
        height:210px;
    }

    /* Tin Tức */
    .news-items__img {
        width: 100%;
        height:256px;
        border-radius: 20px;
    }
    .news-items__msg {
        color: #afa5a8;
        font-size: 1.4rem;
        line-height: 1.8rem;
        max-height:3.6rem;
        overflow: hidden;
        display:-webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }   
    .news-items__permission-date::before {
        display: none;
    }
    /*----------*/

    /* Nút Liên Hệ */
    .contact__btn-link {
        padding: 12px 21px;
        border: none;
        cursor: pointer;
    }

    /* News_detail */

    .news-items__img {
        margin-top: 20px;
    }

    .news-items__msg-full {
        display: block;
        max-height:unset;
        line-height:2.4rem;
        color:var(--black-color);
        font-size:1.8rem;
        font-weight:500;
        text-align:left;
    }

    .news-items__title-strong {
        font-size:3.2rem;
        font-weight:600;
        margin-bottom:0;
    }

    .news-items__permission-strong {
        font-size:1.6rem;
        font-weight:500; 
    }

    /* Login */

    .relog-form__btn-link {
        width: 100%;
        border: none;
        cursor: pointer;
    }

    /* In - Out Header */

    .header-top__join-in {
        color:white;
        font-size:1.4rem;
        font-weight:300;
        user-select:none;
        padding-right:10px;
    }

    .header-top__join-out {
        text-decoration:none;
        color:black;
        font-size:1.4rem;
        font-weight:500;
        padding-left:10px;
        transition:color ease-in .2s;
        border-left:2px solid white;
        header:18px;
    }

    .header-top__join-out:hover {
        color:#fe9614;
    }
    
    /* Search btn */

    .header-top__search-icon {
        border:none;
        cursor:pointer;
    }

    /* Button add-cart */

    .detail-items__btn {
        margin-top:0;
    }
    
    .detail-items__btn-cart {

        width: 100%;
        cursor: pointer;
    }

    .detail-items__quantity-num {
        margin:40px 0;
    }

    /* Cart */

    .cart__info {
        display: flex;
        flex-direction: column;
        border:1px solid #ccc;
        border-radius: 10px;
        width: 80%;
        padding: 21px;
    }

    .cart__info-gr {
        margin: 10px auto;
        display: flex;
        align-items: center;
        width: 80%;
    }

    .cart__info-text {
        min-width: 80px;
        font-size: 1.4rem;
    }

    .cart__info-input {
        flex:1;
        padding:12px 8px;
        border-radius: 2px;
        border:1px solid #ccc;
    }

    .cart__table-num {
        text-align: center;
    }

    /*  */

    .cart__table {
        border: 1px solid #000;
        border-collapse:collapse;
        width: 100%;
        font-size: 1.4rem;
    }

    thead th{
        width: 15%;
        border: 1px solid #000; 
    }

    tbody td {
        text-align: center;
        border: 1px solid #000;
        height: 120px;
    }

    .cart__table-img {
        width: 60%;
        height: 80%;
    }

    .cart__table-money {
        background-color:#99989a;
        height:40px;
    }

    .cart__table-money-text {
        border-right: 2px solid #fff;
    }


    .cart__table-btn {
        margin-top: 10px;
        display: flex;
    }

    .cart__table-btn-agree,
    .cart__table-btn-delete,
    .cart__table-btn-home{
        text-decoration:none;
        min-width: 160px;
        padding: 12px;
        border-radius: 10px;
        outline: none;
        border: none;
        font-size: 1.3rem;
        color: var(--white-color);
        background-color: var(--green-color);
        cursor: pointer;
        transition: background-color ease-in .2s;
    }
    
    .cart__table-btn-delete,
    .cart__table-btn-home {
        min-width: 160px;
        text-align:center;
        margin-left:5px;
    }

    .cart__table-btn-agree:hover,
    .cart__table-btn-delete:hover,
    .cart__table-btn-home:hover {
        background-color: var(--primary-color);
    }

    /* More cart - trang chủ */

    .product__items-more-cart {
        border: none;
        color: var(--white-color);
        background-color: transparent;
        cursor: pointer;
    }

    /* Detail form */

    .detail-items__quantity {
        display: block;
    }

</style>
</head>
<div class="cart">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-12 ">
                    
                        <div class="cart__fill">   
                            
                            <?php echo $ttkh; ?>    

                        </div>
                                           
                        <div class="cart__product">
                            <h3 class="product__heading">Giỏ hàng</h3>
                            <table class="cart__table">
                                <thead>
                                    <th>STT</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                
                                </thead>
                                <tbody>
                                <?php echo $ttgh; ?>
                                </tbody>
                            </table>

                        </div>
                   
                    </div>
                </div>
            </div>
</div>
<?php include "footernguoidung.php";?>