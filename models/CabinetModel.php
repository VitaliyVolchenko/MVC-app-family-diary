<?php

class CabinetModel extends Model
{
    public function getCategory($uid)
    {
        $sql = sprintf("SELECT `category` FROM `dbusers` WHERE `uid` = %d;",$uid);
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch();
        $cat = $res['category'];
        
        return $cat;
    }     
    
    /** upload file in db **/
    public function uploadFiles($file, $type, $size)
    {             
        $sql="SELECT * FROM `dbfile` WHERE `file` = '$file'";

        $stmt = $this->db->prepare($sql);
        //$$stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($row);
        if($row == 0) {
            $sql1 = "INSERT INTO `dbfile` SET `file` = '$file', `type` = '$type', `size` = '$size'";
            $stmt = $this->db->prepare($sql1);
            $stmt->bindValue(":file", $file, PDO::PARAM_STR);
            $stmt->bindValue(":type", $type, PDO::PARAM_STR);
            $stmt->bindValue(":size", $size, PDO::PARAM_STR);
            $res = $stmt->execute();
            return $res;
        } else {
            return false;
        }
    }

    /** get name of the saved file **/
    public function getFile(){
        $sql = "SELECT `file` FROM `dbfile` ORDER BY `id` DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['file'];
    }

    /** for save tasks **/
    public function saveTasks($task){
        $sql="INSERT INTO `dbtasks` SET `task` = '$task'";
        $stmt = $this->db->prepare($sql);
        $res = $stmt->execute();
        return $res;
    }
}