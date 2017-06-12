<h1><a href="/group/show/"><< Группы</a></h1>

<div class="block" id="add_group_block">
  <div class="name">
    <a><?=$data->Surname?> <?=$data->Name?> <?=$data->SecondName?></a>
  </div>
  <div class="block-content">
    <center>
      <img src="../../<?=$src?>.jpg" width="100" height="100">
    </center>
    </br><center><span id="span_rate">Рейтинг: </span><?=$data->Rating?> <br>
    <span> Статус: </span><?=$data->Role?></center>
  </div>
  <form id="delete" style="margin: 20px;">
    <button class="btn btn-primary" type="submit">Удалить студента</button>
  </form>
  <?php
  foreach($modules as $module)
  {
    $content = $module[0]->View($data->Group, $id);
    if(isset($content['student'])) echo $content['student'];
  }
  ?>
</div>
<script>
  $( document ).ready(function() {
      $("#delete").submit(function() {
        var formData = {};
        formData["<?=$data->Group?>"] = "<?=$id?>";
        $.ajax({
          url:'/student/edit?action=delete',
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
