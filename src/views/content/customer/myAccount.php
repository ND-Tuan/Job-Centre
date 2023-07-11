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

                    <div class="extra-container" >
                        <div class="extra-content">
                            <div style="max-width: 80%">
                                <h2>Kinh nghiệm</h2>
                                <span >Kinh nghiệm làm việc là “chìa khóa vàng” để ứng viên chinh phục nhà tuyển dụng thông qua văn bản.</span>
                            </div>
                            <button class="btn-ad" id="addExp">Thêm mục</button>
                        </div>
                        
                        <div><?php foreach ($data[2] as $exp) { ?>
                            <div class="extra-item" >
                                <button class="extra-title" data-toggle="popover" data-placement="bottom" title="Mô tả" data-content="<?php echo $exp['exp-description']?>">
                                    <strong style="font-size:19px;"><?php echo $exp['position']?></strong><br>
                                    <span >Tại &nbsp;<strong><?php echo $exp['company-name']?></strong></span>
                                </button>
                                <div style="display: flex;justify-content: space-between;">
                                    <div>
                                        <span style="font-size:14px;">Từ: &nbsp;<strong><?php echo $exp['start_at']?></strong></span>
                                        <?php if($exp['end_or_not'] == 0) {?>  
                                            <br><span style="font-size:14px;">Đến: &nbsp;<strong><?php echo $exp['end_at']?></strong></span>
                                        <?php }?>
                                    </div>
                                    <a 
                                        class="btn-add" 
                                        id="delete" onclick=" return confirm('Bạn có chắc muốn xóa nội dung này ?');" 
                                        href="<?php echo $actual_link ?>/customer/delete_exp/<?php echo $exp['id']?>" 
                                        style="font-size:16px;"
                                    >Xóa</a>
                                </div>
                                
                            </div>
                        <?php }?></div>
                    </div>

                    <div class="extra-container" >
                        <div class="extra-content">
                            <div style="max-width: 80%">
                                <h2>Kĩ năng</h2>
                                <span >Thêm các kỹ năng bạn có giúp người khác hiểu được điểm mạnh của bạn.</span>
                            </div>
                            <button class="btn-ad" id="addSkill">Thêm mục</button>
                        </div>

                        <div id="skill" style=" display: grid; grid-template-columns: 50% 50%; padding: 10px;"><?php foreach ($data[3] as $skill) { ?>
                            <div class="extra-item" style=" margin: 4px;" >
                                <button class="extra-title" data-toggle="popover" data-placement="top" title="Mô tả" data-content=" <?php echo $skill['skill-description']?>">
                                    <strong style="font-size:19px;"><?php echo $skill['skill']?></strong><br>
                                    <span >Tự đánh giá: &nbsp;<?php for($i=0; $i<$skill['rate']; $i++) echo '⭐'; ?></span>
                                </button>
                                <div style="display: flex;justify-content: space-between;">
                                    <div>
                                    </div>
                                    <a 
                                        class="btn-add"
                                        id="delete"
                                        onclick=" return confirm('Bạn có chắc muốn xóa nội dung này ?');"
                                        href="<?php echo $actual_link ?>/customer/delete_skill/<?php echo $exp['id']?>"
                                        style="font-size:16px;"
                                    >Xóa</a>
                                </div>
                            </div>
                        <?php }?></div>
                    </div>
                    
                </div>

                <form action="<?php echo $actual_link ?>/customer/update" method="post" id="box-edit" class="box-info-view hidden" enctype="multipart/form-data[0]">
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
                                <div>
                                    <strong class="info-label"> Ngày sinh: </strong><br>
                                    <input class="input-set-new-value" name="date-of-birth" type="date" value="<?php echo $data[0]['date-of-birth']?>" required>
                                </div>
                            </div>

                            <strong class="info-label">Email: </strong><br>
                            <input id="email-regex" name="email" class="input-set-new-value" type="email" value="<?php echo $data[0]['email']?>" required>
                            
                            <strong class="info-label">Điện thoại: </strong><br>
                            <input id="phone-regex" name="phone_number" class="input-set-new-value" type="text" value="<?php echo $data[0]['phone_number']?>" required>

                            <strong class="info-label">Trình độ: </strong><br>
                            <select class="input-set-new-value" name="level">
                                <option value="Không có trình độ chuyên môn kỹ thuật">Không có trình độ chuyên môn kỹ thuật</option>
                                <option value="Chứng chỉ/Chứng nhận học nghề (dưới 3 tháng)">Chứng chỉ/Chứng nhận học nghề (dưới 3 tháng)</option>
                                <option value="Sơ cấp nghề/Chứng chỉ học nghề ngắn hạn">Sơ cấp nghề/Chứng chỉ học nghề ngắn hạn</option>
                                <option value="Bằng nghề dài hạn/Trung cấp nghề/Trung cấp chuyên nghiệp">Bằng nghề dài hạn/Trung cấp nghề/Trung cấp chuyên nghiệp</option>
                                <option value="Cao đẳng nghề/ Cao đẳng chuyên nghiệp">Cao đẳng nghề/ Cao đẳng chuyên nghiệp</option>
                                <option value="Đại học">Đại học</option>
                                <option value="Thạc sĩ">Thạc sĩ</option>
                                <option value="Tiến sĩ">Tiến sĩ</option>
                            </select>

                            <strong  class="info-label">Ngoại ngữ </strong><br>
                            <textarea class="box-set-new-value" name="language" placeholder="Nhập chứng chỉ ngoại ngữ của bạn (nếu có)"><?php echo $data[0]['language_level']?></textarea>
                        
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
                    <div class="box-control-config">
                        <label class="switch">
                            <input type="checkbox" id = "switch">
                            <span class="slider round"></span>
                        </label>
                        <strong id="info" style="color: red;">Trạng thái tìm việc đang tắt</strong>
                    </div>
                    <div id="btnJob">
                        <button class="btn-add" style="background-color: #2196F3; font-size: 16px; padding: 4px 16px 8px 12px;">
                            Mong muốn việc làm
                        </button> 
                    </div>
                    <p style="margin: 10px 0 40px 0;">Bật tìm việc để nhận được nhiều cơ hội việc làm tốt nhất từ JobCentre.</p>
                    <a href="<?php echo $actual_link ?>/customer/change_password/">
                        Thay đổi mật khẩu
                    </a>
                    
                </div>
            </div>
        </div>
