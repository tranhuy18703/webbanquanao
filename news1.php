<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webbanquanao";

    //B1: Create connetion
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    //check connection
    
    if (!$conn) {
        die("connection failer" . mysqli_connect_error());
    }
    //B2:
    $sql_nhom = "SELECT * FROM `tintuc_nhom` ";
   ;
    //Bước 3
    $result_nhom = mysqli_query($conn, $sql_nhom);
?>

        <div class="cate">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-4">
                        <div class="category">
                            <div class="category__gr">
                                <h3 class="category__heading">Danh mục tin tức</h3>
                                <ul class="category__list">
                                <?php while ($row_nhom = mysqli_fetch_assoc($result_nhom)) { ?>
                                    <li class="category__items">
                                        <a href="index_news.php?nhom_id=<?php echo $row_nhom["id"]?>" class="category__items-link"><?php echo  $row_nhom["tennhom"] ?></a>
                                    </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>