<?php
if(isset($_POST['submit']) && isset($_POST['id']))
{
  include('db.php');

  $db = new myday_database();

  $db->send_query("DELETE FROM categories WHERE id = '".mysql_real_escape_string($_POST['id'])."';");
  $db->send_query("DELETE FROM tasks WHERE category = '".mysql_real_escape_string($_POST['id'])."';");

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
    <?php
    
    include('db.php');
    
    $db = new myday_database();
    
    $category_sql = $db->send_query("SELECT * FROM categories WHERE id = ".mysql_real_escape_string($_GET['id']));
    
    $category = mysql_fetch_assoc($category_sql);
    
    ?>
    <p>This will delete everything in the "<?php echo $category['name']; ?>" category.</p>
    <form action="delete_category.php" method="post" accept-charset="utf-8">
      <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
      <p><input type="submit" name="submit" value="Yes"/> <input type="submit" name="cancel" value="No"/></p>
    </form>
  </div>
  </body>
</html>