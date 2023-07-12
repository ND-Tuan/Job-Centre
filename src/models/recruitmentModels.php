<?php
class recruitmentModels extends ConnectDB{
    function selectAllValues(){
        // Truy vấn
        $sql = "SELECT `jobs_list`.*, `career`.`career_name`, `employer`.* 
                FROM (`jobs_list` INNER JOIN `career` ON `jobs_list`.`career_id` = `career`.`id`) 
                INNER JOIN `employer` ON `employer`.`id` = `jobs_list`.`employer_id`";
        $job = mysqli_query($this->connection,$sql);
        return $job;
    }

    function selectValues($search, $id){
        if($id==0){
            $search_query = "AND `job_name` like '%$search%'";
        } else {
            $search_query = "AND`id` = '$id'";
        }
        $sql = "SELECT `jobs_list`.*, `career`.`career_name`, `employer`.* 
        FROM (`jobs_list` INNER JOIN `career` ON `jobs_list`.`career_id` = `career`.`id`) 
        INNER JOIN `employer` ON `employer`.`id` = `jobs_list`.`employer_id`
         WHERE `jobs_list`.`deadline` > CURRENT_TIMESTAMP()  $search_query ORDER BY `register_at` DESC";
        $job= mysqli_query($this->connection,$sql);
        return $job;
    }

    function selectValues10($search, $id){
        if($id==0){
            $search_query = "AND `job_name` like '%$search%'";
        } else {
            $search_query = "AND`id` = '$id'";
        }
        $sql = "SELECT `jobs_list`.*, `career`.`career_name`, `employer`.* 
        FROM (`jobs_list` INNER JOIN `career` ON `jobs_list`.`career_id` = `career`.`id`) 
        INNER JOIN `employer` ON `employer`.`id` = `jobs_list`.`employer_id`
         WHERE `jobs_list`.`deadline` > CURRENT_TIMESTAMP()  $search_query ORDER BY `deadline` ASC LIMIT 10";
        $job= mysqli_query($this->connection,$sql);
        return $job;
    }

    function createValues($user_id, $career_id, $job_name, $type, $num, $gender, $position, $exp, $wage, $deadline, $address, $description, $request, $interest){
        $sql = "INSERT INTO `jobs_list`(
            `employer_id`, 
            `career_id`, 
            `job_name`, 
            `wage`, 
            `type`, 
            `num`, 
            `position`, 
            `gender`, 
            `exp`, 
            `job_address`, 
            `job_description`, 
            `request`, 
            `interest`, 
            `deadline`
        )
        VALUES(
            '$user_id', 
            '$career_id', 
            '$job_name',
            '$wage', 
            '$type', 
            '$num', 
            '$position', 
            '$gender', 
            '$exp', 
            '$address',
            '$description', 
            '$request', 
            '$interest',
            '$deadline'
        )";
        mysqli_query($this->connection,$sql);
        
