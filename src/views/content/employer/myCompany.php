<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/my_company.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/my_account.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/header.css">
<div style="margin-top:120px;">

<div class="main-container">
    <div class="content" >
        <div class="container">
            <div class="background">
                <img src="<?php echo $actual_link ?>/public/images/default/company.jpg">
            </div>
            <div class="title-box">
                <div style="position: relative; bottom: 1.8cm;left: 0.7cm;">
                    <div class="avatar">
                        <img src="<?php echo $actual_link ?>/public/images/avatar/<?php echo $_SESSION['avatar']?>">
                        <img id="change-avatar" src="<?php echo $actual_link ?>/public/images/default/change-avatar.png">
                    </div>
                </div>
                <div>
                    <div class="conpany-title"><?php echo $data['name']?></div>
                    <div class="conpany-email"><i class="fa-solid fa-envelope" style="margin-right:8px;"></i><?php echo $data['email']?></div>
                </div>
                <div>
                    <a class="btn-recruitment" href="<?php echo $actual_link?>/recruitment/create_recruitment"><i class="fa-regular fa-paper-plane" ></i> &nbsp; ĐĂNG TIN TUYỂN DỤNG</a>
                    <a class="btn-edit" id="btn-edit" ><i class="fa-solid fa-pen-to-square"></i> &nbsp; CHỈNH SỬA THÔNG TIN</a>
                    <a class="btn-edit hidden" id="btn-back" href="<?php echo $actual_link?>/employer/myCompany"><i class="fa-solid fa-rotate-left"></i> &nbsp; TRỞ LẠI</a>
                </div>
            </div>
        </div>

        <?php
            if (isset($_SESSION['done'])){
                echo "<span style='color: blue;'>Cập nhập tài khoản thành công</span>";
                unset($_SESSION['done']);
            }else if (isset($_SESSION['error'])){
                echo "<span style='color: red;'>Lỗi trùng Email</span>";
                unset($_SESSION['error']);
            } 
        ?>

        <div class="box-info" id="box-view">
            <div class="container2">
                <h4 class="title">Giới Thiệu Công Ty</h4>
                <textarea disabled="disabled" class="textarea-info" id="info"><?php echo $data['description']?></textarea>
            </div>
            <div></div>
            <div>
                <div class="container2">
                    <h4 class="title">Thông Tin Liên Lạc</h4>
                    <textarea disabled="disabled" class="textarea-info" id="info"><?php echo $data['contact_info']?></textarea>
                </div>
                <div class="container2">
                    <h4 class="title">Địa Chỉ Công Ty</h4>
                    <textarea disabled="disabled" class="textarea-info" id="info"><?php echo $data['address']?></textarea>
                </div>
            </div>
        </div>

        <div class="container3" hidden id="box-edit">
            <h4 class="title">Thay đổi thông tin</h4>
            <form class="form" method="post" action="<?php echo $actual_link ?>/employer/update">
                <div class="input-title">Tên công ty</div>
                <input class="select-input" name="company_name" type="text" value="<?php echo $data['name']?>" placeholder="Nhập tên công ty" required>

                <div class="input-title">Email</div>
                <input class="select-input" name="email" type="email" value="<?php echo $data['email']?>" placeholder="Nhập email" required>
               
                <div class="input-title">Thông tin liên lạc</div>
                <textarea class="text-input" name="contact-info"   placeholder="Nhập thông tin liên lạc"><?php echo $data['contact_info']?></textarea>

                <div class="input-title">Địa chỉ</div>
                <textarea class="text-input" name="address"  placeholder="Nhập địa chỉ công ty" request><?php echo $data['address']?></textarea>

                <div class="input-title">Giới thiệu</div>
                <textarea class="text-input" name="description"  placeholder="Nhập giới thiệu công ty"><?php echo $data['description']?></textarea>

                <div class="btn-box">
                    <button type="submit" class="submit-btn">
                        Cập nhật thông tin tài khoản
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="popup" class="change-avatar-box">
    <div class="change-avatar-box-content">
        <label class="close" id="change-avatar-box-close">&times;</label>
        <h3>Thay ảnh đại diện</h3>
        <form action="<?php echo $actual_link ?>/employer/updateAvatar" method="post"  class="change-avatar-container" enctype="multipart/form-data"> 
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
<script>
  document.querySelectorAll("#info").forEach(element => {
    function autoResize(el) {
      el.style.height = el.scrollHeight + 'px';
    }
    autoResize(element);
    element.addEventListener('input', () => autoResize(element));
  });
</script>
