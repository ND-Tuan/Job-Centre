<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/my_account.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/header.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/rating.css">

<div style="margin-top:100px;"></div>
<div class="main-container">
        <div class="row">
            <div class="box-info" style=" width: calc(100% - 550px);">
                <div id="box-view" class="box-info-view">
                    <div id="my-infor" style="height: 3.5cm;">
                        <img src="<?php echo $actual_link ?>/public/images/default/user_background.png">
                    </div>
                    <div class="header-container" style="min-height: 5.7cm; grid-template-columns: 4.5cm auto;">
                        <div style="position: relative; bottom: 1.2cm;left: 0.8cm;">
                            <div class="avatar-preview" style="width: 125px; height: 125px;">
                                <img src="<?php echo $actual_link ?>/public/images/avatar/<?php echo $data[0]['C_avatar']?>">
                            </div>
                        </div>
                        <div class="info-header">
                            <span style="font-size:24px; font-weight: 600;" ><?php echo $data[0]['name']?></span><br>
                            <span style="font-size:24px;"><?php echo $data[0]['job-name']?></span><br>                  
                            <span class="info-text"></i>Lĩnh vực: &nbsp;<?php echo $data[0]['career']?></span><br>
                            <span class="info-text"></i>Hình thức mong muốn: &nbsp;<?php echo $data[0]['type']?></span><br>
                            <span class="info-text"></i>Kinh nghiệm: &nbsp;<?php echo $data[0]['exp']?></span><br>
                            <span class="info-text"></i>Địa điểm làm việc mong muốn: &nbsp;<?php echo $data[0]['job-address']?></span>

                        </div>
                    </div>
                
                    <div class="info-container" >
                        <h4 class="title">Thông tin thêm</h4>
                        <div style="padding: 0px 20px  20px 20px">
                            <h2>Học Vấn</h2>
                            <div><?php foreach ($data[1] as $edu) { ?>
                                <div class="extra-item" style = "grid-template-columns: 100%; line-height: 20px; background-color: #ebebeb">
                                    <button class="extra-title" style = "background-color: #ebebeb" data-toggle="popover" data-placement="bottom" title="Mô tả" data-content="<?php echo $edu['edu-description']?>">
                                        <strong style="font-size:19px;"><?php echo $edu['major']?></strong><br>
                                    </button>
                                    <span >Tại &nbsp;<strong><?php echo $edu['school-name']?></strong></span>
                                    <span style="font-size:14px;">Từ: &nbsp;<strong><?php echo $edu['start']?>&nbsp;</strong><?php if($edu['graduatedOrNot'] == 0) {?> Đến: &nbsp;<strong><?php echo $edu['end']?></strong></span><?php }?></span>    
                                </div>
                            <?php }?></div>

                            <h2>Kinh nghiệm</h2>
                            <div><?php foreach ($data[2] as $exp) { ?>
                                <div class="extra-item" style = "grid-template-columns: 100%; line-height: 20px; background-color: #ebebeb">
                                    <button class="extra-title" style = "background-color: #ebebeb" data-toggle="popover" data-placement="bottom" title="Mô tả" data-content="<?php echo $exp['exp-description']?>">
                                        <strong style="font-size:19px;"><?php echo $exp['position']?></strong><br>  
                                    </button>
                                    <span >Tại &nbsp;<strong><?php echo $exp['company-name']?></strong></span>
                                    <span style="font-size:14px;">Từ: &nbsp;<strong><?php echo $exp['start_at']?>&nbsp;</strong><?php if($exp['end_or_not'] == 0) {?> Đến: &nbsp;<strong><?php echo $exp['end_at']?></strong></span><?php }?></span>
                                    
                                </div>
                            <?php }?></div>

                            <h2>Kĩ năng</h2>
                            <div style=" display: grid; grid-template-columns: 50% 50%;"><?php foreach ($data[3] as $skill) { ?>
                                <div class="extra-item" style = "grid-template-columns: 100%; line-height: 20px; background-color: #ebebeb">
                                    <button class="extra-title" style = "background-color: #ebebeb" data-toggle="popover" data-placement="top" title="Mô tả" data-content=" <?php echo $skill['skill-description']?>">
                                        <strong style="font-size:19px;"><?php echo $skill['skill']?></strong><br>
                                        <span >Tự đánh giá: &nbsp;<?php for($i=0; $i<$skill['rate']; $i++) echo '⭐'; ?></span>
                                    </button>
                                </div>
                            <?php }?></div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div>
                <div class="info-container" style=" margin-top:0" >
                    <h4 class="title">Thông tin cơ bản</h4>
                    <div class="description-info" style="padding: 10px 20px  20px 20px">
                        <span class="info-label"><i class="fa-solid fa-envelope fa-sm" style="margin-right:10px;"></i>Email: &nbsp;</span>
                        <strong><?php
                            if (isset($_SESSION['lever']) && $_SESSION['lever'] !=3){
                                echo $data[0]['email'];
                            }else{
                                echo "*****************";
                            }
                        ?></strong><br>

                        <span class="info-label"><i class="fa-solid fa-phone fa-sm" style="margin-right:10px;"></i>Số điện thoại: &nbsp;</span>
                        <strong><?php
                            if (isset($_SESSION['lever']) && $_SESSION['lever'] !=3){
                                echo $data[0]['phone_number'];
                            }else{
                                echo "0*** *** ***";
                            }
                        ?></strong><br>

                        <span class="info-label"><i class="fa-solid fa-location-dot fa-sm" style="margin-right:14px;"></i>Địa chỉ: &nbsp;</span>
                        <strong><?php
                            if (isset($_SESSION['lever']) && $_SESSION['lever'] !=3){
                                echo $data[0]['address'];
                            }else{
                                echo "******************";
                            }
                        ?></strong><br>

                        <span class="info-label"><i class="fa-solid fa-venus-mars fa-sm" style="margin-right:6px;"></i>Giới tính: &nbsp;</span>
                        <strong><?php
                            if ($data[0]['gender'] == 1){
                                echo "Nam";
                            }else if ($data[0]['gender'] == 2){
                                echo "Nữ";
                            }else if ($data[0]['gender'] == 0){
                                    echo "<strong>Chưa Xác định</strong>";
                            }
                        ?></strong><br>

                        <span class="info-label"><i class="fa-solid fa-cake-candles fa-sm" style="margin-right:12px;"></i>Ngày sinh: &nbsp;</span>
                        <strong><?php echo $data[0]['date-of-birth']?></strong><br>

                        <span class="info-label"><i class="fa-solid fa-graduation-cap fa-sm" style="margin-right:6px;"></i>Trình độ: &nbsp;</span>
                        <strong><?php echo $data[0]['level']?></strong><br>

                        <span class="info-label"><i class="fa-solid fa-language fa-sm" style="margin-right:6px;"></i>Ngoại ngữ: &nbsp;</span>
                        <strong><?php echo $data[0]['language_level']?></strong><br>
                    </div>
                </div>
            </div>
        </div>
</div>

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
</script>
<style>
    h2{
        margin-top: 15px;
    }
</style>
