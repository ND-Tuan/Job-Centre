<?php 
class customer extends Controllers{
    // Kiểm tra đăng nhập
    public function checkLogin(){
        // Kiểm tra xem trong session có tồn tại phiên đăng nhập không
        if (isset($_SESSION['lever']) == false){
            return false;
        }
        // Kiểm tra cấp
        if ($_SESSION['lever'] == 3){
            return true;
        }
        return false;
    }
    // hiển thị đăng nhập
    public function login(){
        $this->view("customer","customer/login","Đăng nhập",[]);
    }

    public function register(){
        $this->view("customer","customer/register","Đăng kí",[]);
    }

    // Hiên Thị đổi mật khẩu
    public function change_password(){
        if ($this->checkLogin() == false){
            $actual_link = $this->getUrl();
            header("Location: $actual_link/customer/login");
        }else{
            $this->view("customer","editPassword","Đổi mật khẩu",[]);
        }
    }
    // Sử lý đổi mật khẩu
    public function change_password_processing(){
        // Nhận dữ liệu gửi lên
        $password   = addslashes($_POST['old_pass']);
        $new_pass   = addslashes($_POST['new_pass']);

        // Mã hóa mật khẩu
        $secure_pass = password_hash($new_pass, PASSWORD_BCRYPT);

        // Gọi model
        $save = $this->model("customerModels");
        $actual_link = $this->getUrl();
        
        // Kiểm tra mật khẩu
        if ($save->ChangePass($password,$secure_pass)){
            $_SESSION['done'] = "Đổi mk thành công";
            header("Location: $actual_link/customer/my_account");
        }else{
            $_SESSION['error'] = "Mật khẩu cũ không đúng";
            header("Location: $actual_link/customer/change_password");
        }
    }
    // Hiên Thị đổi mật khẩu
    // Xử lý đằng nhâp
    public function login_processing(){
        // Nhận dữ liệu gửi lên
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);
        
        // Gọi model
        $login = $this->model("customerModels");
        $actual_link = $this->getUrl();

        // Gọi hàm Đăng nhập và kiểm tra
        if($login->loginCustomer($email,$password)){
            header("Location: $actual_link/customer/my_account");
        }else{
            $_SESSION['error'] = "Email hoặc mật khẩu không đúng!";
            header("Location: $actual_link/customer/login");
        }
    }
    // Xửa lý đăng xuất
    public function logout(){
        // Xóa Phiên và render về trang login
        session_destroy();
        $actual_link = $this->getUrl();;
        header("Location: $actual_link/home");
    }

    public function register_processing(){
        // Nhận dữ liệu gửi lên
        $name = addslashes($_POST["name"]);
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);

        // Mã hóa mật khẩu
        $secure_pass = password_hash($password, PASSWORD_BCRYPT);

        // Gọi model
        $save = $this->model("customerModels");
        $actual_link = $this->getUrl();
        
        // Gọi hàm Tạo tài khoản và kiểm tra
        if ($save->CreateCustomer($name,$email,$secure_pass)){
            $_SESSION['success'] = "Đăng kí tài khoản thành công, vui lòng đăng nhập";
            header("Location: $actual_link/customer/login");
        }else{
            $_SESSION['error'] = "Email này đã được sử dụng, vui lòng đăng kí lại";
            header("Location: $actual_link/customer/register");
        }
    }

}
