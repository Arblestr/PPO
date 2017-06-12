<?php
require_once "/controller.php";

class ControllerGroup extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->model = new ModelGroup();
	$data = $this->model->GetData();
    $this->LoadModules($data);
  }

  public function ActionShow($args)
  {
    $groups = $this->model->GetGroups($args);
    $studNum = array();
    $rating = array();
    foreach($groups as $group => $students)
    {
      $studNum[$group] = $this->model->StudNumber($group);
      $rating[$group] = $this->model->Rating($group);
    }
    $replace = array(
      'title' => "All groups!",
      'data' => $groups,
      'nums' => $studNum,
      'rat' => $rating,
	  'modules' => $this->modules->GetAll()
    );
    if(!isset($args['group']))
    {
      $this->view->Render("view.groups.php", 'view.main.php', $replace);
    }
    else
    {
      $this->view->Render("view.group.php", 'view.main.php', $replace);
    }
  }

  public function ActionEdit($args)
  {
    $this->model->Edit($args);
    $this->Location("group/show");
  }

}

?>
