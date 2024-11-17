<?php include "headernguoidung.php";?>
<?php include "news1.php";?>
<?php include "news2.php";?>
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
    
    $tentintuc = isset($_GET['tentintuc']) ? $_GET['tentintuc'] : '';
    $sql = "SELECT * FROM `tintuc`WHERE tentintuc='$tentintuc' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
?>   
    <div class="col l-8">
        <h2 class="news-items__title news-items__title-strong"><?php echo $row["tentintuc"] ?></h2>
        <div class="news-items__permission">
            <span class="news-items__permission-team news-items__permission-strong">
                <i class="fa-regular fa-user"></i>    
                <?php echo $row["tennguoidang"] ?>
            </span>
            <span class="news-items__permission-date news-items__permission-strong">
                <i class="fa-regular fa-clock"></i>
                <?php echo $row["ngaydang"] ?>
            </span>
        </div>
        <img src="./upload/<?php echo $row["img"] ?>" alt="news image" class="news-items__img">
        <p class="news-items__msg news-items__msg-full">
            <?php echo $row["mota"] ?>
        </p>
    </div>

</div>
</div>
<?php include "footernguoidung.php";?>