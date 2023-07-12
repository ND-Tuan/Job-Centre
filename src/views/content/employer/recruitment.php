<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/header.css">
<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/recruitment.css">

<div style="margin-top:120px;">
<div style="margin-top:70px;">
    <div class="main-container">
        <form class="form" method="post" action="<?php echo $actual_link ?>/recruitment/create_processing">
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
                    <select class="select-input"  name="career_id" style="font-size: 14px;">
                        <?php foreach ($data as $career) { ?>
                            <option value="<?php echo $career['id']?>"><?php echo $career['career_name']?></option>
                        <?php } ?>
                    </select>
                    <div></div>
                    <input class="select-input" name="job_name" type="text" placeholder="Nhập tên công việc" required>
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
                        <option value="Toàn thời gian">Toàn thời gian</option>
                        <option value="Bán thời gian">Bán thời gian</option>
                    </select>
                    <div></div>
                    <input name="num" class="select-input" type="number" required>  
                    <div></div>
                    <select class="select-input" name="gender" >
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
                    <input class="select-input" name="position" type="text" placeholder="Nhập vị trí tuyển dụng" required>
                    <div></div>
                    <select class="select-input" name="exp" id="">
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
                    <input class="select-input" list="browsers" name="wage" type="text" placeholder="Nhập mức lương" required>
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
                    <input class="select-input"  name="deadline" type="date" request>
                </div>
            </div>

            <div class="input-value">
                <div class="name-title">
                    Địa điểm làm việc
                </div>
                <textarea name="address" placeholder="Nhập địa điểm làm việc" style="height: 70px" request></textarea>
            </div>

            <div class="input-value">
                <div class="name-title">
                    Mô tả công việc
                </div>
                <textarea name="description" placeholder="Nhập mô tả công việc"></textarea>
            </div>

            <div class="input-value">
                <div class="name-title">
                    Yêu cầu ứng viên
                </div>
                <textarea name="request" placeholder="Nhập yêu cầu cho ứng viên"></textarea>
            </div>

            <div class="input-value">
                <div class="name-title">
                    Quyền lợi
                </div>
                <textarea name="interest" placeholder="Nhập quyền lợi của nhân viên"></textarea>
            </div>

            
            <div class="input-value">
                <button type="submit">Đăng tin tuyển dụng</button>
            </div>
        </form>
    </div>

<script>
  document.querySelectorAll("textarea").forEach(element => {
    function autoResize(el) {
      el.style.height = el.scrollHeight + 'px';
    }
    autoResize(element);
    element.addEventListener('input', () => autoResize(element));
  });
</script>
