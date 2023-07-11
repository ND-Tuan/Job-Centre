<?php

class customerModels extends ConnectDB{
    // Tạo dữ liệu mới
    function CreateCustomer($name,$email,$password){
        // Câu truy vấn
        $sql = "INSERT INTO `customer`(
                    `name`,
                    `email`,
                    `password`
                )
                VALUES(
                    '$name',
                    '$email',
                    '$password'
                )";
        // Thực hiện truy vẫn
        mysqli_query($this->connection,$sql);
        // Kiểm tra xem có lỗi xảy ra không
        if (mysqli_error($this->connection) == ""){
            return true;
        }else{
            return false;
        }
    }
    // Hàm đăng nhập
    function loginCustomer($email,$password){
        // tìm kiếm dữ liệu qua email
        $customer = $this->selectOne('email', $email);

        // Kiểm tra xem dữ liệu có tồn tại hay không
        if (isset($customer['password'])){

            // Kiểm tra mật khẩu
            $verify = password_verify($password, $customer['password']);
            if ($verify){
                // Lưu phiên hay session
                $_SESSION['id'] = $customer['id'];
                $_SESSION['name'] = $customer['name'];
                $_SESSION['avatar'] = $customer['C_avatar'];
                $_SESSION['lever'] = 3;
                $_SESSION['mail'] = $customer['email'];
                $_SESSION['gender'] = $customer['gender'];
                return true;
            }  
        }else{
            return false;
        }
    }
    // hàm đổi mật khẩu
    function ChangePass($password,$secure_pass){
        $id = $_SESSION['id'];
        // tìm kiếm dữ liệu qua id
        $customer = $this->selectOne('id', $id);

        // Kiểm tra xem dữ liệu có tồn tại hay không
        if (isset($customer['password'])){
            // Kiểm tra mật khẩu
            $verify = password_verify($password, $customer['password']);
            if (!$verify){
                $sql = "UPDATE
                        `customer`
                    SET
                        `password` = '$secure_pass'
                    WHERE
                        `id` = '$id'";
                mysqli_query($this->connection,$sql);
                return true;
            }  
        }else{
            return false;
        }
    }
    // Lấy dữ liệu từ 1 hàng
    function selectOne($key,$value){
        // Truy vấn
        $sql = "SELECT * FROM `customer` WHERE `$key` = '$value'";
        $customer = mysqli_query($this->connection,$sql);
        // Ép dữ liệu từ mảng về 1
        $customer = mysqli_fetch_array($customer);

        return $customer;
    }

    function selectAll($key,$value){
        // Truy vấn
        $sql = "SELECT * FROM `customer` WHERE `$key` = '$value' ORDER BY `turnOnAt` DESC";
        $customer = mysqli_query($this->connection,$sql);
        // Ép dữ liệu từ mảng về 1

        return $customer;
    }

    function selectAll10($key,$value){
        // Truy vấn
        $sql = "SELECT * FROM `customer` WHERE `$key` = '$value' ORDER BY `turnOnAt` DESC LIMIT 10";
        $customer = mysqli_query($this->connection,$sql);
        // Ép dữ liệu từ mảng về 1

        return $customer;
    }

    // Cập nhập dữ liệu
    function updateOne($id, $name, $email, $phone_number, $gender, $address, $language, $date_of_birth, $level){
        
        if ($language == null) $language = "Không";
        
        // Câu truy vấn
        $sql = "UPDATE
                    `customer`
                SET
                    `name` = '$name',
                    `email` = '$email',
                    `phone_number` = '$phone_number',
                    `gender` = '$gender',
                    `address` = '$address',
                    `language_level` = '$language',
                    `date-of-birth` = '$date_of_birth',
                    `level` = '$level'
                WHERE
                    `id` = '$id'";
        // Thực hiện truy vấn và kiểm tra
        mysqli_query($this->connection,$sql);
        if (mysqli_error($this->connection) == ""){
            return true;
        }else{
            return false;
        }
    }

    function updateAvatar($id, $avatar){
        // Câu truy vấn
        $sql = "UPDATE
                    `customer`
                SET
                    `C_avatar` = '$avatar'
                WHERE
                    `id` = '$id'";
        // Thực hiện truy vấn và kiểm tra
        mysqli_query($this->connection,$sql);
        if (mysqli_error($this->connection) == ""){
            return true;
        }else{
            return false;
        }
    }


    function selectEdu($id){
        $sql = "SELECT * FROM `customer-education` WHERE `customer_id` = '$id'";
        $edu = mysqli_query($this->connection,$sql);
        return $edu;
    }

    //thêm học vấn
    function updateEdu($id,  $school, $major, $graduatedOrNot, $eduStart, $eduEnd, $edu_description){
        // Câu truy vấn
        $sql = "INSERT INTO `customer-education`(
                    `customer_id`, 
                    `school-name`, 
                    `major`, 
                    `graduatedOrNot`, 
                    `start`, 
                    `end`, 
                    `edu-description`
                ) 
                VALUES (
                    '$id',
                    '$school', 
                    '$major', 
                    '$graduatedOrNot', 
                    '$eduStart', 
                    '$eduEnd', 
                    '$edu_description'
                )";
        // Thực hiện truy vẫn
        mysqli_query($this->connection,$sql);
        // Kiểm tra xem có lỗi xảy ra không
        if (mysqli_error($this->connection) == ""){
            return true;
        }else{
            return false;
        }
    }

    //xóa học vấn
    function deleteEdu($id){
        $sql = "DELETE FROM `customer-education` WHERE `id` = '$id'";
        mysqli_query($this->connection,$sql);
    }

    function selectExp($id){
        $sql = "SELECT * FROM `customer-exp` WHERE `custumer_id` = '$id'";
        $exp = mysqli_query($this->connection,$sql);
        return $exp;
    }

    //thêm kinh nghiệm
    function updateExp($id, $company, $position, $endOrNot, $start, $end, $exp_description){
        // Câu truy vấn
        $sql = "INSERT INTO `customer-exp`(
                    `custumer_id`, 
                    `company-name`, 
                    `position`, 
                    `end_or_not`, 
                    `start_at`, 
                    `end_at`, 
                    `exp-description`
                ) 
                VALUES (
                    '$id',
                    '$company',
                    '$position',
                    '$endOrNot',
                    '$start',
                    '$end',
                    '$exp_description'
                )";
        // Thực hiện truy vẫn
        mysqli_query($this->connection,$sql);
        // Kiểm tra xem có lỗi xảy ra không
        if (mysqli_error($this->connection) == ""){
            return true;
        }else{
            return false;
        }
    }

    //xóa kinh nghiệm
    function deleteExp($id){
        $sql = "DELETE FROM `customer-exp` WHERE `id` = '$id'";
        mysqli_query($this->connection,$sql);
    }

    function selectSkill($id){
        $sql = "SELECT * FROM `customer-skill` WHERE `customer_id` = '$id'";
        $skill = mysqli_query($this->connection,$sql);
        return $skill;
    }

    //thêm kĩ năng
    function updateSkill($id, $skill, $rate, $skill_description){
        // Câu truy vấn
        $sql = "INSERT INTO `customer-skill`(
                    `customer_id`, 
                    `skill`, 
                    `rate`, 
                    `skill-description`
                )
                VALUES (
                    '$id',
                    '$skill',
                    '$rate',
                    '$skill_description'
                )";
        // Thực hiện truy vẫn
        mysqli_query($this->connection,$sql);
        // Kiểm tra xem có lỗi xảy ra không
        if (mysqli_error($this->connection) == ""){
            return true;
        }else{
            return false;
        }
    }

    //xóa kĩ năng
    function deleteSkill($id){
        $sql = "DELETE FROM `customer-skill` WHERE `id` = '$id'";
        mysqli_query($this->connection,$sql);
    }


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