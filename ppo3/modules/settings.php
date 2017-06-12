<?php
  class Settings
  {
    private $setting;
    public function __construct($data)
    {
      if(!isset($_COOKIE["settings"]))
      {
        $this->settings = "310px";
      }
      else
      {
        $this->settings = $_COOKIE["settings"];
      }
    }
    public function Execute($data)
    {
      if(!isset($data['set']))
      {
        throw new Exception("Wrong module parameters!");
      }
      setcookie("settings", $data['set'], time()+3600, '/');
    }
    public function View($tmp1, $tmp2)
    {
      $res = array();
      $res['main'] = "<style>.block{width: $this->settings !important;}</style>
	  <p id='vid'>Вид:
	  <a id='set-big' class='btn btn-primary'>Строки</a>
	  <a id='set-small' class='btn btn-primary'>Столбцы</a></p>
	  <script>$('#set-big').click(function(){window.location.href='/index/module?module=settings&set=100%'});
	  $('#set-small').click(function(){window.location.href='/index/module?module=settings&set=310px'})</script>";
      return $res;
    }
  }
?>