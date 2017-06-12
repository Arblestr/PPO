<?php
require_once "/controller.php";

class ControllerStudent extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->model = new ModelStudent();
	$data = $this->model->GetData();
    $this->LoadModules($data);
  }

  public function ActionShow($args)
  {
    if(!isset($args['id']) || !isset($args['group']))
    {
      throw new Exception("Missing student ID");
    }
    $src = "student"; 
    $replace = array(
      'title' => "Student card!",
      'data' => $this->model->GetStudent($args['group'], $args['id']),
      'src' => $src,
      'id' => $args['id'],
	  'modules' => $this->modules->GetAll()

    );
    $this->view->Render("view.student.php", 'view.main.php', $replace);
  }

  public function ActionEdit($args)
  {
    $this->model->Edit($args);
    $this->Location("group/show");
  }

}

?>
