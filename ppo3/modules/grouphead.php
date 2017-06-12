<?php
  class Grouphead
  {
    private $arr;
    public function __construct($arr)
    {
      $this->arr = $arr;
    }
    public function Execute($data)
    {
      $fileName = "";
      $content = "";
      if(!isset($data['group']) || !isset($this->arr[$data['group']]))
      {
        throw new Exception("Wrong parameters!");
      }

		$fileName = "info.head";
		foreach($this->arr[$data['group']] as $student)
		{
			
			if($student->Role == "head")
			{
			$content = "Фамилия: " . $student->Surname . 
					   "\nИмя: " . $student->Name . 
					   "\nОтчество: " . $student->SecondName . 
					   "\nРейтинг: " . $student->Rating . 
					   "\nГруппа: " . $data['group'] .
					   "\nСтатус: $student->Role";
			}
      
		}
      $exportFile = fopen(ROOT_DIR . "/" . $fileName . ".txt", "w");
      if(!$exportFile)
      {
        throw new Exception("Error with overwriting export file");
      }
      fwrite($exportFile, $content);
      fclose($exportFile);
	}
    public function View($groupname, $id)
    {
      if(is_array($id)) $id = 0;
      $res = array();
      $res['group'] = "<a class='btn btn-primary' href='/student/module?module=grouphead&group=$groupname'>Староста info.head.txt</a><br>";
      return $res;
    }
  }
?>