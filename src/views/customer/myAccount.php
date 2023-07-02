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