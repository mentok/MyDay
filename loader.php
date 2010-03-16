<?php
function __autoload($class) {
    $class_break = explode("_", $class);
    if($class_break['0'] == 'myday') require_once substr($class, 6). '.php';
    else require_once $class. '.php';
}

class myday_loader
{
  var $url = "http://";
  var $categories =  array();
  var $banter = array(
    "Yeah, it's getting long... Hang in there.",
    "Ouch... That's quite a big list. You have to do all that?",
    "Oh do I feel sorry for you.",
    "Don't forget! Oh wait, that's my job.",
    "Might want to get on that."
  );
  function load()
  {
    $db = new myday_database();
    $cat_db = $db->send_query("SELECT id FROM categories");
    
    $c = 0;
    while($cat = mysql_fetch_assoc($cat_db))
    {
      $this->categories[$c] = new myday_category($cat['id']);
      $c++;
    }
  }
}
$loader = new myday_loader();
$loader->url .= $_SERVER['HTTP_HOST'];
?>