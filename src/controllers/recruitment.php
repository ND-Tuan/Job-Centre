<?php
class recruitment extends Controllers{
    //hiển thị danh sách công việc
    public function jobs_list(){
        $search = "";
        if (isset($_GET['search'])){
            $search = $_GET['search'];
        }
        $model = $this->model('recruitmentModels');
        $jobs = $model->selectValues($search, 0);
        $model=$this->model('careerModels');
        $career = $model->getAllValues();
        $this->view("employer","employer/viewJobs","Việc tìm người",[$search, $jobs, $career]);
    }

    public function job_detail($route = []){
        $customer_id = "";
        if(isset($_SESSION['lever']) && $_SESSION['lever'] == 3){
            $customer_id = $_SESSION['id'];
        }

        $model = $this->model('recruitmentModels');
        $job = $model->selectByID($route[0]);
        
        $count = $model->countApplication($route[0], $customer_id);

        $model=$this->model('careerModels');
        $career = $model->getAllValues();

        $this->view("employer","employer/jobDetail",$job["job_name"],[$job, $career, $count]);
    }

    public function company_detail($route = []){
        $model = $this->model('employerModels');
        $company = $model->selectOne("id",$route[0]);
        $model      = $this->model('recruitmentModels');
        $recruitment       = $model->selectByEmployerId($route[0]);
        $this->view("employer","employer/viewCompany",$company["name"],[$company, $recruitment]);
    }

    public function create_recruitment(){

        $actual_link = $this->getUrl();
        if(isset($_SESSION['lever']) && $_SESSION['lever'] == 2){
            $model=$this->model('careerModels');
            $career = $model->getAllValues();
            $this->view("employer","employer/recruitment","Đăng tin tuyển dụng",$career);
        } else {
            $_SESSION['error'] = "Vui lòng đăng nhập!";
            header("Location: $actual_link/employer/login");
        }
     
    }

    public function search_jobs(){

        $search = "";
        // Dữ Liệu gửi lên
        $career_id     = addslashes($_POST['career']);
        $job_name          = addslashes($_POST['job-name']);
        $type       = addslashes($_POST['type']);
        $gender         = addslashes($_POST['gender']);
        $exp          = addslashes($_POST['exp']);
        $wage        = addslashes($_POST['wage']);
        $address       = addslashes($_POST['job-address']);

        // Gọi model
        $model          = $this->model("recruitmentModels");
        $jobs = $model->find($career_id, $job_name, $type,  $gender,  $exp, $wage, $address);

        $model=$this->model('careerModels');
        $career = $model->getAllValues();

        $this->view("user","user/viewJobs","Việc tìm người",[$search, $jobs, $career]);
    }

    // xử lý đăng tin
    public function create_processing(){
        // Dữ Liệu gửi lên
        $user_id        = $_SESSION['id'];
        $career_id     = addslashes($_POST['career_id']);
        $job_name          = addslashes($_POST['job_name']);
        $type       = addslashes($_POST['type']);
        $num       = addslashes($_POST['num']);
        $gender         = addslashes($_POST['gender']);
        $position   = addslashes($_POST['position']);
        $exp          = addslashes($_POST['exp']);
        $wage        = addslashes($_POST['wage']);
        $deadline        = addslashes($_POST['deadline']);
        $address       = addslashes($_POST['address']);
        $description    = addslashes($_POST['description']);
        $request        = addslashes($_POST['request']);
        $interest       = addslashes($_POST['interest']);

        // Gọi model
        $model          = $this->model("recruitmentModels");
        $actual_link = $this->getUrl();
        // Lưu dữ liệu và kiểm tra
        if($model->createValues($user_id, $career_id, $job_name, $type, $num, $gender, $position, $exp, $wage, $deadline, $address, $description, $request, $interest)){
            header("Location: $actual_link/recruitment/jobs_list");
        }else{
            header("Location: $actual_link/recruitment/create_recruitment");
        }
    }

    //cập nhận tin tuyển dụng    
    public function update($route = []){
        // Dữ Liệu gửi lên
        $id        = $route[0];
        $career_id     = addslashes($_POST['career_id']);
        $job_name          = addslashes($_POST['job_name']);
        $type       = addslashes($_POST['type']);
        $num       = addslashes($_POST['num']);
        $gender         = addslashes($_POST['gender']);
        $position   = addslashes($_POST['position']);
        $exp          = addslashes($_POST['exp']);
        $wage        = addslashes($_POST['wage']);
        $deadline        = addslashes($_POST['deadline']);
        $address       = addslashes($_POST['address']);
        $description    = addslashes($_POST['description']);
        $request        = addslashes($_POST['request']);
        $interest       = addslashes($_POST['interest']);

        // Gọi model
        $model          = $this->model("recruitmentModels");
        // Lưu dữ liệu và kiểm tra
        $model->update($id, $career_id, $job_name, $type, $num, $gender, $position, $exp, $wage, $deadline, $address, $description, $request, $interest);
        $this ->job_detail([$id]); 
    }

    //gỡ tin đăng tuyển
    public function job_delete($route = []){
        $model          = $this->model("recruitmentModels");
        $model -> job_delete($route[0]);

        $this ->my_recruitment();
    }

    //ứng tuyển
    public function apply($route=[]){
        $actual_link = $this->getUrl();
        if(isset($_SESSION['lever']) && $_SESSION['lever'] == 3){
            
            $job_id = $route[0];
            $customer_id = $_SESSION['id'];

            $model    = $this->model("recruitmentModels");
            $model -> apply($job_id, $customer_id);
            $this ->job_detail([$job_id]); 
        } else {
            $_SESSION['error'] = "Bạn cần đăng nhập tài khoản người tìm việc để ứng tuyển";
            header("Location: $actual_link/customer/login");
        }
    }

     //hủy ứng tuyển
     public function cancelApply($route = []){
        $model = $this->model('recruitmentModels');
        $model -> cancelApplication($_SESSION['id'], $route[0]);

        $job_id = $route[0];
        $this ->job_detail([$job_id]); 
    }

    public function apply_delete($route = []){
        $model          = $this->model("recruitmentModels");
        $model -> cancelApplication($route[0], $route[1]);

        $this ->my_recruitment();
    }

    public function my_recruitment(){

        $model          = $this->model('recruitmentModels');
        $jobs           = $model->selectByEmployerId($_SESSION['id']);
        $applications   = $model->selectApplication($_SESSION['id'], null);

        $this->view("employer","employer/myRecruitment","Tin tuyển dụng của công ty",[$jobs, $applications]);
    }

    public function report($route = []){
        $model = $this->model("recruitmentModels");
        $model->report($route[0]);
        $job_id = $route[0];

        $_SESSION['done'] = "Bạn đã báo cáo tin tuyển dụng này. Báo cáo của bạn sẽ được chúng tôi xử lý trong khoảng thời gian sớm nhất.";
        $this ->job_detail([$job_id]); 
    }

}
