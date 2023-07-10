<?php

class customerModels extends ConnectDB{
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
}