</div>

<div class="extra-popup-box" id="edu-extra-popup">
    <div class="content">
        <label class="close" onclick="closePopup()">&times;</label><br>
        <h2>Kinh nghiệm</h2>
        <form action="<?php echo $actual_link ?>/customer/add_edu" method="post"  class="detail-form">
            <strong class="info-label">Trường học: </strong><br>
            <input name="school" class="input-set-new-value" type="text" required>

            <strong class="info-label">Chuyên ngành: </strong><br>
            <input name="major" class="input-set-new-value" type="text" required>

            <strong class="info-label">Thời gian: </strong><br>
            <span><input class="info-label" name="graduatedOrNot" id="graduatedOrNot" value="1" type="checkbox"/>&nbsp; Tôi đang học ở đây</span><br>

            <div class="box-btn-config">
                <div>
                    <span class="info-label">Bắt đầu: </span><br>
                    <input class="input-set-new-value" name="eduStart" type="month" required>
                </div>
                <div></div>
                <div id="eduEnd">
                    <span class="info-label">Kết thúc: </span><br>
                    <input class="input-set-new-value" name="eduEnd" type="month" >
                </div>
            </div>

            <strong class="info-label">Mô tả chi tiết: </strong><br>
            <textarea class="textarea" name="edu-description" placeholder="Mô tả chi tiết quá trình học của bạn"></textarea>
            
            <div class="change-avatar-detail-container">
                <button type="submit" class="btn-add" style="width: 30%;">
                    Cập nhật 
                </button>
            </div>
        </form>
    </div>
</div>

<div class="extra-popup-box" id="exp-extra-popup">
    <div class="content">
        <label class="close" onclick="closePopup()">&times;</label><br>
        <h2>Kinh nghiệm</h2>
        <form action="<?php echo $actual_link ?>/customer/add_exp" method="post"  class="detail-form">
            <strong class="info-label">Công ty: </strong><br>
            <input name="company" class="input-set-new-value" type="text" required>

            <strong class="info-label">Chức vụ: </strong><br>
            <input name="position" class="input-set-new-value" type="text" required>

            <strong class="info-label">Thời gian: </strong><br>
            <span><input class="info-label" name="endOrNot" id="endOrNot" value="1" type="checkbox"/>&nbsp; Tôi đang làm việc ở đây</span><br>

            <div class="box-btn-config">
                <div>
                    <span class="info-label">Bắt đầu: </span><br>
                    <input class="input-set-new-value" name="start" type="month" required>
                </div>
                <div></div>
                <div id="end">
                    <span class="info-label">Kết thúc: </span><br>
                    <input class="input-set-new-value" name="end" type="month" >
                </div>
            </div>

            <strong class="info-label">Mô tả chi tiết: </strong><br>
            <textarea class="textarea" name="exp-description" placeholder="Mô tả chi tiết công việc, những gì đạt được trong quá trình làm việc"></textarea>
            
            <div class="change-avatar-detail-container">
                <button type="submit" class="btn-add" style="width: 30%;">
                    Cập nhật 
                </button>
            </div>
        </form>
    </div>
</div>

