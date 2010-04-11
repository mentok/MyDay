<?php

class myday_category
{
  
  private $id = 0;
  private $name = "";
  private $tasks = array();
  
  function __construct($id = 0)
  {
    if($id != 0)
    {
      $this->init($id);
    }
  }
  
  function id()
  {
    return $this->id;
  }
  
  function name()
  {
    return $this->name;
  }
  
  function tasks()
  {
    return $this->tasks;
  }
  
  function init($id)
  {
    $db = new myday_database();
    
    $result = $db->send_query("SELECT * FROM categories WHERE id = ".mysql_real_escape_string($id));
    if($result == FALSE) return FALSE;
    
    $result = mysql_fetch_assoc($result);
    if($result == FALSE) return FALSE;
    
    $this->id = $result['id'];
    $this->name = $result['name'];
    
    $these_tasks = $db->send_query("SELECT id FROM tasks WHERE category = ".$this->id);
    $c = 0;
    while($id = mysql_fetch_assoc($these_tasks))
    {
      $this->tasks[$c] = new myday_task($id['id']);
      $c++;
    }
  }
  
  function create($name)
  {
    $db = new myday_database();
    
    if(empty($name))
    {
      return FALSE;
    }

    $result = $db->send_query("INSERT INTO categories (
      `name`
    ) VALUES (
      '".mysql_real_escape_string($name)."'
    );");
    
    if(!is_int($result) && $result === FALSE)
    {
      return FALSE;
    }
    else
    {
      $this->init($result);
      return TRUE;
    }
  }
  
  function delete()
  {
    $db = new myday_database();
    
    if($db->send_query("DELETE FROM categories WHERE id = '".mysql_real_escape_string($this->id)."';") == FALSE) return FALSE;
    $db->send_query("DELETE FROM tasks WHERE category = '".mysql_real_escape_string($this->id)."';");
    
    return TRUE;
  }
}

?>