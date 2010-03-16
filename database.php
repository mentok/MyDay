<?php
/**
 * Database Class for MyDay
 *
 * @author Bryan Culver
 * @version v1.0
 * @copyright Bryan Culver, 2 April, 2009
 **/

class myday_database {
	/**
	 * Connection Variable
	 * ~ Can be used outside the class to access the database
	 * 
	 * @var MySQL Resource
	 **/
	var $connection;
	
	/**
	 * Initialized Variable
	 * ~ Will be TRUE when connection established and selected
	 * ~ Can be accessed by calling is_connected()
	 * 
	 * @var boolean
	 **/
	private $init = FALSE;
	
	/**
	 * Message Variable
	 * ~ Will contain any error messages reported from this class
	 * ~ Can be accessed by calling get_messages()
	 *
	 * @var string
	 **/
	private $message = "";
	
	/**
	 * Constructor
	 * ~ Will attempt to establish a MySQL connection
	 * @return boolean
	 * @author Bryan Culver
	 **/
	function __construct()
	{
		$this->connection = mysql_connect("localhost", "myday", "pdFcLycHeT6pmFbr");
		if (!$this->connection) {
		    $this->message .= 'Could not connect: ' . mysql_error() . '<br />';
			return FALSE;
		}
		else
		{
			if(mysql_select_db("myday", $this->connection) == TRUE)
			{
				$this->init = TRUE;
				return TRUE;
			}
			else
			{
				$this->message .= 'Could not select db: ' . mysql_error() . '<br />';
				return FALSE;
			}
		}
	}
	
	function __destruct()
	{
	  //mysql_query("OPTIMIZE TABLE `categories` ,`tasks`", $this->connection);
	  //mysql_close($this->connection);
	}
	
	/**
	 * Returns initialization of class
	 *
	 * @return boolean
	 * @author Bryan Culver
	 **/
	function is_connected($return_message = FALSE)
	{
		return $this->init;
	}
	
	/**
	 * Returns all messeages obtained from this instance of this class
	 *
	 * @return string
	 * @author Bryan Culver
	 **/
	function get_messages()
	{
		return $this->message;
	}
	
	/**
	 * Runs SQL Statement passed to it
	 *
	 * @param string SQL Statement
	 * @return boolean // If failed
	 * @return integer // If INSERT
	 * @return MySQL Resource // If Successful but not INSERT
	 * @author Bryan Culver
	 **/
	function send_query($sql)
	{
		$result = mysql_query($sql,$this->connection);
		if($result === FALSE)
		{
			
			return FALSE;
		}
		else if(strcasecmp(substr(trim($sql), 0, 6), 'insert') === 0)
		{
			return mysql_insert_id($this->connection);
		}
		else
		{
			return $result;
		}
	}
} // END myday_database 
?>