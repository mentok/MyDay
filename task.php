<?php

class myday_task {
  
  private $id = 0;
  private $category = 0;
  private $task = "";
  private $finished = FALSE;
  
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
  
  function category()
  {
    return $this->category;
  }
  
  function task()
  {
    return $this->task;
  }
  
  function finished()
  {
    return $this->finished;
  }
  
  function init($id)
  {
    $db = new myday_database();
    $result = $db->send_query("SELECT * FROM tasks WHERE id = ".$id);
    if($result == FALSE) return FALSE;
    
    $task = mysql_fetch_assoc($result);
    
    $this->id = $task['id'];
    $this->category = $task['category'];
    $this->task = $task['task'];
    $this->finished = (bool) $task['finished'];
  }
  
  function create($category, $task)
  {
    $db = new myday_database();

    $result = $db->send_query("INSERT INTO tasks (
      `category`,
      `task`
    ) VALUES (
      '".mysql_real_escape_string($category)."',
      '".mysql_real_escape_string($task)."'
    );");
    
    if(!is_int($result) && $result === FALSE)
    {
      return FALSE;
    }
    else
    {
      return TRUE;
    }
  }
  
  function finish()
  {
    $db = new myday_database();

    $result = $db->send_query("UPDATE tasks SET `finished` = '1' WHERE `id` = ".$this->id.";");
  
    return $result;
  }
  
  function unfinish()
  {
    $db = new myday_database();

    $result = $db->send_query("UPDATE tasks SET `finished` = '0' WHERE `id` = ".$this->id.";");
  
    return $result;
  }
}

?>