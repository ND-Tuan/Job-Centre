<header class="header" id="header">
        <section class="nav-main flex">
            <a href="<?php echo $actual_link ?>/home/read" class="logo"> <img src="<?php echo $actual_link ?>/public/images/default/logo.png" alt=""></a>

            <nav class="navbar">
                <a href="<?php echo $actual_link ?>/home/read">Trang chủ</a>
                <a href="<?php echo $actual_link ?>/home/read#service">Dịch vụ</a>
                <a href="<?php echo $actual_link ?>/home/read#contact">Liên hệ</a>
                <a href="<?php echo $actual_link?>/recruitment/jobs_list">Việc tìm người</a>
                <a href="<?php echo $actual_link?>/home/jobs_looking_list">Người tìm việc</a>
            </nav>

            <ul class="btn-home">
                <?php if (isset($_SESSION['lever'])) { ?>
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="user-img"><img src="<?php echo $actual_link ?>/public/images/avatar/<?php echo $_SESSION['avatar'] ?>" alt=""></a>
                        <div class="dropdown-content">
                                <a href="<?php echo $actual_link ?>/<?php 
                                    if ($_SESSION['lever'] == 2) {
                                        echo "employer/myCompany";
                                    }else if ($_SESSION['lever'] == 1){
                                        echo "admin/my_account";
                                    } else {
                                    echo "customer/my_account";
                                    }
                                ?>">Thông tin tài khoản</a>

                                <a href="<?php echo $actual_link ?>/<?php 
                                    if ($_SESSION['lever'] == 2) {
                                        echo "employer";
                                    }else if ($_SESSION['lever'] == 1){
                                        echo "admin";
                                    } else {
                                    echo "customer";
                                    }
                                ?>/change_password/">Đổi mật khẩu</a>

                                <a href="<?php echo $actual_link ?>/<?php 
                                    if ($_SESSION['lever'] == 2) {
                                        echo "employer";
                                    }else if ($_SESSION['lever'] == 1){
                                        echo "admin";
                                    } else {
                                    echo "customer";
                                    }
                                ?>/logout">Đăng xuất</a>
                        </div>
                    </li>

                <?php }else{ ?>
                    <li><a href="<?php echo $actual_link ?>/customer/register" class="btn">Đăng kí</a></li>
                    <li><a href="<?php echo $actual_link ?>/customer/login" class="btn2">Đăng nhập</a></li>
                <?php } ?>
            </ul>
            <div id="menu-btn" class="fas fa-bars" style="color: #DD3332;"><span>Menu</span></div>

        </section>
        
</header>
