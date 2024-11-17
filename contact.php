<?php include "headernguoidung.php";
      include "function_lienhe.php";
    
      $lienhe = new lienhe();
      if(isset($_POST['tbOk'])){
        $lienhe->hoten = isset($_POST['hoten']) ? $_POST['hoten'] : '';
        $lienhe->email= isset($_POST['email']) ? $_POST['email'] : '';
        $lienhe->sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
        $lienhe->ghichu= isset($_POST['ghichu']) ? $_POST['ghichu'] : '';
        $lienhe->insert();
    }

?>

        <div class="contact">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-6">
                        <h3 class="contact__heading">
                            Liên hệ với chúng tôi
                        </h3>
                        <form action="" method="post">
                        <div class="contact__info">
                            <div class="contact__gr">
                                <input type="text" class="contact__gr-input" name="hoten" placeholder="Họ và tên">
                            </div>
                            <div class="contact__gr">
                                <input type="email" class="contact__gr-input" name="email" placeholder="Email">
                            </div>
                            <div class="contact__gr">
                                <input type="text" class="contact__gr-input" name="sdt" placeholder="Điện thoại">
                            </div>
                            <div class="contact__gr">
                                <textarea id="ghichu"  cols="30" rows="8" name="ghichu" class="contact__gr-input" placeholder="Nội dung"></textarea>
                            </div>
                        </div>
                        <div class="contact__btn">
                            <button type="submit" class="contact__btn-link" name="tbOk">Gửi thông tin</button>
                        </div>
                    </div>
                    <div class="col l-6">
                        <div class="contact__hamster">
                            <div aria-label="Orange and tan hamster running in a metal wheel" role="img" class="wheel-and-hamster">
                                <div class="wheel"></div>
                                <div class="hamster">
                                    <div class="hamster__body">
                                        <div class="hamster__head">
                                            <div class="hamster__ear"></div>
                                            <div class="hamster__eye"></div>
                                            <div class="hamster__nose"></div>
                                        </div>
                                        <div class="hamster__limb hamster__limb--fr"></div>
                                        <div class="hamster__limb hamster__limb--fl"></div>
                                        <div class="hamster__limb hamster__limb--br"></div>
                                        <div class="hamster__limb hamster__limb--bl"></div>
                                        <div class="hamster__tail"></div>
                                    </div>
                                </div>
                                <div class="spoke"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include "footernguoidung.php";?>