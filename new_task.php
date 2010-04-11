<?php
if(isset($_POST['cat_id']) && isset($_POST['new_task']))
{
  require 'loader.php';
  
  $new_task = new myday_task();
  
  $new_task->create($_POST['cat_id'], $_POST['new_task']);
  
  header("Location: ".$loader->url."/#c".$_POST['cat_id']);
}
?>