<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/jobs.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/header.css">
<!-- Main-container section start -->
<div style="margin-top:90px;">
<section class="container-main">

        <div class="search-container">
            <form action="<?php echo $actual_link ?>/home/search_cv" method="post" class="form" style="background-image: url(<?php echo $actual_link ?>/public/images/default/home.jpg);">
                
                <div class="basic-search">
                    <div class="search-title">Tìm Người</div>
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
                                    <?php foreach ($data[1] as $career) { ?>
                                        <option value="<?php echo $career['career_name']?>"><?php echo $career['career_name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div></div>
                            <div>
                            <div class="advanced-title">Giới tính:</div>
                                <select class="search-input"  name="gender" >
                                    <option value="">-Tất cả-</option>
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
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
                            <div class="advanced-title">Kinh nghiệm:</div>
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
                        
                    </div>
                </div>
            </form>
            <button class="advanced-search-btn" id="btn">Tìm kiếm nâng cao</button>
            <h1 style="position:relative; top: 40px;">Tìm nhân lực nhanh</h1>
        </div>

        <div class="jobs-group">
            <?php foreach ($data[0] as $data) { ?>
                <div class="box">
                    <div class="content-area">
                        <a href="<?php echo $actual_link ?>/home/viewCV/<?php echo $data['id'] ?>"  class="content-img">
                            <img width="auto" height="200" src="<?php echo $actual_link ?>/public/images/avatar/<?php echo $data['C_avatar'] ?>" alt="">
                        </a>
                        <div class="content-disc">
                            <a href="<?php echo $actual_link ?>/home/viewCV/<?php echo $data['id'] ?>" >
                            <strong class="job-title"><?php echo $data["name"]?></strong></a>
                            <p class="company-name"><?php echo $data["job-name"]?></p> 
                            
                        </div>
                    </div>
                    <div class="more-info"><i class="uil uil-clock icon"></i><?php echo " ".$data["exp"]?></div> 
                    <div class="more-info"><i class="uil uil-location-point icon"></i><?php echo " ".$data["job-address"]?></div> 
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
