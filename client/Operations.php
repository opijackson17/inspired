<?php
/*

Developed by Okonye John Francis, Opi Jackson, Obua Emmanuel & Odur Charles Lwanga
under the supervision of Madam Mary Nsabagwa 
public function __construct()
		  {
		    parent::__construct();
		    $this->operate = new Operations();
		  }

*/

include_once ('DbConfig.php');

class Operations extends DbConfig{

	public $operate;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function escape($value){		
		return mysqli_real_escape_string($this->conn, $value);

		/*foreach ( $value as $k=>$v ) {
	   	return ${mysqli_real_escape_string( $this->conn, $k )} = mysql_reali_escape_string( $this->conn, $v );
		}*/
	}

		//Insert function
	/*
		Syntax *******
		insert('pupil',array('id'=>'?','pID'=>'?','fName'=>'?','lName'=>'?'),[ 'iiss', $id,$pID,$this->fname, $this->lname] )
    */
	public function insert($table,$params=array(), $bind = array() ){   

		$sql='INSERT INTO '.$table.' ('.implode(',',array_keys($params)).') VALUES ('.implode(',', $params).')';

		$stmt = $this->conn->prepare($sql);
		echo $this->conn->error;
		if ( $type = array_shift( $bind ) )
	        // call_user_func_array( array( $stmt, 'bind_param' ), array_merge( array( $type ), 
	        // 	array_map( function( &$item ) { return $item; }, $bind ) ) 
	        // );
	        $ref = new \ReflectionClass('mysqli_stmt');
 			$ref->getMethod("bind_param")->invokeArgs($stmt, array_merge( array( $type ), 
		    array_map( function( &$item ) { return $item; }, $bind ) )
	        );
	    $stmt->execute();
        return $stmt;
        $stmt->close();

	}

		//Retrieve function
	/*
		Syntax ******* 
		retrieve('pupil','id, fName, lName,gender','fName = ? AND gender=?',NULL,NULL,['ss',$i,$j])
		if u dont hv parameters to bind e.g. 'SELECT * FROM table' or 'SELECT name,date FROM table', dont pass in the last parameter in the function, Put NULL.

		Also any parameter of the function u are not going to use...... Just put NULL.
    */
    public function retrieve($table, $rows, $where = null, $order = null, $limit = null, $bind = array()){

    		$sql = 'SELECT '.$rows.' FROM '.$table;
			
	        if($where != null){
	        	$sql .= ' WHERE '.$where;       	
			}
	        if($order != null){
	            $sql .= ' ORDER BY '.$order;
			}
	        if($limit != null){
	            $sql .= ' LIMIT ' .$limit;
	        }
	       
    		$stmt = $this->conn->prepare($sql);
    		if (!empty($bind)) {

    			if ( $type = array_shift( $bind ) )
		        // call_user_func_array( array( $stmt, 'bind_param' ), array_merge( array( $type ), 
		        // 	array_map( function( &$item ) { return $item; }, $bind ) ) 
		        // );
				$ref = new \ReflectionClass('mysqli_stmt');
	 			$ref->getMethod("bind_param")->invokeArgs($stmt, array_merge( array( $type ), 
			    array_map( function( &$item ) { return $item; }, $bind ) )
		        );
	    		$stmt->execute();
    		}else{
    			$stmt->execute();
    		}
    					
			$result = $stmt->get_result();

			return $result;
	}

		//Update function
	/*
		Syntax ******* 
		update('pupil',array('fName'=>"?",'lName'=>"?"),'id = ?',['ss',$i,$j,$k])
    */
    public function update($table,$params=array(),$where,$count,$bind=array()){

		$args=array();
		foreach($params as $field=>$value){
			// Seperate each column out with it's corresponding value
			$args[]=$field.'='.$value.' ';
		}

		$sql='UPDATE '.$table.' SET '.implode(',',$args).' WHERE '.$where;
		//echo $sql;
		 $stmt = $this->conn->prepare($sql);
		 if ( $type = array_shift( $bind ) )
			$ref = new \ReflectionClass('mysqli_stmt');
		$ref->getMethod("bind_param")->invokeArgs($stmt, array_merge( array( $type ), 
		 array_map( function( &$item ) { return $item; }, $bind ) )
		);
		$stmt->execute();
		return $stmt;
 	
    }

    	//Delete Function
    /*
		Syntax ******* 
		delete('pupil','id =  ?',['i',$i])
    */
    public function delete($table,$where,$bind=array()){
		$sql = "DELETE FROM ".$table." WHERE ".$where." ";
		$stmt = $this->conn->prepare($sql);
		if ( $type = array_shift( $bind ) )
		$ref = new \ReflectionClass('mysqli_stmt');
		$ref->getMethod("bind_param")->invokeArgs($stmt, array_merge( array( $type ), 
		 array_map( function( &$item ) { return $item; }, $bind ) )
		);
	   $stmt->execute();
	   return $stmt;
   }

}

?>