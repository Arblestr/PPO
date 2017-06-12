<?php
  require_once "edit.php";
  require_once "/registry.php";
  session_start();
  
  define("ROOT_DIR", __DIR__);

  require_once "request.php";
  require_once "main.controller.php";

  $request = new Request();
  $controller = $request->Controller();
  $action = $request->Action();

  try
  {
    $mainController = MainController::GetInstance(); 
    $mainController->ConnectController($controller);
    $mainController->Call($action, $request->args());
  }
  catch (Exception $e)
  {
    $mainController = MainController::GetInstance();
    $mainController->ConnectController("Error");
    $mainController->Call("main", $e);
  }

 ?>
