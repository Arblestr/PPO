<?php
  class Infosave
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
      if(!isset($data['id']))
      {
        $fileName = "info.group";
		$content .= $data['group'] . "\n";
        foreach($this->arr[$data['group']] as $student)
        {
			if($student->Role == "head")
			{
				$content .= $student->Name . " " . $student->Surname . " " .$student->Role . "\n";
			}
			else
				$content .= $student->Name . " " . $student->Surname . "\n";
        }
      }
      else
      {
        $fileName = "info.student";
        $student = $this->arr[$data['group']][$data['id']];
        $content = "Фамилия: " . $student->Surname . 
		           "\nИмя: " . $student->Name . 
				   "\nОтчество: " . $student->SecondName . 
				   "\nРейтинг: " . $student->Rating . 
				   "\nГруппа: " . $data['group'] .
				   "\nСтатус: $student->Role";
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
      $res['group'] = "<br><a class='btn btn-primary' href='/group/module?module=infosave&group=$groupname'>Экспорт группы в</br>info.group.txt</a><br>";
      $res['student'] = "<a class='btn btn-primary' href='/student/module?module=infosave&group=$groupname&id=$id'>Экспорт студента в</br>info.student.txt</a><br>";
      return $res;
    }
  }
?>