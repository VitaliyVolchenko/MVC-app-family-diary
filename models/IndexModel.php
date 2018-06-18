<?php

class IndexModel extends Model
{
    public function regUser()
    {
        $name = $_POST['name'];
        $password = md5($_POST['upass']);
        $category = $_POST['category'];

        $sql = "SELECT * FROM `dbusers` WHERE `name` = '$name'
                OR `category` = '$category'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($row == 0) {
            $sql1 = "INSERT INTO `dbusers` SET `category` = '$category',
                    `upass` = '$password', `name` = '$name'";
            $stmt = $this->db->prepare($sql1);
            $stmt->bindValue(":category", $category, PDO::PARAM_STR);
            $stmt->bindValue(":name", $name, PDO::PARAM_STR);
            $stmt->bindValue(":upass", $password, PDO::PARAM_STR);
            $stmt->execute();
            return true;            
        }
    }

}