<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/recruitment.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/header.css">

<div style="margin-top:100px;"></div>
<div class="main-container">
    <div class="content" id="box-view">
        <div class="container4">
            <div class="avatar">
                <img src="<?php echo $actual_link ?>/public/images/avatar/<?php echo $data[0]['avatar']?>" >
            </div>

            <div>
                <a class="job-title"><?php echo $data[0]['job_name']?></a>
                <p class="company-name"><?php echo $data[0]['name']?></p>
                <div class="job-deadline"><i class="fa-regular fa-clock"></i> Hạn nộp hồ sơ: <?php echo $data[0]['deadline']?></div>
            </div>

            <div>
                <?php if(isset($_SESSION['lever']) ) { ?>
                    <?php if( $_SESSION['lever'] == 2 && $_SESSION['id']==$data[0]['employer_id']) { ?>
                        <button onclick="changeView()" class="btn-apply"><i class="fas fa-edit"></i> &nbsp; CHỈNH SỬA</a>
                    <?php } elseif ($_SESSION['lever'] == 3 && $data[2] != 0 ) {?>
                        <a  onclick=" return confirm('Yêu cầu ứng tuyển này của bạn sẽ được hủy ?');" class="btn-apply" href="<?php echo $actual_link ?>/recruitment/cancelApply/<?php echo $data[0]['ID'] ?>"><i class="fa-solid fa-xmark"></i> &nbsp; HỦY ỨNG TUYỂN</a>
                    <?php } else { ?>
                        <a id="apply" class="btn-apply" href="<?php echo $actual_link ?>/recruitment/apply/<?php echo $data[0]['ID'] ?>"><i class="fa-regular fa-paper-plane" ></i> &nbsp; ỨNG TUYỂN NGAY</a>
                    <?php } ?>
                <?php } else { ?>
                    <a class="btn-apply" href="<?php echo $actual_link ?>/recruitment/apply/<?php echo $data[0]['ID'] ?>"><i class="fa-regular fa-paper-plane" ></i> &nbsp; ỨNG TUYỂN NGAY</a>
                <?php } ?>
            </div>
        </div>

        <h3 style="padding-bottom: 20px;"> 
            <?php
                if (isset($_SESSION['done'])){
                    echo "<p style='color: red;'>".$_SESSION['done']."</p>";
                    unset($_SESSION['done']);
                } else {
            ?>
                Nếu thấy tin tuyển dụng này có dấu hiệu lừa đảo hãy báo cáo 
                <a  
                    onclick=" return confirm('Bạn muốn báo cáo đơn tuyển dụng này ?');" 
                    href="<?php echo $actual_link ?>/recruitment/report/<?php echo $data[0]['ID'] ?>" 
                    style="color: red;">
                        TẠI ĐÂY.
                </a>      
            <?php } ?>
        </h3>

        <div class="container5">
            <h2 class="title">Chi tiết tin tuyển dụng</h2>
            <div class="main-box">
                <div class="box">
                    <p class="box-title">Thông tin chung</p>
                    <div class="box-infor">

                        <div class="box-item">
                            <i class="fa-solid fa-sack-dollar fa-2xl" style="color: #ff4646;"></i>
                            <div>
                                <strong>Mức lương </strong><br>
                                <span><?php echo $data[0]['wage']?></span>
                            </div>
                        </div>

                        <div class="box-item">
                            <i class="fa-solid fa-users-line fa-2xl" style="color: #ff4646;"></i>
                            <div>
                                <strong>Số lượng </strong><br>
                                <span><?php echo $data[0]['num']?></span>
                            </div>
                        </div>

                        <div class="box-item">
                            <i class="fa-solid fa-briefcase fa-2xl" style="color: #ff4646;"></i>
                            <div>
                                <strong>Hình thức làm việc </strong><br>
                                <span><?php echo $data[0]['type']?></span>
                            </div>
                        </div>

                        <div class="box-item">
                            <i class="fa-solid fa-id-card-clip fa-2xl" style="color: #ff4646;"></i>
                            <div>
                                <strong>Cấp bậc </strong><br>
                                <span><?php echo $data[0]['position']?></span>
                            </div>
                        </div>

                        <div class="box-item">
                            <i class="fa-solid fa-venus-mars fa-2xl" style="color: #ff4646;"></i>
                            <div>
                                <strong>Giới tính yêu cầu </strong><br>
                                <span><?php echo $data[0]['gender']?></span>
                            </div>
                        </div>

                        <div class="box-item">
                            <i class="fa-sharp fa-solid fa-scroll fa-2xl" style="color: #ff4646;"></i>
                            <div>
                                <strong>Kinh nghiệm </strong><br>
                                <span><?php echo $data[0]['exp']?></span>
                            </div>
                        </div>


                    </div>
                </div>
                <div></div>
                <div class="box">
                    <p class="box-title">Địa điểm làm việc</p>
                    <textarea disabled="disabled"  class="address-info"><?php echo $data[0]['job_address']?></textarea>
                </div>
            </div>
            <h3>Mô tả công viêc</h3>
            <textarea disabled="disabled" class="textarea-info" id="info"><?php echo $data[0]['job_description']?></textarea>

            <h3>Yêu cầu ứng viên</h3>
            <textarea disabled="disabled" class="textarea-info" id="info"><?php echo $data[0]['request']?></textarea>

            <h3>Quyền lợi</h3>
            <textarea disabled="disabled" class="textarea-info" id="info"><?php echo $data[0]['interest']?></textarea>
        </div>
    </div>

    <form id="box-edit" class="form hidden"  method="post" action="<?php echo $actual_link ?>/recruitment/update/<?php echo $data[0]['ID']?>">
            <div class="input-value">
                <div class="container">
                    <div class="name-title">
                        Ngành nghề
                    </div>
                    <div></div>
                    <div class="name-title">
                        Công việc
                    </div>
                </div>
                <div class="container">
                    <select class="select-input"  name="career_id"  style="font-size: 14px;">
                        <option value="<?php echo $data[0]['id']?>"><?php echo $data[0]['career_name']?></option>
                        <?php foreach ($data[1] as $career) { ?>
                            <option value="<?php echo $career['id']?>"><?php echo $career['career_name']?></option>
                        <?php } ?>
                    </select>
                    <div></div>
                    <input class="select-input" name="job_name" type="text" value="<?php echo $data[0]['job_name']?>" placeholder="Nhập tên công việc" required>
                </div>
            </div>

            <div class="input-value">
                <div class="container2">                
                    <div class="name-title">
                        Hình thức
                    </div>
                    <div></div>
                    <div class="name-title">
                        Số lượng tuyển
                    </div>
                    <div></div>
                    <div class="name-title">
                        Giới tính yêu cầu
                    </div>
                </div>
                <div class="container2"> 
                    <select class="select-input" name="type" id="">
                        <option value="<?php echo $data[0]['type']?>"><?php echo $data[0]['type']?></option>
                        <option value="Toàn thời gian">Toàn thời gian</option>
                        <option value="Bán thời gian">Bán thời gian</option>
                    </select>
                    <div></div>
                    <input name="num" value="<?php echo $data[0]['num']?>" class="select-input"  type="number" required>  
                    <div></div>
                    <select class="select-input" name="gender" >
                        <option value="<?php echo $data[0]['gender']?>"><?php echo $data[0]['gender']?></option>
                        <option value="Không">Không</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>      
                </div>
            </div>
            
            <div class="input-value">
                <div class="container3">
                    <div class="name-title">
                        Vị trí
                    </div>
                    <div></div>
                    <div class="name-title">
                        Kinh nghiệm
                    </div>
                </div>
                <div class="container3">
                    <input class="select-input" value="<?php echo $data[0]['position']?>" name="position" type="text" placeholder="Nhập vị trí tuyển dụng" required>
                    <div></div>
                    <select class="select-input" name="exp" id="">
                        <option value="<?php echo $data[0]['exp']?>"><?php echo $data[0]['exp']?></option>
                        <option value="Không yêu cầu kinh nghiệm">Không yêu cầu kinh nghiệm</option>
                        <option value="Dưới 1 năm">Dưới 1 năm</option>
                        <option value="1 năm">1 năm</option>
                        <option value="2 năm">2 năm</option>
                        <option value="3 năm">3 năm</option>
                        <option value="4 năm">4 năm</option>
                        <option value="5 năm">5 năm</option>
                        <option value="Trên 5 năm">Trên 5 năm</option>
                    </select>
                </div>
            </div>

            <div class="input-value">
                <div class="container3">
                    <div class="name-title">
                        Mức lương
                    </div>
                    <div></div>
                    <div class="name-title">
                        Hạn ứng tuyển
                    </div>
                </div>
                <div class="container3">
                    <input class="select-input" value="<?php echo $data[0]['wage']?>" list="browsers" name="wage" type="text" placeholder="Nhập mức lương" required>
                    <datalist id="browsers">
                        <option value="Thỏa thuận">
                        <option value="Dưới 5 triệu">
                        <option value="5-10 triệu">
                        <option value="10-15 triệu">
                        <option value="15-20 triệu">
                        <option value="20-30 triệu">
                        <option value="Trên 30 triệu">
                    </datalist>                    
                    <div></div>
                    <input class="select-input" value="<?php echo $data[0]['deadline']?>"  name="deadline" type="date" request>
                </div>
            </div>

            <div class="input-value">
                <div class="name-title">
                    Địa điểm làm việc
                </div>
                <textarea name="address"  class="textarea-info" id="info" placeholder="Nhập địa điểm làm việc" style="height: 70px" request><?php echo $data[0]['job_address']?></textarea>
            </div>

            <div class="input-value">
                <div class="name-title">
                    Mô tả công việc
                </div>
                <textarea name="description"  class="textarea-info" id="info" placeholder="Nhập mô tả công việc"><?php echo $data[0]['job_description']?></textarea>
            </div>

            <div class="input-value">
                <div class="name-title">
                    Yêu cầu ứng viên
                </div>
                <textarea  name="request"  class="textarea-info" id="info" placeholder="Nhập yêu cầu cho ứng viên"><?php echo $data[0]['request']?></textarea>
            </div>

            <div class="input-value">
                <div class="name-title">
                    Quyền lợi
                </div>
                <textarea name="interest"  class="textarea-info" id="info" placeholder="Nhập quyền lợi của nhân viên"><?php echo $data[0]['interest']?></textarea>
            </div>

            
            <div class="input-value">
                <button type="submit">Cập nhật</button>
            </div>
        </form>
</div>
<script src="<?php echo $actual_link ?>/public/javascript/myCompany.js"></script>
<script>
    document.querySelectorAll("#info").forEach(element => {
        function autoResize(el) {
        el.style.height = el.scrollHeight + 'px';
        }
        autoResize(element);
        element.addEventListener('input', () => autoResize(element));
    });

    document.getElementById('apply').onclick = function(){
        alert("Hồ sơ của bạn sẽ được chuyển đến cho nhà tuyển dụng.\nVui lòng đợi thông báo từ nhà tuyển dụng!");
    }

</script>
