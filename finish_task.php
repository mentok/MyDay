<?php
if(isset($_GET['id']))
{
  require 'loader.php';
  
  $this_task = new myday_task($_GET['id']);
  
  if($this_task->finished()) $this_task->unfinish();
  else $this_task->finish();
  
  header("Location: ".$loader->url."/");
}
?>