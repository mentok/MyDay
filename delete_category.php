<?php
if(isset($_POST['submit']) && isset($_POST['id']))
{
  require 'loader.php';
  
  $this_category = new myday_category($_POST['id']);
  
  $this_category->delete();
  
  header("Location: ".$loader->url."/");
}
else if(isset($_POST['cancel']))
{
  require 'loader.php';
  header("Location: ".$loader->url."/");
}
require('header.php');
?>
    <h1>Are You Sure?</h1>
    <?php
    
    $category = new myday_category($_GET['id']);
    
    ?>
    <p>This will delete everything in the "<?php echo $category->name(); ?>" category.</p>
    <form action="delete_category.php" method="post" accept-charset="utf-8">
      <input type="hidden" name="id" value="<?php echo $category->id(); ?>"/>
      <p><input type="submit" name="submit" value="Yes"/> <input type="submit" name="cancel" value="No"/></p>
    </form>
<?php require 'footer.php'; ?>