<?php
class DbConfig 
{	
	private $_host = 'localhost';
	private $_username = 'root';
	private $_password = '';
	private $_database = 'prayer';
	
	protected $conn;
	//$conn = new mysqli($_host, $_username, $_password, $_database);

	public function __construct()
	{
		if (!isset($this->conn)) {
			
			$this->conn = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
			
			if (!$this->conn) {
				echo 'Cannot connect to database server';
				exit;
			}			
		}	
		
		return $this->conn;
	}

}
?>