        if (mysqli_error($this->connection) == ""){
            return true;
        }else{
            return false;
        }
    }



    function selectByID($ID){
        $sql = "SELECT `jobs_list`.*, `career`.`career_name`, `employer`.* 
                FROM (`jobs_list` INNER JOIN `career` ON `jobs_list`.`career_id` = `career`.`id`) 
                INNER JOIN `employer` ON `employer`.`id` = `jobs_list`.`employer_id`
                WHERE `jobs_list`.`ID`='$ID'";
       $job = mysqli_query($this->connection,$sql);
       $job = mysqli_fetch_array($job);
        return $job;
    }

    function selectByEmployerId($employer_id){
        // Truy vấn
        $sql = "SELECT `jobs_list`.*, `career`.`career_name`, `employer`.* 
                FROM (`jobs_list` INNER JOIN `career` ON `jobs_list`.`career_id` = `career`.`id`) 
                INNER JOIN `employer` ON `employer`.`id` = `jobs_list`.`employer_id`
                WHERE `employer_id` = '$employer_id'";
        $job = mysqli_query($this->connection,$sql);
        return $job;
    }

    function update($id, $career_id, $job_name, $type, $num, $gender, $position, $exp, $wage, $deadline, $address, $description, $request, $interest){
        $sql = "UPDATE `jobs_list` SET 
                    `career_id`         ='$career_id',
                    `job_name`          ='$job_name',
                    `wage`              ='$wage',
                    `type`              ='$type',
                    `num`               ='$num',
                    `position`          ='$position',
                    `gender`            ='$gender',
                    `exp`               ='$exp',
                    `job_address`       =' $address',
                    `job_description`   ='$description',
                    `request`           ='$request',
                    `interest`          ='$interest',
                    `deadline`          ='$deadline' 
                WHERE `ID`='$id'";

        mysqli_query($this->connection,$sql);
        if (mysqli_error($this->connection) == ""){
            return true;
        }else{
            return false;
        }
    } 
    
    function job_delete($id) {
        $sql = "DELETE FROM `jobs_list` WHERE `ID` = '$id'";

        mysqli_query($this->connection,$sql);
        
        if (mysqli_error($this->connection) == ""){
            return true;
        }else{
            return false;
        }
        
    }

    function find( $career_id, $job_name, $type,  $gender,  $exp, $wage, $address){

        $job_query      = "";
        $address_query  = "";
        $career_query   = "";
        $type_query     = "";
        $gender_query   = "";
        $exp_query      = "";
        $wage_query     = "";

        if($job_name != null)   $job_query      = " AND `jobs_list`.`job_name` like '%$job_name%'";
        if($address != null)    $address_query  = " AND `jobs_list`.`job_address` like '%$address%'";
        if($career_id != null)  $career_query   = " AND `jobs_list`.`career_id` = '$career_id'";
        if($type != null)       $type_query     = " AND `jobs_list`.`type` = '$type'";
        if($exp != null)        $exp_query      = " AND `jobs_list`.`exp` = '$exp'";
        if($wage != null)       $wage_query     = " AND `jobs_list`.`wage` like '%$wage%'";
        if($gender != null)     $gender_query   = " AND `jobs_list`.`gender` = '$gender'";

        $sql = "SELECT `jobs_list`.*, `career`.`career_name`, `employer`.* 
                FROM (`jobs_list` INNER JOIN `career` ON `jobs_list`.`career_id` = `career`.`id`) 
                INNER JOIN `employer` ON `employer`.`id` = `jobs_list`.`employer_id`
                WHERE `jobs_list`.`deadline` > CURRENT_TIMESTAMP()".$gender_query .$job_query .$address_query .$career_query .$type_query .$wage_query .$exp_query;
        
        $jobs= mysqli_query($this->connection,$sql);
        return $jobs;
    }

    function apply($job_id, $customer_id){
        $sql = "INSERT INTO `application`( `customer_id`, `job_id`) VALUES ('$customer_id','$job_id')";
        mysqli_query($this->connection,$sql);

        $count = $this->countApplication($job_id, null);
        $job_sql = "UPDATE `jobs_list` SET `num-of-apply` = '$count' WHERE `ID` = '$job_id'" ;
        mysqli_query($this->connection,$job_sql);

        if (mysqli_error($this->connection) == ""){
            return true;
        }else{
            return false;
        }
    }

    function selectApplication( $employer_id, $customer_id){

        $customer_query = "";
        if ($customer_id != null) $customer_query = " AND `application`.`customer_id` = '$customer_id'";

        $sql = "SELECT `application`.*, `customer`.* , `jobs_list`.`employer_id`
                FROM (`application` INNER JOIN `customer` ON `application`.`customer_id` = `customer`.`id`)
                      INNER JOIN `jobs_list` ON `application`.`job_id` = `jobs_list`.`ID`
                WHERE `employer_id` = '$employer_id'". $customer_query;

        $application= mysqli_query($this->connection,$sql);
        return $application;
    }


    function countApplication( $job_id, $customer_id){

        $customer_query = "";
        if ($customer_id != null) $customer_query = " AND `application`.`customer_id` = '$customer_id'";

        $sql = "SELECT COUNT(*)
                FROM `application`
                WHERE `job_id` = '$job_id'". $customer_query;

        $count= mysqli_query($this->connection,$sql);
        $count = mysqli_fetch_array($count);

        return $count[0];
    }

    function cancelApplication($customer_id, $job_id) {
        $sql = "DELETE FROM `application` WHERE `job_id` = '$job_id' AND `customer_id` = '$customer_id'";
        mysqli_query($this->connection,$sql);

        $count = $this->countApplication($job_id, null);
        $job_sql = "UPDATE `jobs_list` SET `num-of-apply` = '$count' WHERE `ID` = '$job_id'" ;
        mysqli_query($this->connection,$job_sql);

        if (mysqli_error($this->connection) == ""){
            return true;
        }else{
            return false;
        }
    }

    function report($id){
        $sql="DELETE FROM `report` WHERE `job_id` = '$id'";
        mysqli_query($this->connection,$sql);

        $sql = "INSERT INTO `report`(`job_id`) VALUES ('$id')";
        mysqli_query($this->connection,$sql);

    }

    function selectReport(){
        $sql = "SELECT `report`.*, `jobs_list`.*, `career`.`career_name`, `employer`.* 
                FROM ((`jobs_list` INNER JOIN `career` ON `jobs_list`.`career_id` = `career`.`id`) 
                INNER JOIN `employer` ON `employer`.`id` = `jobs_list`.`employer_id`)
                INNER JOIN `report` ON `report`.`job_id`=`jobs_list`.`ID` ORDER BY `report`.`create_at`ASC ";

        $job = mysqli_query($this->connection,$sql);
        return $job;
            
    }

    function reportDelete($id){
        $sql="DELETE FROM `report` WHERE `job_id` = '$id'";
        mysqli_query($this->connection,$sql);
        if (mysqli_error($this->connection) == ""){
            return true;
        }else{
            return false;
        }
    }
}
