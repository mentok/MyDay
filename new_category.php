<?php
if(isset($_POST['new_category']))
{
  include('db.php');

  $db = new myday_database();

  $db->send_query("INSERT INTO categories (
    `name`
  ) VALUES (
    '".mysql_real_escape_string($_POST['new_category'])."'
  );");

  header("Location: http://myday.bryanculver.com/");
}
?>