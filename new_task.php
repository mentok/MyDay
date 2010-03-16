<?php
if(isset($_POST['cat_id']) && isset($_POST['new_task']))
{
  include('db.php');

  $db = new myday_database();

  $db->send_query("INSERT INTO tasks (
    `category`,
    `task`
  ) VALUES (
    '".mysql_real_escape_string($_POST['cat_id'])."',
    '".mysql_real_escape_string($_POST['new_task'])."'
  );");

  header("Location: http://myday.bryanculver.com/");
}
?>