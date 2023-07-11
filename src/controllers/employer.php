<?php 
class employer extends Controllers{
    public function myCompany(){
        if ($this->checkLogin() == false){
            $actual_link = $this->getUrl();
            header("Location: $actual_link/employer/login");
        }
        $model = $this->model('employerModels');
        $myCompany = $model->selectOne('id',$_SESSION['id']);
        $this->view("employer","employer/myCompany","Tài khoản của tôi",$myCompany);
    }

    // Xử lý cập nhật tài khoản
    public function update(){  
        // Nhận dữ liệu gửi lên
        $name           = addslashes($_POST['company_name']);
        $email          = addslashes($_POST['email']);
        $address        = addslashes($_POST['address']);
        $description    = addslashes($_POST['description']);
        $contact_info    = addslashes($_POST['contact-info']);

        
        // Lưu thông tin
        $save = $this->model("employerModels");
        $actual_link = $this->getUrl();
        if ($save->updateOne($_SESSION['id'], $name, $email, $address, $description, $contact_info)){
            $_SESSION['name']   = $name;
            $_SESSION['done'] = "Thay Đổi thông tin thành công!";
            header("Location: $actual_link/employer/myCompany");
        }else{
            $_SESSION['error'] = "Lỗi Trùng email!";
            header("Location: $actual_link/employer/myCompany");
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
        $save = $this->model("employerModels");
        $save->updateAvatar($_SESSION['id'], $avatar);
        $_SESSION['avatar'] = $avatar;
        header("Location: $actual_link/employer/myCompany");
    }
}