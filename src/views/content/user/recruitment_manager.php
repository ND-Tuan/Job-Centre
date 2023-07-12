<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/recruitment.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/header.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/jobs.css">

<div style="margin-top:100px;"></div>
<div class="form">
    <div class="form-fill">
        <div class="form-all">
            <input id="search-input" type="search" class="search-input1" size="35px" placeholder="Tìm kiếm" value="<?php echo $data[0]?>">
            <a id="search" href="recruitment_manager&search=">
                <button class="search-btn1"><i class="icon-search fa-solid fa-magnifying-glass"></i></button>
            </a>
        </div>
    </div>
</div>
<section>
    <div class="main-container">
        <?php foreach ($data[1] as $jobs) { ?>
            <div class="content" >
                <div class="recruitment-box" style="justify-content: flex-start;">
                    <div class="myRecruitment">
                        <a href="<?php echo $actual_link ?>/recruitment/job_detail/<?php echo $jobs['ID'] ?>"  class="recruitment-img">
                            <img width="auto" height="200" src="<?php echo $actual_link ?>/public/images/avatar/<?php echo $jobs['avatar'] ?>" alt="">
                        </a>
                        <div style=" display: flex; justify-content: space-between; width:100%; align-items: center;">
                            <div>
                                <a class="job-title" style="font-size: 22px;" href="<?php echo $actual_link ?>/recruitment/job_detail/<?php echo $jobs['ID'] ?>" style="font-size: 25px;"><?php echo $jobs['job_name']?></a><br>
                                <a href="<?php echo $actual_link ?>/recruitment/company_detail/<?php echo $jobs['employer_id'] ?>" class="company-name"><?php echo $jobs["name"]?></a> <br>
                                <div class="more-info" style="color: #ffffff; background-color: #929292ec;"><i class="uil uil-user icon"></i><?php echo " ".$jobs["num-of-apply"]?></div> 
                                <div class="more-info"><i class="fa-regular fa-clock"></i><?php echo  " ".$jobs['deadline']?></div>
                                <div class="more-info"><i class="uil uil-coins icon"></i><?php echo " ".$jobs["wage"]?></div> 
                                <div class="more-info" style="max-width: 300px;"><i class="uil uil-location-point icon"></i><?php echo " ".$jobs["job_address"]?></div>
                            </div>

                            <div>
                                <a class="btn-apply" 
                                onclick=" return confirm('Bạn có chắc muốn gỡ đơn tuyển dụng này ?');" 
                                style="min-width: 80px; font-weight: 700;"
                                href="<?php echo $actual_link ?>/recruitment/job_delete/<?php echo $jobs['ID'] ?>">
                                <i class="far fa-trash-alt"></i>&nbsp; Xóa</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>
</section>
<script>
        document.getElementById('search-input').addEventListener('keyup', function(e) {
            document.getElementById('search').href = "recruitment_manager&search=" + this.value;
        })
</script>
