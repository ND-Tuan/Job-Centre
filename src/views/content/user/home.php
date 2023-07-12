<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/header.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/home.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/jobs.css">

<!-- Home section start -->
<div id="home-page">
    <div class="section-header" style="background-image: url(<?php echo $actual_link ?>/public/images/default/home.jpg);">
        <form class="section-container" method="post" action="<?php echo $actual_link ?>/recruitment/search_jobs">
            
            <div  class="home-search-input">
                <i class="uil uil-search icon"></i>
                <input type="text" name ="job-name" placeholder="Tìm cơ hội việc làm" >  
            </div>
            <div  class="home-search-input">
                <i class="uil uil-location-point icon"></i>
                <input type="text" name="job-address" placeholder="Địa điểm việc làm">  
            </div>
            <div style="display: none;">
                <input name="exp">
                <input name="gender">
                <input name="type">
                <input name="career">
                <input name="wage">
            </div>
            
            <button type="submit" class="home-search-btn">Tìm kiếm</button>
        </form>
        <div class="section-container2" >
            <div class="title">Tìm kiếm việc làm và nhân lực
                <div id="textshow">
                    <div>Nhanh Chóng</div>
                    <div>Hiệu Quả</div>
                    <div>Đa Dạng</div>
                </div> 
                <div class="title">với</div>
            </div>
            <img src="<?php echo $actual_link ?>/public/images/default/logo-white.png">
            <div class="inv-text">Bắt đầu ngay với tư cách:</div>
            <div class="title">
                <a class="start-btn" href="<?php echo $actual_link ?>/customer/register"> NGƯỜI TÌM VIỆC </a>
                <a class="start-btn" href="<?php echo $actual_link ?>/employer/register"> NHÀ TUYỂN DỤNG </a>
            </div>
        </div>
    </div>

    <div class="main-container">

        <div class="lastest-container">
            <div class="title">
                <div class="item" style="border-right: 1px solid #dedede;">
                    <h3>Việc làm gấp</h3>
                    <a class="info-text" href="<?php echo $actual_link?>/recruitment/jobs_list">Xem thêm <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="item" style="border-left: 1px solid #dedede;">
                    <h3>Ứng viên mới nhất</h3>
                    <a class="info-text" href="<?php echo $actual_link?>/home/jobs_looking_list">Xem thêm <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="box-container">
                <div class="box-content">
                    <div class="slide-box" id="jobs-slider">
                        <div class="show">
                            <?php foreach ($data[0] as $jobs) { ?>
                                <div class="slide">
                                    <div class="content-area">
                                        <a href="<?php echo $actual_link ?>/recruitment/job_detail/<?php echo $jobs['ID'] ?>"  class="content-img">
                                            <img width="auto" height="200" src="<?php echo $actual_link ?>/public/images/avatar/<?php echo $jobs['avatar'] ?>" alt="">
                                        </a>
                                
                                        <div class="content-disc" style="line-height: 25px;">
                                            <a href="<?php echo $actual_link ?>/recruitment/job_detail/<?php echo $jobs['ID'] ?>" >
                                            <strong class="job-title"><?php echo $jobs["job_name"]?></strong></a><br>
                                            <a href="<?php echo $actual_link ?>/recruitment/company_detail/<?php echo $jobs['employer_id'] ?>" class="company-name"><?php echo $jobs["name"]?></a>  
                                        </div>
                                    </div>
                                    <div class="company-name" style="color: #ff8339; margin-top: 15px;">
                                        THÔNG TIN TUYỂN DỤNG 
                                    </div>
                                    <div class="grid-box">
                                        <div class="case-item">
                                            <span>Số lượng:</span><br>
                                            <strong><?php echo $jobs['num']?></strong>
                                        </div>

                                        <div class="case-item">
                                            <span>Vị trí:</span><br>
                                            <strong><?php echo $jobs['position']?></strong>
                                        </div>

                                        <div class="case-item">
                                            <span>Mức lương:</span><br>
                                            <strong><?php echo $jobs['wage']?></strong>
                                        </div>

                                        <div class="case-item">
                                            <span>Kinh nghiệm:</span><br>
                                            <strong><?php echo $jobs['exp']?></strong>
                                        </div>

                                        <div class="case-item">
                                            <span>Giới tính:</span><br>
                                            <strong><?php echo $jobs['gender']?></strong>
                                        </div>

                                        <div class="case-item">
                                            <span>Hình thức:</span><br>
                                            <strong><?php echo $jobs['type']?></strong>
                                        </div>
                                    </div>
                                    <div class="company-name" style="color: #ff8339; margin-top: 15px;">
                                        ĐỊA ĐIỂM 
                                    </div>
                                    <textarea disabled="disabled"  class="address-info"><?php echo $jobs['job_address']?></textarea>
                                </div>
                            <?php } ?> 
                        </div>
                        <nav class="slider-nav" id="jobs-slider-nav"></nav>
                    </div>
                </div>
   
                <div class="box-content">
                    <div class="slide-box" id="candidate-slider">
                        <div class="show">
                            <?php foreach ($data[1] as $candidate) { ?>
                                <div class="slide">
                                    <div class="content-area">
                                        <a href="<?php echo $actual_link ?>/recruitment/job_detail/<?php echo $candidate['id'] ?>"  class="content-img">
                                            <img width="auto" height="200" src="<?php echo $actual_link ?>/public/images/avatar/<?php echo $candidate['C_avatar'] ?>" alt="">
                                        </a>
                                
                                        <div class="content-disc" style="line-height: 25px;">
                                            <a href="<?php echo $actual_link ?>/recruitment/job_detail/<?php echo $candidate['id'] ?>" >
                                            <strong class="job-title"><?php echo $candidate["name"]?></strong></a><br>
                                            <a class="company-name"><i class="fa-solid fa-cake-candles fa-xs"></i><?php echo " ".$candidate["date-of-birth"]?></a>  
                                        </div>
                                    </div>
                                    <div class="company-name" style="color: #ff8339; margin-top: 15px;">
                                        THÔNG TIN ỨNG VIÊN 
                                    </div>
                                    <div class="grid-box">
                                        <div class="case-item">
                                            <span>Công việc:</span><br>
                                            <strong><?php echo $candidate['job-name']?></strong>
                                        </div>

                                        <div class="case-item">
                                            <span>Giới tính:</span><br>
                                            <strong>
                                                <?php 
                                                    if ($candidate['gender'] == 1){
                                                        echo "Nam";
                                                    }else if ($candidate['gender'] == 2){
                                                        echo "Nữ";
                                                    }else if ($candidate['gender'] == 0){
                                                        echo "Khác";
                                                }?>
                                            </strong>
                                        </div>

                                        <div class="case-item">
                                            <span>Kinh nghiệm:</span><br>
                                            <strong><?php echo $candidate['exp']?></strong>
                                        </div>

                                        <div class="case-item">
                                            <span>Trình độ:</span><br>
                                            <strong><?php echo $candidate['level']?></strong>
                                        </div>

                                        <div class="case-item">
                                            <span>Ngoại ngữ:</span><br>
                                            <strong><?php echo $candidate['language_level']?></strong>
                                        </div>

                                        <div class="case-item">
                                            <span>Hình thức:</span><br>
                                            <strong><?php echo $candidate['type']?></strong>
                                        </div>
                                    </div>
                                    <div class="company-name" style="color: #ff8339; margin-top: 15px;">
                                        ĐỊA ĐIỂM LÀM VIỆC
                                    </div>
                                    <textarea disabled="disabled"  class="address-info"><?php echo $candidate['job-address']?></textarea>
                                </div>
                            <?php } ?>
                        </div>
                        <nav class="slider-nav" id="candidate-slider-nav"></nav>
                    </div>
                    <div id="service"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-container" style=" background-color: #ffffff;" >
        <div class="lastest-container">
            <div class="box-container">
                <h3 style="font-size: 32px; font-weight: 800; ">Cùng Jobs Centre xây dựng giá trị bản thân</h3>
            </div>
            <div class="box-container"  >
                <div class="ser-content" style="background-image: url(<?php echo $actual_link ?>/public/images/default/cv-builder.png);">
                    <h4>Hồ sơ cá nhân</h4>
                    <div>
                        <p>
                            Hồ sơ cá nhân  giúp bạn xây dựng thương hiệu cá nhân, thể hiện
                            thế mạnh của bản thân thông qua việc đính kèm học vấn, kinh nghiệm, kỹ
                            năng,... của mình.
                        </p>
                    </div>
                    <div class="title" style="margin-bottom: 0;" >
                        <a class="btn-se" href="<?php echo $actual_link ?>/customer/my_account"> Tạo hồ sơ &nbsp; <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="ser-content" style="background-image: url(<?php echo $actual_link ?>/public/images/default/recruitment-ser.png);">
                    <h4>Tin tuyển dụng</h4>
                    <div>
                        <p>
                            Tin tuyển dụng giúp các nhà tuyển dụng thu hút được các ứng viên phù hợp nhất cho công việc, dự án,.... tiếp theo của công ty mình.
                        </p>
                    </div>
                    <div class="title" style="margin-bottom: 0;">
                        <a class="btn-se" href="<?php echo $actual_link?>/recruitment/create_recruitment"> Đăng tuyển ngay &nbsp; <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-container" style=" background-color: #ffffff;">
        <div class="lastest-container">
            <div class="box-container">
                <h3 style="font-size: 32px; font-weight: 800;">
                    Về chúng tôi
                </h3>
                
            </div>
            <div class="box-container">
                <p class="about-us">
                    Jobs Centre là dự án xây dựng bởi nhóm 13 nhằm cung cấp giải pháp công nghệ giúp kết nối
                    và phát triển nguồn nhân lực tại Việt Nam.<br> Jobs Centre tạo nên một nền tảng
                    dành cho những người tìm việc và<br> nhà tuyển dụng trên toàn quốc 
                    có thể tìm việc với đa dạng các ngành nghề <br> cũng như đăng
                    tin tuyển dụng, thu hút các ứng cử viên,<br> nhân lực tiềm năng.
                </p>
            </div>
        </div>
    </div> 
    
    
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
   $("#textshow > div:gt(0)").hide();

    setInterval(function() {
    $('#textshow > div:first')
        .fadeOut(300)
        .next() 
        .delay(300)    
        .slideDown(500)
        .end()
        .appendTo('#textshow');
    }, 3000);

    document.querySelectorAll("#info").forEach(element => {
        function autoResize(el) {
        el.style.height = el.scrollHeight + 'px';
        }
        autoResize(element);
        element.addEventListener('input', () => autoResize(element));
    });

   (function($) {
        var $slider = $('#candidate-slider'),
            $container = $slider.find('.show'),
            $nav = $('#candidate-slider-nav'),
            $slide = $container.children(),
            s_length = $slide.length,
            s_wide = $slider.width() * s_length,
            s_height = $slider.height(),
            autoSlide = null;

        $container.css({
            'position':'relative',
            'width':s_wide,
            'height':s_height
        });

        $slide.each(function(index) {
            var i = index + 1;
            $nav.append('<a href="#slide-'+i+'">'+i+'</a>');
            $(this).attr('id', 'slide-'+i);
        });

        $nav.find('a').on("click", function(pos) {
            $nav.find('.active').removeClass('active');
            $(this).addClass('active');
            pos = $(this).index() * $slider.width(); 
            $container.animate({left:'-'+pos+'px'}, 600);
            clearInterval(autoSlide); 
            autoSlide = setInterval(slideShow, 10000); 
            return false;
        }).first().addClass('active');

        function slideShow() {
            if ($nav.find('.active').next().length) {
                $nav.find('.active').next().trigger("click");
            } else {
                $nav.find('a').first().trigger("click");
            }
        } autoSlide = setInterval(slideShow, 10000);

    })(jQuery);

    (function($) {
        var $slider = $('#jobs-slider'),
            $container = $slider.find('.show'),
            $nav = $('#jobs-slider-nav'),
            $slide = $container.children(),
            s_length = $slide.length,
            s_wide = $slider.width() * s_length,
            s_height = $slider.height(),
            autoSlide = null;

        $container.css({
            'position':'relative',
            'width':s_wide,
            'height':s_height
        });

        $slide.each(function(index) {
            var i = index + 1;
            $nav.append('<a href="#slide-'+i+'">'+i+'</a>');
            $(this).attr('id', 'slide-'+i);
        });

        $nav.find('a').on("click", function(pos) {
            $nav.find('.active').removeClass('active');
            $(this).addClass('active');
            pos = $(this).index() * $slider.width(); 
            $container.animate({left:'-'+pos+'px'}, 600);
            clearInterval(autoSlide); 
            autoSlide = setInterval(slideShow, 10000); 
            return false;
        }).first().addClass('active');

        function slideShow() {
            if ($nav.find('.active').next().length) {
                $nav.find('.active').next().trigger("click");
            } else {
                $nav.find('a').first().trigger("click");
            }
        } autoSlide = setInterval(slideShow, 10000);

    })(jQuery);
</script>




