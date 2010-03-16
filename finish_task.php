<?php
if(isset($_GET['id']))
{
  if(isset($_GET['undo']) && $_GET['undo'] == "true") $finished = 0;
  else $finished = 1;
  
  include('db.php');

  $db = new myday_database();

  $db->send_query("UPDATE tasks SET `finished` = '".$finished."' WHERE `id` = ".mysql_real_escape_string($_GET['id']).";");
  
  header("Location: http://myday.bryanculver.com/");
}
?>