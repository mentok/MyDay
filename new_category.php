<?php
if(isset($_POST['new_category']))
{
  require 'loader.php';
  
  $new_category = new myday_category();
  
  $new_category->create($_POST['new_category']);
  
  header("Location: ".$loader->url."/");
}
?>