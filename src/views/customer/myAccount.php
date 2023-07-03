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

                            <span class="info-label"><i class="fa-solid fa-cake-candles fa-sm" style="margin-right:12px;"></i>Ngày sinh: &nbsp;</span>
                            <strong><?php echo $data[0]['date-of-birth']?></strong><br>

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

                            <span class="info-label"><i class="fa-solid fa-graduation-cap fa-sm" style="margin-right:6px;"></i>Trình độ: &nbsp;</span>
                            <strong><?php echo $data[0]['level']?></strong><br>

                            <span class="info-label"><i class="fa-solid fa-language fa-sm" style="margin-right:6px;"></i>Ngoại ngữ: &nbsp;</span>
                            <strong><?php echo $data[0]['language_level']?></strong><br>
                        </div>
                    </div>

                    <div class="extra-container" >
                        <div class="extra-content">
                            <div style="max-width: 80%">
                                <h2>Học vấn</h2>
                                <span >Thêm học vấn giúp hiện trình độ văn hoá và trình độ chuyên môn của bạn.</span>
                            </div>
                            <button class="btn-ad" id="addEdu">Thêm mục</button>
                        </div>
                        
                        <div><?php foreach ($data[1] as $edu) { ?>
                            <div class="extra-item" >
                                <button class="extra-title" data-toggle="popover" data-placement="bottom" title="Mô tả" data-content="<?php echo $edu['edu-description']?>">
                                    <strong style="font-size:19px;"><?php echo $edu['major']?></strong><br>
                                    <span >Tại &nbsp;<strong><?php echo $edu['school-name']?></strong></span>
                                </button>
                                <div style="display: flex;justify-content: space-between;">
                                    <div>
                                        <span style="font-size:14px;">Từ: &nbsp;<strong><?php echo $edu['start']?></strong></span>
                                        <?php if($edu['graduatedOrNot'] == 0) {?>  
                                            <br><span style="font-size:14px;">Đến: &nbsp;<strong><?php echo $edu['end']?></strong></span>
                                        <?php }?>
                                    </div>
                                    <a 
                                        class="btn-add" 
                                        id="delete" 
                                        onclick=" return confirm('Bạn có chắc muốn xóa nội dung này ?');" 
                                        href="<?php echo $actual_link ?>/customer/delete_edu/<?php echo $edu['id']?>" 
                                        style="font-size:16px;"
                                    >Xóa</a>
                                </div>
                                
                            </div>
                        <?php }?></div>
                    </div>