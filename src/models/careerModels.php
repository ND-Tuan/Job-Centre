<?php 
class careerModels extends ConnectDB{
    function getAllValues(){
        $sql = "SELECT * FROM `career`";
        $career = mysqli_query($this->connection,$sql);
        return $career;
    }
}
