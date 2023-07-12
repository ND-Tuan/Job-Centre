<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/my_account.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/header.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/rating.css">

<div style="margin-top:100px;"></div>
<div class="main-container">
        <div class="row">
            <div class="box-info">
                <div id="box-view" class="box-info-view">
                    <div id="my-infor">
                        <img src="<?php echo $actual_link ?>/public/images/default/user_background.png">
                    </div>
                    <div class="header-container">
                        <div style="position: relative; bottom: 2.2cm;left: 0.8cm;">
                            <div class="avatar-preview">
                                <img src="<?php echo $actual_link ?>/public/images/avatar/<?php echo $_SESSION['avatar']?>">
                                <img id="change-avatar" src="<?php echo $actual_link ?>/public/images/default/change-avatar.png">
                            </div>
                        </div>
                        <div class="name-header">
                            <strong style="margin-bottom:30px;"><?php echo $_SESSION['name']?></strong>
                            <button class="btn-add" onclick="changeView()">
                                Thay đổi thông tin
                            </button>
                        </div>
                    </div>
                    <?php
                        if (isset($_SESSION['done'])){
                            echo "<strong style='color: #ff8339;'>Cập nhập tài khoản thành công</strong>";
                            unset($_SESSION['done']);
                        }else if (isset($_SESSION['error'])){
                            echo "<strong style='color: red;'>Lỗi trùng Email hoặc lỗi file</strong>";
                            unset($_SESSION['error']);
                        } 
                    ?>
                    <div class="info-container" >
                        <h4 class="title">Thông tin cơ bản</h4>
                        <div class="description-info">
                            <span class="info-label"><i class="fa-solid fa-envelope fa-sm" style="margin-right:10px;"></i>Email: &nbsp;</span>
                            <strong><?php echo $data[0]['email']?></strong><br>

                            <span class="info-label"><i class="fa-solid fa-venus-mars fa-sm" style="margin-right:6px;"></i>Giới tính: &nbsp;</span>
                            <strong><?php
                                if ($data[0]['gender'] == 1){
                                    echo "Nam";
                                }else if ($data[0]['gender'] == 2){
                                    echo "Nữ";
                                }else if ($data[0]['gender'] == 0){
                                    echo "Khác";
                                }
                            ?></strong><br>

                            <span class="info-label"><i class="fa-solid fa-phone fa-sm" style="margin-right:10px;"></i>Số điện thoại: &nbsp;</span>
                            <strong><?php
                                if ($data[0]['phone_number'] == null){
                                    echo "<strong>Chưa Xác định</strong>";
                                }else{
                                    echo $data[0]['phone_number'];
                                }
                            ?></strong><br>

                            <span class="info-label"><i class="fa-solid fa-location-dot fa-sm" style="margin-right:14px;"></i>Địa chỉ: &nbsp;</span>
                            <strong><?php
                                if ($data[0]['address'] == null){
                                    echo "<strong>Chưa Xác định</strong>";
                                }else{
                                    echo $data[0]['address'];
                                }
                            ?></strong><br>
                        </div>
                    </div>
                </div>

                <form action="<?php echo $actual_link ?>/admin/update" method="post" id="box-edit" class="box-info-view hidden" enctype="multipart/form-data[0]">
                    <h4 class="title">Chỉnh sửa thông tin cá nhân</h4>
                    <div id="my-change-infor">
                            <strong id="error-message" style="color: red; font-size: 17px"></strong><br>

                            <strong class="info-label">Họ tên: &nbsp;</strong><br>
                            <input id="name-regex" name="name" class="input-set-new-value" type="text" value="<?php echo $_SESSION['name'] ?>" required>
                            
                            <div class="box-btn-config">
                                <div>
                                    <strong class="info-label">Giới tính: </strong> <br>
                                    <select class="input-set-new-value" name="gender" >
                                        <?php if ($data[0]['gender'] == 2) { ?>
                                            <option value="2">nữ</option>
                                            <option value="1">nam</option>
                                            <option value="0">khác</option>
                                        <?php } elseif ($data[0]['gender'] == 1) { ?>
                                            <option value="1">nam</option>
                                            <option value="2">nữ</option>
                                            <option value="0">khác</option>
                                        <?php } else {?>
                                            <option value="0">khác</option>
                                            <option value="1">nam</option>
                                            <option value="2">nữ</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div></div>
                            </div>

                            <strong class="info-label">Email: </strong><br>
                            <input id="email-regex" name="email" class="input-set-new-value" type="email" value="<?php echo $data[0]['email']?>" required>
                            
                            <strong class="info-label">Điện thoại: </strong><br>
                            <input id="phone-regex" name="phone_number" class="input-set-new-value" type="text" value="<?php echo $data[0]['phone_number']?>" required>

                            <strong  class="info-label">Địa chỉ: </strong><br>
                            <textarea class="box-set-new-value" name="address" placeholder="Nhập địa chỉ của bạn" required><?php echo $data[0]['address']?></textarea>
                            <div class="box-btn-config">
                                <button class="btn-ad" onclick="changeView()">
                                    Trở lại
                                </button>
                                <div></div>
                                <button type="submit" class="btn-add">
                                    Cập nhật thông tin tài khoản
                                </button>
                            </div>
                    </div>
                </form>
            </div>
            <div>
                <div class="box-config">
                    <h2 class="text-header">HỒ SƠ TÀI KHOẢN</h2>
                   
                    <a href="<?php echo $actual_link ?>/customer/change_password/">
                        Thay đổi mật khẩu
                    </a>
                    
                </div>
            </div>
        </div>
</div>




<div id="popup" class="change-avatar-box">
    <div class="change-avatar-box-content">
        <label class="close" id="change-avatar-box-close">&times;</label>
        <h3>Thay ảnh đại diện</h3>
        <form action="<?php echo $actual_link ?>/admin/updateAvatar" method="post"  class="change-avatar-container" enctype="multipart/form-data"> 
            <div class="change-avatar-detail-container">
                <h4 style="padding-bottom:10px">Ảnh đại diện hiển thị</h4>
                <div class="preview">    
                    <img
                    id="img-preview"
                    src="<?php echo $actual_link ?>/public/images/avatar/<?php echo $_SESSION['avatar']?>">
                    <input accept="image/*" type="file" id="file-input"  name="avatar" >
                </div>
            </div>
            <div class="change-avatar-detail-container">
                <label for="file-input">Đổi ảnh</label>
                <button type="submit" class="btn1">Cập nhật</button>
            </div>
        </form>
    </div>
</div>

<script src="<?php echo $actual_link ?>/public/javascript/myAccount.js"></script>
<script src="<?php echo $actual_link ?>/public/javascript/myCompany.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    document.querySelectorAll("textarea").forEach(element => {
        function autoResize(el) {
        el.style.height = el.scrollHeight + 'px';
        }
        autoResize(element);
        element.addEventListener('input', () => autoResize(element));
    });

    $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
    });

    document.querySelectorAll('#skill').forEach(element =>{
        if(element.offsetHeight <= 20){
            element.style.display = "none";
        }
    })

</script>
