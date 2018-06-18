<?php

class TasksController extends Controller
{
    private $pageTpl = "/views/tasks.tpl.php";

    public function __construct()
    {
        $this->model = new TasksModel();
        $this->view = new View;
    }

    public function index()
    {
        if(!$_SESSION['user']){
            header("Location: /");
        }
        $this->pageData['title'] = "Tasks";

        $name = $_SESSION['user'];
        $id = $_SESSION['id'];
        $cat = $this->model->getCategory($id);
        $row = $this->model->getTasks();           
        //print_r($row);  
        $this->pageData['row'] = $row;
        $this->pageData['name'] = $name;
        $this->pageData['category'] = $cat;
        
        $this->view->render($this->pageTpl, $this->pageData);
    }

}