<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/change_pass.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/header.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/login_register.css">
<!-- Main section end -->
<div style="margin-top:70px;">
<div class="main">
    <form action="<?php echo $actual_link ?>/<?php 
        if ($_SESSION['lever'] == 2) {
            echo "employer";
        }else if ($_SESSION['lever'] == 1){
            echo "admin";
        } else {
           echo "customer";
        }
    ?>/change_password_processing/" method="post" id="change-pass" class="change-pass-box">
        <h3 class="text-heading mb-20">Thay đổi mật khẩu</h3>
        <p class="mb-8">Nhập mật khẩu cũ của bạn</p>
        <?php
        if (isset($_SESSION['error'])) {
            echo "<p style='color:red; translateY(25px);'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']);
        }
        ?>
        <p id="aleart" style="color: red"></p>
        <div class="mb-8 key"><i class="fa-solid fa-key"></i><input type="password" name="old_pass" placeholder="Nhập mật khẩu cũ" required></div>
        <div class="mb-8 key"><i class="fa-solid fa-key"></i><input type="password" id="password-regex" name="new_pass" placeholder="Tạo mật khẩu mới" required></div>
        <div class="checkPass">
                        <div class = "low">
                            <hr  width="98%" size="8px" align="left" color="#cd1111" />
                        </div>
                        <div class = "medium">
                            <hr  width="98%" size="8px" align="left" color="#d2a905" />
                        </div>
                        <div class = "hight">
                            <hr  width="98%" size="8px" align="left" color="#17d53a" />
                        </div>
                        <div id="result" style="font-size: 14px; margin: 7px 0px 0px 5px; font-weight: bold;"></div>
                    </div>
        <div class="mb-8 key"><i class="fa-solid fa-key"></i><input type="password" id="password2" name="new_pass" placeholder="Xác nhận mật khẩu mới" required></div>
        <button class="btn2" style="cursor: pointer">Thay Đổi</button>
    </form>
</div>
<!-- Main section end -->
<script>
    document.getElementById('change-pass').onsubmit = function(e) {
        document.getElementById('aleart').innerHTML = "";
        if (document.getElementById('password1').value != document.getElementById('password2').value){
            document.getElementById('aleart').innerHTML = "Mật khẩu không trùng";
            e.preventDefault();
        }
    }
</script>
<script src="<?php echo $actual_link ?>/public/javascript/main.js"></script>
<script src="<?php echo $actual_link?>/public/javascript/login_register.js"></script>
