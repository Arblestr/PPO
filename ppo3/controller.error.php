<?php
require_once "/controller.php";

class ControllerError extends Controller
{
  public function __constriuct()
  {
    parent::__construct();
  }

  public function ActionMain($error)
  {
    $replace = array('title' => "Error!", 'error' => $error);
    $this->view->Render("view.error.php", 'view.main.php', $replace);
  }

}

?>
