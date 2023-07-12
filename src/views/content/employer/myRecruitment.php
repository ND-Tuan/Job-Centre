<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/recruitment.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/header.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/jobs.css">

<div style="margin-top:100px;"></div>
<section>
    <div class="main-container">
        <?php foreach ($data[0] as $jobs) { ?>
            <div class="content" >
                <div class="recruitment-box">
                    <div class="myRecruitment">
                        <div>
                            <a class="job-title" style="font-size: 22px;" href="<?php echo $actual_link ?>/recruitment/job_detail/<?php echo $jobs['ID'] ?>" style="font-size: 25px;"><?php echo $jobs['job_name']?></a><br>
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

                    <div id="apply" class="application-box"><?php foreach ($data[1] as $apply) { ?>
                        <?php if($apply['job_id'] == $jobs['ID']) { ?>
                            <div class="application">
                                <div class="application-info">
                                    <div class="content-area">
                                        <a href="<?php echo $actual_link ?>/home/viewCV/<?php echo $apply['id'] ?>"  class="content-img">
                                            <img width="auto" height="200" src="<?php echo $actual_link ?>/public/images/avatar/<?php echo $apply['C_avatar']?>" alt="">
                                        </a>
                                
                                        <div class="content-disc">
                                            <a href="<?php echo $actual_link ?>/home/viewCV/<?php echo $apply['id'] ?>" >
                                            <strong class="job-title"><?php echo $apply["name"]." "?></strong></a>

                                            <?php if($apply['gender'] == 1) { ?>
                                                <i style=" color: deepskyblue;" class="fa-solid fa-mars"></i>
                                            <?php } elseif($apply['gender'] == 2) { ?>
                                                <i style="color: tomato;" class="fa-solid fa-venus"></i>
                                            <?php } ?>

                                            <p class="company-name" style="margin-top: -5px;"><i class="fa-solid fa-cake-candles fa-xs"></i><?php echo "  ".$apply["date-of-birth"]?></p> 
                                        </div>
                                    </div>
                                    <a style="font-weight: 700; color:  #DD3332;" 
                                    onclick=" return confirm('Bạn có chắc muốn loại ứng viên này ?');"
                                    href="<?php echo $actual_link ?>/recruitment/apply_delete/<?php echo $apply['customer_id'] ?>/<?php echo $apply['job_id'] ?>">
                                    <i class="fa-solid fa-xmark"></i>&nbsp;Loại</a>
                                </div>
                                <strong><i class="fa-solid fa-graduation-cap fa-xs"></i>&nbsp;Trình độ:</strong><span>&nbsp;<?php echo $apply['level']?></span>
                            </div>
                        <?php } ?>
                    <?php } ?></div>
                </div>

            </div>
        <?php } ?>
    </div>
</section>
<script>
   document.querySelectorAll('#apply').forEach(element =>{
        if(element.offsetHeight <= 20){
            element.style.display = "none";
        }
    })
</script>
