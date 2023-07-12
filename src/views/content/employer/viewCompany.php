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
                        <img src="<?php echo $actual_link ?>/public/images/avatar/<?php echo $data[0]['avatar']?>">
                    </div>
                </div>
                <div>
                    <div class="conpany-title"><?php echo $data[0]['name']?></div>
                    <div class="conpany-email"><i class="fa-solid fa-envelope" style="margin-right:8px;"></i><?php echo $data[0]['email']?></div>
                </div>
                <div>
                </div>
            </div>
        </div>

        <div class="box-info" id="box-view">
            <div>
                <div class="container2">
                    <h4 class="title">Giới Thiệu Công Ty</h4>
                    <textarea disabled="disabled" class="textarea-info" id="info"><?php echo $data[0]['description']?></textarea>
                </div>
                <div class="container2">
                    <h4 class="title">Tin Tuyển Dụng</h4>
                    <div style="padding: 0px 20px  20px 20px">
                        <?php foreach ($data[1] as $job) { ?>
                            <div class="recruitment-container">
                                <div>
                                    <a style="font-size: 18px; font-weight: 700"><?php echo $job['job_name']?></a><br>
                                    <div class="more-info"><i class="uil uil-coins icon"></i><?php echo " ".$job["wage"]?></div> 
                                    <div class="more-info"><i class="uil uil-location-point icon"></i><?php echo " ".$job["job_address"]?></div> 
                                    <div style="font-size: 14px; font-weight: 600" ><i class="fa-regular fa-clock"></i> Hạn nộp hồ sơ: <?php echo $job['deadline']?></div>
                                </div>
                                
                                <div>
                                    <a href="<?php echo $actual_link ?>/recruitment/job_detail/<?php echo $job['ID'] ?>" class="btn-recruitment" style="min-width: 0px;"> &nbsp; CHI TIẾT</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div></div>
            <div>
                <div class="container2">
                    <h4 class="title">Thông Tin Liên Lạc</h4>
                    <textarea disabled="disabled" class="textarea-info" id="info"><?php echo $data[0]['contact_info']?></textarea>
                </div>
                <div class="container2">
                    <h4 class="title">Địa Chỉ Công Ty</h4>
                    <textarea disabled="disabled" class="textarea-info" id="info"><?php echo $data[0]['address']?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  document.querySelectorAll("#info").forEach(element => {
    function autoResize(el) {
      el.style.height = el.scrollHeight + 'px';
    }
    autoResize(element);
    element.addEventListener('input', () => autoResize(element));
  });
</script>
