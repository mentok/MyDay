<?php
require('header.php');
$loader->load();
?>

  <h1>Your Day</h1>
  <p><?php echo $loader->banter[array_rand($loader->banter)]; ?></p>
  <div class="category" style="margin-bottom: 10px;">
    <b>New Category:</b>
    <form action="new_category.php" method="post" accept-charset="utf-8">
      <input type="text" name="new_category" value="" class="new_category"/>
      <input type="submit" name="submit_category" value="Add" class="submit_category"/>
    </form>
  </div>
  <div style="clear: both;"></div>
  <?php

  $c = 1;

  foreach($loader->categories as $category)
  { ?>
    <div class="category" id="c<?php echo $category->id(); ?>">
    <form action="new_task.php" method="post" accept-charset="utf-8">
      <b><?php echo $category->name(); ?><?php if($category->id() != "1") { ?> <a href="delete_category.php?id=<?php echo $category->id(); ?>"><img src="cross.png" alt="Delete Category" /></a><?php } ?></b>
      <ul>
<?php

    $these_tasks = $category->tasks();

    foreach($these_tasks as $task)
    { 
      ?>
      
      <li <?php if($task->finished()) echo "class=\"finished\""; ?>><?php echo $task->task(); ?><a href="finish_task.php?id=<?php echo $task->id(); ?><?php if($task->finished()) echo "&amp;undo=true"; ?>"><img src="tick<?php if($task->finished()) echo "_finished"; ?>.png" alt="Check Finished"/></a></li>
    <?php } ?>
    
    <li><input type="hidden" name="cat_id" value="<?php echo $category->id(); ?>"/><input type="text" name="new_task" value="" class="new_task"/><input type="submit" name="submit_task" value="Add" class="submit_task"/></li>
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
<?php require 'footer.php'; ?>