<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/jobs.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/header.css">
<!-- Main-container section start -->
<div style="margin-top:90px;">
<section class="container-main">

        <div class="search-container">
            <form action="<?php echo $actual_link ?>/recruitment/search_jobs" method="post" class="form" style="background-image: url(<?php echo $actual_link ?>/public/images/default/home.jpg);">
                
                <div class="basic-search">
                    <div class="search-title">Tìm Việc</div>
                    <input class="search-input" style="min-width: 50%" type="text" name="job-name" placeholder="Nhập từ khóa tìm kiếm công việc">
                    <input class="search-input" type="text" name="job-address" placeholder="Nhập địa điểm làm việc">
                    <button type="submit" class="search-btn">
                        Tìm kiếm
                    </button>
                </div>

                <div class="advanced-search">
                    <div class="content">
                        <div style=" display: grid; grid-template-columns: 58% 2% 40%;">
                            <div>
                                <div class="advanced-title">Ngành nghề:</div>
                                <select class="search-input"  name="career">
                                    <option value="">Chọn ngành nghề</option>
                                    <?php foreach ($data[2] as $career) { ?>
                                        <option value="<?php echo $career['id']?>"><?php echo $career['career_name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div></div>
                            <div>
                            <div class="advanced-title">Yêu cầu giới tính:</div>
                                <select class="search-input"  name="gender" >
                                    <option value="">-Tất cả-</option>
                                    <option value="Không">Không</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div></div>
                        <div>
                            <div class="advanced-title">Hình thức :</div>
                            <select class="search-input" name="type" id="">
                                <option value="">-Tất cả-</option>
                                <option value="Toàn thời gian">Toàn thời gian</option>
                                <option value="Bán thời gian">Bán thời gian</option>
                            </select>
                        </div>
                        <div>
                            <div class="advanced-title">Yêu cầu kinh nghiệm:</div>
                            <select class="search-input" name="exp" id="">
                                <option value="">-Tất cả-</option>
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
                        <div></div>
                        <div>
                            <div class="advanced-title">Mức lương:</div>
                            <input class="search-input" list="browsers" type="text" name="wage" placeholder="Nhập mức lương mong muốn">
                            <datalist id="browsers">
                                <option value="Thỏa thuận">
                                <option value="Dưới 5 triệu">
                                <option value="5 - 10 triệu">
                                <option value="10 - 15 triệu">
                                <option value="15 - 20 triệu">
                                <option value="20 - 30 triệu">
                                <option value="Trên 30 triệu">
                            </datalist>
                        </div>
                    </div>
                </div>
            </form>
            <button class="advanced-search-btn" id="btn">Tìm kiếm nâng cao</button>
            <h1 style="position:relative; top: 40px;">Tìm việc làm nhanh</h1>
        </div>

        <div class="jobs-group">
            
            <?php foreach ($data[1] as $jobs) { ?>
                <div class="box">
                    <div class="content-area">
                        <a href="<?php echo $actual_link ?>/recruitment/job_detail/<?php echo $jobs['ID'] ?>"  class="content-img">
                            <img width="auto" height="200" src="<?php echo $actual_link ?>/public/images/avatar/<?php echo $jobs['avatar'] ?>" alt="">
                        </a>
                
                        <div class="content-disc">
                            <a href="<?php echo $actual_link ?>/recruitment/job_detail/<?php echo $jobs['ID'] ?>" >
                            <strong class="job-title"><?php echo $jobs["job_name"]?></strong></a><br>
                            <a href="<?php echo $actual_link ?>/recruitment/company_detail/<?php echo $jobs['employer_id'] ?>" class="company-name"><?php echo $jobs["name"]?></a> 
                            
                        </div>
                    </div>
                    <div class="more-info"><i class="uil uil-coins icon"></i><?php echo " ".$jobs["wage"]?></div> 
                    <div class="more-info"><i class="uil uil-location-point icon"></i><?php echo " ".$jobs["job_address"]?></div> 
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- Main-container section end -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".advanced-search").slideUp(0.001);
        $(".advanced-search-btn").click(function(){
            if($("#btn").text() == "Tìm kiếm nâng cao"){
                $(".advanced-search").slideUp();
            } else {
                $(".advanced-search").slideDown();
            }
        });
    });
</script>
<script>
    var btn = document.getElementById("btn");
    btn.onclick = function(){
        if(btn.innerHTML == "Tìm kiếm nâng cao"){
            btn.innerHTML = "Tìm kiếm cơ bản";
        } else {   
            btn.innerHTML = "Tìm kiếm nâng cao";
        }
    }
</script>

    
