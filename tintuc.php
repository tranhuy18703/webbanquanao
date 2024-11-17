<?php include "headerquantri.php";
    include "function_tintuc.php";
    $tintuc = new tintuc(); 
    $rows = $tintuc->hienthi();
    $count= 1; 
?>

<div class="example">
        <div class="container">
            <div class="row">
                <h2 class="heading_admin">Quản Lý Tin Tức </h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tên tin tức</th>
                            <th>Tên nhóm</th>
                            <th>Tên người đăng</th>
                            <th>Ngày đăng</th>
                            <th>Mô Tả</th>
                            <th>Ảnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($count > 0){
                        foreach ($rows as $row) { ?>
                            <tr>
                                <td>
                                    <?PHP echo $row["tentintuc"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["tennhom"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["tennguoidang"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["ngaydang"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["mota"] ?>
                                </td>
                                <td>
                                   <img src="./upload/<?php echo $row['img']?>"alt="" width="50">

                                </td>

                            </tr>
                           
                        <?PHP }
                         }   ?> 
                    </tbody>
                </table>
                <div class="link_admin-footer">
                        <a class="link_admin-btn" href="themtintuc.php" >Thêm Tin Tức</a>
                </div>
            </div>
        </div>

    </div>