<div class="extra-popup-box" id="skill-extra-popup">
    <div class="content">
        <label class="close" onclick="closePopup()" >&times;</label><br>
        <h2>Kĩ năng</h2>
        <form action="<?php echo $actual_link ?>/customer/add_skill" method="post"  class="detail-form">
            <strong class="info-label">Tên kỹ năng: </strong><br>
            <input name="skill" class="input-set-new-value" type="text" required>

            <strong class="info-label">Đánh giá: </strong><br>
            <div style="min-height: 76px;">
                <div class="center">
                    <div class="stars">
                        <input type="radio" id="five" name="rate" value="5">
                        <label for="five"></label>
                        <input type="radio" id="four" name="rate" value="4">
                        <label for="four"></label>
                        <input type="radio" id="three" name="rate" value="3">
                        <label for="three"></label>
                        <input type="radio" id="two" name="rate" value="2">
                        <label for="two"></label>
                        <input type="radio" id="one" name="rate" value="1">
                        <label for="one"></label>
                        <span class="result"></span>
                    </div>
                </div>
            </div>
            
            <strong class="info-label">Mô tả chi tiết: </strong><br>
            <textarea class="textarea" name="skill-description" placeholder="Mô tả chi tiết kỹ năng"></textarea>
            <div class="change-avatar-detail-container">
                <button type="submit" class="btn-add" style="width: 30%;">
                    Cập nhật 
                </button>
            </div>
        </form>
    </div>
</div>

<div class="extra-popup-box" id="job-looking-popup">
    <div class="content">
        <label class="close" onclick="closePopup()" >&times;</label><br>
        <h2>Mong muốn việc làm</h2>
        <form action="<?php echo $actual_link ?>/customer/job_looking" method="post" id="looking-form"  class="detail-form">
            <strong class="info-label">Chọn Ngành/Nghề bạn quan tâm: </strong><br>
            <select class="input-set-new-value"  name="career" style="font-size: 14px;">
                <option value="<?php echo $data[0]['career']?>"><?php echo $data[0]['career']?></option>
                <?php foreach ($data[4] as $career) { ?>
                    <option value="<?php echo $career['career_name']?>"><?php echo $career['career_name']?></option>
                <?php } ?>
            </select>

            <strong class="info-label">Công việc mong muốn: </strong><br>
            <input class="input-set-new-value" value="<?php echo $data[0]['job-name']?>" name="job_name" type="text" placeholder="Nhập tên công việc" required>

            <strong class="info-label">Hình thức: </strong><br>
            <select class="input-set-new-value" name="type">
                <option value="<?php echo $data[0]['type']?>"><?php echo $data[0]['type']?></option>
                <option value="Toàn thời gian">Toàn thời gian</option>
                <option value="Bán thời gian">Bán thời gian</option>
            </select>

            <strong class="info-label">Kinh nghiệm ngành/nghề đã chọn: </strong><br>
            <select class="input-set-new-value" name="exp" >
                <option value="<?php echo $data[0]['exp']?>"><?php echo $data[0]['exp']?></option>
                <option value="Chưa có kinh nghiệm">Chưa có kinh nghiệm</option>
                <option value="Dưới 1 năm">Dưới 1 năm</option>
                <option value="1 năm">1 năm</option>
                <option value="2 năm">2 năm</option>
                <option value="3 năm">3 năm</option>
                <option value="4 năm">4 năm</option>
                <option value="5 năm">5 năm</option>
                <option value="Trên 5 năm">Trên 5 năm</option>
            </select>
            
            <strong class="info-label">Địa điểm làm việc: </strong><br>
            <textarea class="textarea" name="job_address" placeholder="Nhập địa điểm làm việc" required><?php echo $data[0]['job-address']?></textarea>

            <input class="hidden" id="check" name = "check" type="text" value= "1">

            <div class="change-avatar-detail-container">
                <button type="submit" class="btn-add" style="width: 30%;">
                    Cập nhật 
                </button>
            </div>
        </form>
    </div>
</div>

<div id="popup" class="change-avatar-box">
    <div class="change-avatar-box-content">
        <label class="close" id="change-avatar-box-close">&times;</label>
        <h3>Thay ảnh đại diện</h3>
        <form action="<?php echo $actual_link ?>/customer/updateAvatar" method="post"  class="change-avatar-container" enctype="multipart/form-data"> 
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

    var IsCheck = <?php echo json_encode($data[0]['job-looking']); ?>;
    if(IsCheck ==1){
        document.getElementById("switch").checked = true;
        document.getElementById('info').style.color = "#2196F3";
        document.getElementById('btnJob').style.display = "block"
        document.getElementById('info').innerHTML = "Trạng thái tìm việc đã bật";
    } else {
        document.getElementById("switch").checked = false;
        document.getElementById('info').style.color = "red";
        document.getElementById('btnJob').style.display = "none"
        document.getElementById('info').innerHTML = "Trạng thái tìm việc đang tắt";
    }
</script>
