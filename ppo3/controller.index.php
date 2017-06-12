<?php
require_once "/controller.php";
class ControllerIndex extends Controller
{
  public function __construct()
  {
    $this->LoadModules(null);
    parent::__construct();
  }
}
?>