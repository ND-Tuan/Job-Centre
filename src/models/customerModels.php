<?php
class customerModels extends ConnectDB{
    //cập nhật mong muốn việc 
    function job_looking($id, $career, $job_name, $exp, $job_address, $check, $type){
        // Câu truy vấn
        $sql = "UPDATE 
                    `customer` 
                SET 
                    `job-looking` = '$check',
                    `career` = '$career',
                    `job-name` = '$job_name',
                    `exp` = '$exp',
                    `job-address` = '$job_address',
                    `type` = '$type',
                    `turnOnAt` = CURRENT_TIMESTAMP()
                WHERE 
                    `id` = '$id'";
        // Thực hiện truy vẫn
        mysqli_query($this->connection,$sql);
        // Kiểm tra xem có lỗi xảy ra không
        if (mysqli_error($this->connection) == ""){
            return true;
        }else{
            return false;
        }
    }

   //Tìm nhân lực
    function find( $job_name, $career, $type, $gender, $exp, $address){

        $job_query      = "";
        $address_query  = "";
        $career_query   = "";
        $type_query     = "";
        $gender_query   = "";
        $exp_query      = "";

        if($job_name != null)   $job_query      = " AND `customer`.`job-name` like '%$job_name%'";
        if($address != null)    $address_query  = " AND `customer`.`job-address` like '%$address%'";
        if($career != null)     $career_query   = " AND `customer`.`career` = '$career'";
        if($type != null)       $type_query     = " AND `customer`.`type` = '$type'";
        if($exp != null)        $exp_query      = " AND `customer`.`exp` = '$exp'";
        if($gender != null)     $gender_query   = " AND `customer`.`gender` = '$gender'";
        $sql = "SELECT * FROM `customer` WHERE `job-looking` = 1".$gender_query .$job_query .$address_query .$career_query .$type_query .$exp_query;
        
        $cv= mysqli_query($this->connection,$sql);
        return $cv;
    }
}
