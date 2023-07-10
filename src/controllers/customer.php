<?php
class customer extends Controllers{
    public function my_account(){
        if ($this->checkLogin() == false){
            $actual_link = $this->getUrl();
            // Nếu chưa đăng nhập thì render về trang đăng nhập
            header("Location: $actual_link/customer/login");
        }
        // gọi model của customer
        $model = $this->model('customerModels');
        // Tìm Kiếm dữ liệu từ id được lưu ở SESSION
        $myAccount = $model->selectOne('id',$_SESSION['id']);
        $myEdu = $model->selectEdu($_SESSION['id']);
        $myExp = $model->selectExp($_SESSION['id']);
        $mySkill = $model->selectSkill($_SESSION['id']);

        $model=$this->model('careerModels');
        $career = $model->getAllValues();

        // Hiển thi
        $this->view("customer","customer/myAccount","Tài khoản của tôi",[$myAccount, $myEdu, $myExp, $mySkill, $career]);
    }

    public function update(){  
        // Nhận dữ liệu gửi lên
        $name           = addslashes($_POST['name']);
        $email          = addslashes($_POST['email']);
        $phone_number   = addslashes($_POST['phone_number']);
        $gender         = addslashes($_POST['gender']);
        $address        = addslashes($_POST['address']);
        $language       = addslashes($_POST['language']);
        $date_of_birth  = addslashes($_POST['date-of-birth']);
        $level  = addslashes($_POST['level']);

        $save = $this->model("customerModels");
        $actual_link = $this->getUrl();;
        // Lưu giá trị
        if ($save->updateOne($_SESSION['id'], $name, $email, $phone_number, $gender, $address, $language, $date_of_birth, $level)){
            // Cập nhập lại session
            $_SESSION['name']   = $name;
            $_SESSION['done'] = "Thay Đổi thông tin thành công!";
            header("Location: $actual_link/customer/my_account");
        }else{
            $_SESSION['error'] = "Lỗi Trùng email!";
            header("Location: $actual_link/customer/my_account");
        }
    }

    public function updateAvatar(){
        $name           = $_SESSION['name'];
        $avatar         = $_SESSION['avatar'];
        $file = basename($_FILES["avatar"]["name"]);
        // Kiểm tra xem tên có rỗng không
        if ($file != ""){
            // Tạo tên
            $target_file = "./public/images/avatar";
            $date = new DateTime();
            $avatar = $name . $date->getTimestamp() . "." . strtolower(pathinfo($file,PATHINFO_EXTENSION));
            $target_file = $target_file . "/" . $avatar;
            // Lưu file
            move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file); 
        }  
        $actual_link = $this->getUrl();
        $save = $this->model("customerModels");
        $save->updateAvatar($_SESSION['id'], $avatar);
        $_SESSION['avatar'] = $avatar;
        header("Location: $actual_link/customer/my_account");
    }

    public function add_edu(){  
        // Nhận dữ liệu gửi lên
        $school           = addslashes($_POST['school']);
        $major          = addslashes($_POST['major']);
        $graduatedOrNot          = addslashes($_POST['graduatedOrNot']);
        $eduStart             = addslashes($_POST['eduStart']);
        $eduEnd               = addslashes($_POST['eduEnd']);
        $edu_description   = addslashes($_POST['edu-description']);

        $save = $this->model("customerModels");
        $actual_link = $this->getUrl();
        // Lưu giá trị
        $save->updateEdu($_SESSION['id'], $school, $major, $graduatedOrNot, $eduStart, $eduEnd, $edu_description);
        header("Location: $actual_link/customer/my_account#addExp");
    }

    //xóa học vấn
    public function delete_edu($route = []){
        $actual_link = $this->getUrl();
        $model = $this->model("customerModels");
        $model ->deleteEdu($route[0]);
        header("Location: $actual_link/customer/my_account#addEdu");
    }

    //thêm kinh nghiệm
    public function add_exp(){  
        // Nhận dữ liệu gửi lên
        $company           = addslashes($_POST['company']);
        $position          = addslashes($_POST['position']);
        $endOrNot          = addslashes($_POST['endOrNot']);
        $start             = addslashes($_POST['start']);
        $end               = addslashes($_POST['end']);
        $exp_description   = addslashes($_POST['exp-description']);

        $save = $this->model("customerModels");
        $actual_link = $this->getUrl();
        // Lưu giá trị
        $save->updateExp($_SESSION['id'], $company, $position, $endOrNot, $start, $end, $exp_description);
        header("Location: $actual_link/customer/my_account#addExp");
    }

    //xóa kinh nghiệm
    public function delete_exp($route = []){
        $actual_link = $this->getUrl();
        $model = $this->model("customerModels");
        $model ->deleteExp($route[0]);
        header("Location: $actual_link/customer/my_account#addExp");
    }
}