<?php
/**
* 
*/
require_once ('Operations.php');
class Side extends Operations
{
	public function __construct(){
		parent:: __construct();
		$this->operate = new Operations();
	}
	
public function aMessage(){
	$result  = $this->operate->retrieve('message','*','type = ?',null,null,['s','Prayer Message']);
	// $fetch = $result->fetch_assoc();
	$msg = '<div id="bs-example"><table class="design"><tr><th>Prayer Message</th><th>Date</th></tr>';
	while ($fetch = $result->fetch_assoc()) {
		$msg .= '<tr><td>'.$fetch['message'].'</td><td>'.$fetch['reg_date'].'</td></tr>'; 
	}
	$msg .= '</table></div>';

	return $msg;
	}

public function countMessage(){
	$result  = $this->operate->retrieve('message','*','type = ?',null,null,['s','Prayer Message']);

	return $count = $result->num_rows;
	}

public function aTestimony(){
	//$s = 'active';
	$res = $this->operate->retrieve('post_testimony','*','status = ?',null,null,['s','active']);

	$msg = '<div id="bs-example" ><table class = "design"><tr><th>Testimony</th><th>Date</th></tr>';

	while ($fetch = $res->fetch_assoc()) {
		$msg .='<tr><td>'.$fetch['test'].'</td><td>'.$fetch['reg_date'].'</td></tr>';
	}
	$msg .='</table></div>';

	return $msg;
	}

public function countTestimony(){
	//$s = "active";
	$result  = $this->operate->retrieve('post_testimony','*','status = ?',null,null,['s','active']);
	return $count = $result->num_rows;
	
	}

public function aPrayer(){
	$result  = $this->operate->retrieve('prayer','*',null,null,null,null);
	//$fetch = $result->fetch_assoc();
	$msg = '<div id="bs-example"><table class = "design"><tr><th>Prayer</th><th>Date</th></tr>';
	while ($fetch = $result->fetch_assoc()) {
		$msg .= '<tr><td>'.$fetch['content'].'</td><td>'.$fetch['reg_date'].'</td></tr>'; 
	}

	$msg .= '</table></div>';
	return $msg;
	}

public function countPrayer(){
	$result  = $this->operate->retrieve('prayer','*',null,null,null,null);

	return $count = $result->num_rows;
	}

public function quotes(){
$res = $this->operate->retrieve('message','*','type = ?','id DESC',null,['s','Quotes']);
$fetch = $res->fetch_assoc();

return $fetch['message'];
	}
}

$ba = new Side();
?>