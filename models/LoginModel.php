<?php

class LoginModel extends Model
{

    public  function checkUser()
    {
        $name = $_POST['name'];
        $password = md5($_POST['upass']);

        $sql="SELECT * FROM `dbusers` WHERE `name` = '$name' AND `upass` = '$password'";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":upass", $password, PDO::PARAM_STR);

        $stmt->execute();

        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($res)) {
            $_SESSION['user'] = $_POST['name']; 
            $_SESSION['id'] = $res['uid'];
            header("Location: /cabinet");            
        } else {
            return false;
        }
    }

}