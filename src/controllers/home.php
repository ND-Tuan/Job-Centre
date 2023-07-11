<?php
class home extends Controllers{
    // Hiển thị phần home
    public function read(){
        $search = "";
        $model = $this->model('recruitmentModels');
        $jobs = $model->selectValues10($search, 0);

        $model = $this->model('customerModels');
        $list = $model->selectAll10('job-looking',1);

        $this->view("user","user/home","Trang chủ",[$jobs,$list]);
    }

    public function TermsOfService(){
        $this->view("user","user/TermsOfService","Điều khoản",[]);
    }

    public function jobs_looking_list(){
        $model = $this->model('customerModels');
        $list = $model->selectAll('job-looking',1);

        $model=$this->model('careerModels');
        $career = $model->getAllValues();
        $this->view("customer","customer/jobNeeds","Người tìm việc",[$list, $career]);
    }

    public function viewCV($route = []){
        $model = $this->model('customerModels');
        $CV = $model->selectOne('id',$route[0]);
        $Edu = $model->selectEdu($route[0]);
        $Exp = $model->selectExp($route[0]);
        $Skill = $model->selectSkill($route[0]);

        $this->view("customer","customer/viewCV","Hồ Sơ",[$CV, $Edu, $Exp, $Skill]);
    }

    public function search_cv(){
        // Dữ Liệu gửi lên
        $career     = addslashes($_POST['career']);
        $job_name          = addslashes($_POST['job-name']);
        $type       = addslashes($_POST['type']);
        $gender         = addslashes($_POST['gender']);
        $exp          = addslashes($_POST['exp']);
        $address       = addslashes($_POST['job-address']);

        $model = $this->model("customerModels");
        $cv = $model->find($job_name, $career, $type, $gender, $exp, $address);

        $model=$this->model('careerModels');
        $career = $model->getAllValues();

        $this->view("customer","customer/jobNeeds","Người tìm việc",[$cv, $career]);
    }

}
?>
