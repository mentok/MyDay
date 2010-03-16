<?php
$banter = array(
  "Yeah, it's getting long... Hang in there.",
  "Ouch... That's quite a big list. You have to do all that?",
  "Oh do I feel sorry for you.",
  "Don't forget! Oh wait, that's my job.",
  "Might want to get on that."
);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
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
      margin-bottom: 20px;
    }
    div#site.blackberry div.category
    {
      width: 400px;
    }
    div.category ul
    {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    div.category ul li
    {
      padding: 6px;
      background-color:#eee;
      margin: 5px 10px 5px 0;
      word-wrap: break-word;
    }
    div.category ul li.finished
    {
      background-color:#f9f9f9;
      color:#999;
    }
    div.category ul li input.new_task, div.category input.new_category
    {
      font-size:1.1em;
      width: 205px;
      padding: 5px;
    }
    div#site.blackberry div.category ul li input.new_task, div#site.blackberry div.category input.new_category
    {
      width: 305px;
    }
    div.category ul li input.submit_task
    {
      margin-left: 12px;
    }
    div#site.blackberry input.submit_task, div#site.blackberry input.submit_category
    {
      margin-left: 0;
      font-size: 1.1em;
    }
    div.category ul li a
    {
      font-weight: bold;
      color: #000;
      text-decoration: none;
      font-size: 1.2em;
    }
    div.category ul li a img
    {
      vertical-align: middle;
      margin-bottom: 1px;
      float: right;
      border: none;
    }
    div.category b a img
    {
      vertical-align: bottom;
      border: none;
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
  <h1>Your Day</h1>
  <p><?php echo $banter[array_rand($banter)]; ?></p>
  <div class="category" style="margin-bottom: 10px;">
    <b>New Category:</b>
    <form action="new_category.php" method="post" accept-charset="utf-8">
      <input type="text" name="new_category" value="" class="new_category"/>
      <input type="submit" name="submit_category" value="Add" class="submit_category"/>
    </form>
  </div>
  <div style="clear: both;"></div>
  <?php

  include('db.php');

  $db = new myday_database();

  $categories = $db->send_query("SELECT * FROM categories");

  $c = 1;

  while($category = mysql_fetch_assoc($categories))
  { ?>
    <div class="category">
    <form action="new_task.php" method="post" accept-charset="utf-8">
      <b><?php echo $category['name']; ?><?php if($category['id'] != "1") { ?> <a href="delete_category.php?id=<?php echo $category['id']; ?>"><img src="cross.png" alt="Delete Category" /><?php } ?></a></b>
      <ul>
<?php

    $these_tasks = $db->send_query("SELECT * FROM tasks WHERE category = ".$category['id']);

    while($task = mysql_fetch_assoc($these_tasks))
    { 
      ?>
      
      <li <?php if($task['finished'] == "1") echo "class=\"finished\""; ?>><?php echo htmlentities(stripslashes($task['task'])); ?><a href="finish_task.php?id=<?php echo $task['id']; ?><?php if($task['finished'] == "1") echo "&amp;undo=true"; ?>"><img src="tick<?php if($task['finished'] == "1") echo "_finished"; ?>.png" alt="Check Finished"/></a></li>
    <?php } ?>
    
    <li><input type="hidden" name="cat_id" value="<?php echo $category['id']; ?>"/><input type="text" name="new_task" value="" class="new_task"/><input type="submit" name="submit_task" value="Add" class="submit_task"/></li>
      </ul>
    </form>
    </div>
<?php
    if($c == 3)
    { ?>
<div style="clear: both;"></div>    
<?php
    }
    else if($c == 4)
    {
      $c = 1;
    }
    $c = $c + 1;
  }
  ?>
  <div style="clear: both;"></div>
  <p><a href="prune.php">prune</a></p>
</div>
</body>
</html>
