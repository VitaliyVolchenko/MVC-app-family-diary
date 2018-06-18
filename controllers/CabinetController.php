<?php

class CabinetController extends Controller
{
    private $pageTpl = "/views/cabinet.tpl.php";

    public function __construct()
    {
        $this->model = new CabinetModel();
        $this->view = new View;
    }

    public function index()
    {
        if(!$_SESSION['user']){
            header("Location: /");
        }
        $this->pageData['title'] = "Cabinet";
        $id = $_SESSION['id'];        
        $name = $_SESSION['user'];        
        $category = $this->model->getCategory($id);

        $this->pageData['category'] = $category;
        $this->pageData['name'] = $name;

        $this->uploadFile();

        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function logout()
    {
        session_destroy();
        header("Location: /");
    }

    public function uploadFile()
    {
        $model = $this->model;
        if(isset($_POST['btn-upload'])) {
            $max_size = 20971520;
            $file = rand(1000, 100000) . "-" . $_FILES['file']['name'];
            $file_loc = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];
            if ($file_size > $max_size) {
                echo "Flie size is exceeds the limit";
                exit();
            }
            $file_type = $_FILES['file']['type'];
            $folder = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
            if (move_uploaded_file($file_loc, $folder . $file)) {
                //echo "local file successfuly upload in $folder <br>";                
                $model->uploadFiles($file, $file_type, $file_size);
                $file_name = $model->getFile();
                $content = file($_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $file_name);
                foreach ($content as $string) {
                    //echo '<br>' . $string;
                    $model->saveTasks($string);
                }
                
            } else {
                echo "File $file was not uploaded $folder \n";
            }
        }
    }
}