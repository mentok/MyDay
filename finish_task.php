<?php
if(isset($_GET['id']))
{
  require 'loader.php';
  
  $this_task = new myday_task($_GET['id']);
  
  if(isset($_GET['undo']) && $_GET['undo'] == "true") $this_task->unfinish();
  else $this_task->finish();
  
  header("Location: ".$loader->url."/");
}
?>