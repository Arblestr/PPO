<?php
$ajax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!$ajax)
{
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?=$title?></title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/style.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="/bootstrap/js/json.js" type="text/javascript"></script>
  </head>
  <body>
    <div class="app-settings" style="text-align: center"> 
    </div>
    <div class="content">
      <?php include '/' . $content ?>
    </div>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}
else
{
  include '/' . $content;
}
?>
