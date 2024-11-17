<?php
session_start();
include "thuvien.php";

if (!isset($_SESSION['user'])) {
    // Kiểm tra xem người dùng đã đăng nhập chưa, nếu chưa thì chuyển hướng hoặc xử lý theo yêu cầu của bạn.
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
$orders = getOrdersByUser($user);

// Hiển thị thông tin đơn hàng
echo "<h2>Đơn hàng của $user</h2>";

foreach ($orders as $order) {
    echo "<h3>Đơn hàng #" . $order['id'] . "</h3>";
    echo "Tên người đặt: " . $order['name'] . "<br>";
    echo "Địa chỉ: " . $order['address'] . "<br>";
    echo "Điện thoại: " . $order['tel'] . "<br>";
    echo "Email: " . $order['email'] . "<br>";
    echo "Tổng tiền: " . $order['total'] . "<br>";

    // Hiển thị chi tiết đơn hàng
    $orderDetails = getOrderDetails($order['id']);
    echo "<h4>Chi tiết đơn hàng:</h4>";
    echo "<ul>";
    foreach ($orderDetails as $detail) {
        echo "<li>{$detail['tensp']} - {$detail['soluong']} sản phẩm - {$detail['thanhtien']} đ</li>";
    }
    echo "</ul>";
}


$cart = '';
if (isset($_SESSION['order_success']) && $_SESSION['order_success']) {
    // Lấy giỏ hàng từ biến tạm thời
    if (isset($_SESSION['cartBackup'])) {
        $_SESSION['giohang'] = $_SESSION['cartBackup'];
        unset($_SESSION['cartBackup']);
    }

    // Hiển thị giỏ hàng (nếu có)
    $cart = showgiohang1();
    echo "<h3>Giỏ hàng của $user</h3>";
    echo "<table border='1'>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            $cart
        </table>";

    // Reset trạng thái order_success để không hiển thị giỏ hàng nếu là lần truy cập tiếp theo
    $_SESSION['order_success'] = false;
}


?>
