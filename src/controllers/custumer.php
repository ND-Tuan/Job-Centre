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


}