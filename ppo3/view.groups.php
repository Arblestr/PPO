<?php
      foreach($modules as $module)
      {
        $c = $module[0]->View(null, null);
        if(isset($c['main'])) echo $c['main'];
      }
?>
  <h1>Группы</h1>
  <center>
  <?php
  if(!empty($_SESSION['UNDO'])) echo '<a href="/memory/undo/"><span class="glyphicon glyphicon-step-backward"></span> Отменить</a>&nbsp;';
  if(!empty($_SESSION['REDO'])) echo '<a href="/memory/redo/">Применить <span class="glyphicon glyphicon-step-forward"></span></a>&nbsp;';
  ?>
</center>
<?php
  foreach ($data as $groupname => $group)
  {
?>
  <div class="block">
    <div class="name">
      <a href="/group/show?group=<?=$groupname?>"><?=$groupname?></a>
      </br><span><?=$nums[$groupname]?> человек(а)</span>
    </div>
    <div class="block-content">
      <ul>
    <?php
      foreach($group as $id => $student)
      {
    ?>
        <li><a href="/student/show?group=<?=$groupname?>&id=<?=$id?>"><?=$student->Name?> <?=$student->Surname?></a></li>
    <?php
      }
    ?>
      </ul>
    </div>
  </div>
<?php
  }
 ?>

 <div class="block" id="add_group_block">
   <div class="name"><a>Создать группу</a></div>
   <div class="block-content">
     <form id="add-group">
       <div class="form-group">
         <input id="gname" type="text" class="form-control" placeholder="Название" required>
       </div>
       <center><button class="btn btn-primary" type="submit">ОК</button></center>
     </form>
   </div>
  </div>
  <script>
    $( document ).ready(function() {
        $("#add-group").submit(function() {
          var gname = $('#gname').val();
          var formData = {};
          formData[gname] = {};
          $.ajax({
            url:'/group/edit?action=add',
            type:'POST',
            data:'EDIT_DATA=' + $.toJSON(formData),
            success: function(res) {
                $(".content").html(res);
            }
          });
          return false;
        });
    });
  </script>
