<?php
if(isset($_POST['submit']))
{
  include('db.php');

  $db = new myday_database();

  $db->send_query("DELETE FROM tasks WHERE finished = '1';");

  header("Location: http://myday.bryanculver.com/");
}
else if(isset($_POST['cancel']))
{
  header("Location: http://myday.bryanculver.com/");
}

?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

  	<title>MyDay</title>

    <style type="text/css" media="screen">
      body
      {
        margin: 0;
        padding: 0;
      }
      div#site
      {
        width: 900px;
        margin: 0 auto 0;
        font: 14px Arial, sans-serif;
      }
      div#site.blackberry
      {
        width: 400px;
        margin: 0 auto 0;
        font: 18px Arial, sans-serif;
      }
      div.category
      {
        width: 300px;
        float: left;
        margin-bottom: 60px;
      }
      div#site.blackberry div.category
      {
        width: 400px;
      }
    </style>
  </head>

  <body>
  <div id="site" class="<?php
  $agent = $_SERVER['HTTP_USER_AGENT'];
  echo "User agent reported as: " . $agent . "\n";

  if (eregi("BlackBerry", $agent)) {
  echo "blackberry";
  }
  ?>">
    <h1>Are You Sure?</h1>
    <form action="prune.php" method="post" accept-charset="utf-8">
      <p><input type="submit" name="submit" value="Yes"/> <input type="submit" name="cancel" value="No"/></p>
    </form>
  </div>
  </body>
</html>