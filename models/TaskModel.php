<?php

class TaskModel extends Model
{
    /* for showing the task*/
    public function getTask($id){
        $sql = sprintf("SELECT `task` FROM `dbtasks` WHERE `id` = %d;",$id);
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['task'];
    }

    /** mark done **/
    public function markDone($id){
        $mark = "DONE";
        $sql = sprintf("UPDATE `dbtasks` SET `mark` = '$mark' WHERE `id` = %d;",$id);
        $stmt = $this->db->prepare($sql);
        $res = $stmt->execute();        
        return $res;
    }

    /** delete task **/
    public function taskDelete($id){
        $sql = sprintf("DELETE FROM `dbtasks` WHERE `id` = %d;",$id);
        $stmt = $this->db->prepare($sql);
        $res = $stmt->execute();
        return $res;        
    }

    /*appoint a member for task*/
    public function appointMem($id, $name){        
        $sql = sprintf("UPDATE `dbtasks` SET `mem` = '$name' WHERE `id` = %d;",$id);
        $stmt = $this->db->prepare($sql);
        $res = $stmt->execute();
        return $res;        
    }
}