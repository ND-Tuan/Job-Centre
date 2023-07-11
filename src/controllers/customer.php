<?php 
class customer extends Controllers{

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
