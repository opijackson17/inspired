<?php
require_once("Operations.php");
class Bar extends Operations 
{

    public function __construct(){
        parent:: __construct();
        $this->operate = new Operations();

}
public function prayerMessage(){
	$result  = $this->operate->retrieve('message','*','type = ?',null,null,['s','Prayer Message']);   
        $d = $this->operate->retrieve('ratings', '*', 'id=? and type=?',null, null, ['is', $fetch['id'], 'Prayer Message']);
        $c = $this->operate->retrieve('comment', '*', 'id=? and type=?',null, null, ['is', $fetch['id'],'Prayer Message']);
	// $fetch = $result->fetch_assoc();
	$msg = '<div id="bs-example"><table class="design"><tr><th>Prayer Message</th><th>Date</th><th>Action</th></tr>';
	while ($fetch = $result->fetch_assoc()) {
		$msg .= '<tr><td>'.$fetch['message'].'</td><td>'.$fetch['reg_date'].'</td><td><i class = "fa fa-search" data-toggle="modal" data-target=".bd-example-modal-lg"></i></td></tr>'; 
	
    $msg .= '
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    Message
    </div>
    </div>
    </div>
    </table></div>';
    // while ($fth = $d->fetch_assoc()) {
    //     $msg .='<tr><td>'.$fetch['message'].'</td><td>'.$fth['likes'].'</td><td>'.$fth['dislikes'].'</td></tr>';
    // }
   
}
	return $msg;
    }
    
public function activeTestimony(){
    //$s = 'active';
    $res = $this->operate->retrieve('post_testimony','*','status = ?',null,null,['s','active']);

    $msg = '<div id="bs-example" ><table class = "design"><tr><th>Testimony</th><th>Date</th><th>Action</th></tr>';

    while ($fetch = $res->fetch_assoc()) {
        $msg .='<tr><td>'.$fetch['test'].'</td><td>'.$fetch['reg_date'].'</td><td><i class = "fa fa-search" data-toggle="modal" data-target=".bd-example-modal-lg"></i></td></tr>';
    }
    $msg .='
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <table class = "design">
            
        </table>
        </div>
    </div>
    </div>
    
    </table></div>';



    return $msg;
    }

public function Prayer(){
    $result  = $this->operate->retrieve('prayer','*',null,null,null,null);
    //$fetch = $result->fetch_assoc();
    $msg = '<div id="bs-example"><table class = "design"><tr><th>Prayer</th><th>Date</th><th>Action</th></tr>';
    while ($fetch = $result->fetch_assoc()) {
        $msg .= '<tr><td>'.$fetch['content'].'</td><td>'.$fetch['reg_date'].'</td><td><i class = "fa fa-search" data-toggle="modal" data-target=".bd-example-modal-lg"></i></td></tr>'; 
    }

    $msg .= '
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <table class = "design">
        
        </table>
        </div>
    </div>
    </div>
    
    </table></div>';
    return $msg;
    }

}
$bar = new Bar();

?>