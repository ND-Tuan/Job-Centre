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

    // hiển thị tài khoản của tôi
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
    // Sử lý cập nhập tài khoản
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

    //thêm học vấn
    public function add_edu(){  
        // Nhận dữ liệu gửi lên
        $school           = addslashes($_POST['school']);
        $major          = addslashes($_POST['major']);

        if (isset($_POST['graduatedOrNot'])){
            $graduatedOrNot  = addslashes($_POST['graduatedOrNot']);
        } else {
            $graduatedOrNot  = 0;
        }
        
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

        if (isset($_POST['endOrNot'])){
            $endOrNot          = addslashes($_POST['endOrNot']);
        } else {
            $endOrNot          = 0;
        }
        
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

    //thêm kĩ năng
    public function add_skill(){  
        // Nhận dữ liệu gửi lên
        $skill           = addslashes($_POST['skill']);
        $rate          = addslashes($_POST['rate']);
        $skill_description   = addslashes($_POST['skill-description']);

        $save = $this->model("customerModels");
        $actual_link = $this->getUrl();
        // Lưu giá trị
        $save->updateSkill($_SESSION['id'], $skill, $rate, $skill_description);
        header("Location: $actual_link/customer/my_account#addSkill");
    }

    //xóa kĩ năng
    public function delete_skill($route = []){
        $actual_link = $this->getUrl();
        $model = $this->model("customerModels");
        $model ->deleteSkill($route[0]);
        header("Location: $actual_link/customer/my_account#addSkill");
    }

    //mong muốn việc làm
    public function job_looking(){
        $career           = addslashes($_POST['career']);
        $job_name          = addslashes($_POST['job_name']);
        $exp  = addslashes($_POST['exp']);
        $job_address   = addslashes($_POST['job_address']);
        $check   = addslashes($_POST['check']);
        $type   = addslashes($_POST['type']);

        $save = $this->model("customerModels");
        $actual_link = $this->getUrl();
        // Lưu giá trị
        $save->job_looking($_SESSION['id'], $career, $job_name, $exp, $job_address, $check, $type);
        header("Location: $actual_link/customer/my_account");
    }
}
