<?php

class TaskController extends Controller
{
    private $pageTpl = "/views/task.tpl.php";

    public function __construct()
    {
        $this->model = new TaskModel();
        $this->view = new View;
    }

    public function index()
    {
        if(!$_SESSION['user']){
            header("Location: /");
        }
        $this->pageData['title'] = "Task";
        //$name = $_SESSION['user'];
        $id = $_GET['id'];
        if (isset($_REQUEST['appoint'])) {
            extract($_REQUEST);
            $name = $_POST['name'];
            $mem = $this->model->appointMem($id, $name);
            if ($mem) {
                //  Success
                header("location:/cabinet/tasks");
            } else {
                //  Failed
                echo 'Wrong appoint member family!';
            }
        }
        if (isset($_REQUEST['mark'])) {
            extract($_REQUEST);
            $done = $this->model->markDone($id);
            if ($done) {
                //  Success
                header("location:/cabinet/tasks");
            } else {
                //  Failed
                echo 'Wrong mark done';
            }
        }
        if (isset($_REQUEST['delete'] )) {
            extract($_REQUEST);
            $del = $this->model->taskDelete($id);
            if ($del) {
                //  Success
                header("location:/cabinet/tasks");
            } else {
                //  Failed
                echo 'Wrong delete done';
            }
        }        
        $task = $this->model->getTask($id);
        $this->pageData['task'] = $task;

        $this->view->render($this->pageTpl, $this->pageData);
    }

}