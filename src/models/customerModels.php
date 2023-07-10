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
  
