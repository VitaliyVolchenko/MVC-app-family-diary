<?php

class IndexController extends Controller
{
    private $pageTpl = '/views/main.tpl.php';

    public function __construct()
    {
        $this->model = new IndexModel();
        $this->view = new View();
    }

    public function index()
    {
        $this->pageData['title'] = "Вход в личный кабинет";
        if(!empty($_POST)){
            if(!$this->reg()){
                $this->pageData['error'] = "Registration failed. Username or category already exits please try again";
            } else {
                $this->pageData['error'] = "REGISTRATION SUCCESSFUL!!!";
            }
        }        
        $this->view->render($this->pageTpl, $this->pageData);        
    }

    public function reg()
    {
        if(!$this->model->regUser()){
            return false;
        } else {
            return true;
        }        
    }

    public function login()
    {
        header("Location: /login");
    }

}