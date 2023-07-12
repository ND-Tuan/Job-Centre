<?php 
class employer extends Controllers{
    // Kiểm tra đăng nhập
    public function checkLogin(){
        // Kiểm tra xem trong session có tồn tại phiên đăng nhập không
        if (isset($_SESSION['lever']) == false){
            return false;
        }
        // Kiểm tra cấp
        if ($_SESSION['lever'] == 2){
            return true;
        }
        return false;
    }
    // hàm hiển thị phần login
    public function login(){
        $this->view("employer","employer/login","Đăng nhập",[]);
    }
    // hàm hiển thị phần register
    public function register(){
        $this->view("employer","employer/register","Đăng kí",[]);
    }
    // Hiển thị phần tài khoản của tôi
    public function myCompany(){
        if ($this->checkLogin() == false){
            $actual_link = $this->getUrl();
            header("Location: $actual_link/employer/login");
        }
        $model = $this->model('employerModels');
        $myCompany = $model->selectOne('id',$_SESSION['id']);
        $this->view("employer","employer/myCompany","Tài khoản của tôi",$myCompany);
    }

    // Hiên Thị đổi mật khẩu
    public function change_password(){
        if ($this->checkLogin() == false){
            $actual_link = $this->getUrl();
            header("Location: $actual_link/employer/login");
        }else{
            $this->view("employer","editPassword","Đổi mật khẩu",[]);
        }
    }
    // Sử lý đổi mật khẩu
    public function change_password_processing(){
        $password   = addslashes($_POST['old_pass']);
        $new_pass   = addslashes($_POST['new_pass']);
        $secure_pass = password_hash($new_pass, PASSWORD_BCRYPT);
        $save = $this->model("employerModels");
        $actual_link = $this->getUrl();
        if ($save->ChangePass($password,$secure_pass)){
            $_SESSION['done'] = "Đổi mk thành công";
            header("Location: $actual_link/employer/myCompany");
        }else{
            $_SESSION['error'] = "Mật khẩu cũ không đúng";
            header("Location: $actual_link/employer/change_password");
        }
    }
    // xử lý đằng kí
    public function register_processing(){
        // Nhận dữ liệu gửi lên
        $name = addslashes($_POST["name"]);
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);

        // Mã hóa mật khẩu
        $secure_pass = password_hash($password, PASSWORD_BCRYPT);

        // Gọi model
        $save = $this->model("employerModels");
        $actual_link = $this->getUrl();
        
        // Gọi hàm Tạo tài khoản và kiểm tra
        if ($save->CreateUser($name,$email,$secure_pass)){
            $_SESSION['success'] = "Đăng kí tài khoản thành công, vui lòng đăng nhập";
            header("Location: $actual_link/employer/login");
        }else{
            $_SESSION['error'] = "Email này đã được sử dụng, vui lòng đăng kí lại";
            header("Location: $actual_link/employer/register");
        }
    }
    // Xử lý đăng nhập
    public function login_processing(){
        // Nhận dữ liệu gửi lên
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);
        
        // Gọi model
        $login = $this->model("employerModels");
        $actual_link = $this->getUrl();

        // Gọi hàm Đăng nhập và kiểm tra
        if($login->loginUser($email,$password)){
            header("Location: $actual_link/employer/myCompany");
        }else{
            $_SESSION['error'] = "Email hoặc mật khẩu không đúng!";
            header("Location: $actual_link/employer/login");
        }
    }
    // Xử lý đăng xuất
    public function logout(){
        // Xóa Phiên và render về trang login
        session_destroy();
        $actual_link = $this->getUrl();;
        header("Location: $actual_link/employer/login");
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
