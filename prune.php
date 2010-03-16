<?php
if(isset($_POST['submit']))
{
  require 'loader.php';

  $db = new myday_database();
  $db->send_query("DELETE FROM tasks WHERE finished = '1';");
  
  header("Location: ".$loader->url."/");
}
else if(isset($_POST['cancel']))
{
  require 'loader.php';
  header("Location: ".$loader->url."/");
}
require 'header.php';
?>
    <h1>Are You Sure?</h1>
    <form action="prune.php" method="post" accept-charset="utf-8">
      <p><input type="submit" name="submit" value="Yes"/> <input type="submit" name="cancel" value="No"/></p>
    </form>
<?php require 'footer.php'; ?>