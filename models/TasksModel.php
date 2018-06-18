<?php

class TasksModel extends Model
{
    /*get tasks*/
    public function getTasks()
    {
        $sql = "SELECT * FROM `dbtasks`";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function getCategory($uid)
    {
        $sql = sprintf("SELECT `category` FROM `dbusers` WHERE `uid` = %d;",$uid);
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch();
        $cat = $res['category'];

        return $cat;
    }
}