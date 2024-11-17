<?php include "headernguoidung.php";?>
<?php

if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [];
}

// Xóa tất cả
if (isset($_GET['delcart']) && ($_GET['delcart'] == 1)) unset($_SESSION['giohang']);
// Xóa sản phẩm trong giỏ hàng (xóa đơn xóa từng cái một)
if (isset($_GET['delid']) && ($_GET['delid'] >= 0)) {
    array_splice($_SESSION['giohang'], $_GET['delid'], 1);
}
// Lấy dữ liệu từ form

// Lấy dữ liệu từ form khi người dùng thêm sản phẩm vào giỏ hàng
if (isset($_POST['addcart']) && ($_POST['addcart'])) {
    $img = $_POST['img'];
    $tensp = $_POST['tensp'];
    $dongia = $_POST['dongia'];
    $soluong = $_POST['soluong'];

    // Kiểm tra sản phẩm có trong giỏ hàng hay không
    $fl = 0;

    for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
        if ($_SESSION['giohang'][$i][1] == $tensp) {
            $fl = 1;
            $soluongnew = $soluong + $_SESSION['giohang'][$i][3];
            $_SESSION['giohang'][$i][3] = $soluongnew;
            break;
        }
    }

    if ($fl == 0) {
        // Thêm mới sản phẩm vào giỏ hàng
        $sp = [$img, $tensp, $dongia, $soluong];
        $_SESSION['giohang'][] = $sp;
    }

    
}


include "thuvien.php";



// Unset giỏ hàng session chỉ khi ấn nút dongydathang
if (isset($_POST['dongydathang'])) {
    // Set giỏ hàng về rỗng
// Lưu trữ giỏ hàng vào biến tạm thời
    $cartBackup = $_SESSION['giohang'];
    unset($_SESSION['giohang']);
    $_SESSION['order_success'] = true;
}


?>

<div class="cart">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-12 ">
                    <form action="bill.php" method="post">
                        <div class="cart__fill">   
                            <h3 class="product__heading">Thông tin nhận hàng</h3>
                            <div class="cart__info l-o-1">
                                <div class="cart__info-gr">
                                    <span class="cart__info-text">Họ tên</span>
                                    <input type="text" name="hoten" class="cart__info-input">
                                </div>
                                <div class="cart__info-gr">
                                    <span class="cart__info-text">Địa chỉ</span>
                                    <input type="text" name="diachi" class="cart__info-input">
                                </div>
                                <div class="cart__info-gr">
                                    <span class="cart__info-text">Điện thoại</span>
                                    <input type="text" name="dienthoai" class="cart__info-input">
                                </div>
                                <div class="cart__info-gr">
                                    <span class="cart__info-text">Email</span>
                                    <input type="text" name="email" class="cart__info-input">
                                </div>
                            </div>
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
                                    <th>Chức năng</th>
                                </thead>
                                <tbody>
                                <?php 
                                
                                echo showgiohang();
                                
                                ?>
                                    <!-- <tr>
                                        <td>1</td>
                                        <td><img src="assets/img/aohoodie.jpg" alt="áo đó" class="cart__table-img"></td>
                                        <td>Áo hoodie</td>
                                        <td>120.000đ</td>
                                        <td><input type="number" value="1" class="cart__table-num"></td>
                                        <td>120.000đ</td>
                                        <td></td>
                                    </tr> -->
                                    <!-- <tr class="cart__table-money" colspan="6">
                                        <th class="cart__table-money-text" colspan="5">
                                            Tổng đơn hàng 
                                        </th>
                                        <th>
                                            100000
                                        </th>
                                    </tr> -->
                                </tbody>
                            </table>
                            <div class="cart__table-btn">
                                <button class="cart__table-btn-agree" type="submit" name="dongydathang">Đồng ý đặt hàng</button>
                                <a href="cart.php?delcart=1" class="cart__table-btn-delete">Xóa giỏ hàng</a>
                                <a href="index_home.php" class="cart__table-btn-home">Tiếp tục đặt hàng</a>
                            </div>
                        </div>
                    </form>
                     
                    </div>
                </div>
            </div>
</div>

<?php include "footernguoidung.php";?>