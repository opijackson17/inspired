<?php

/**
 * 
 */
include_once("../client/Operations.php");
class Prequest extends Operations
{
	
	public function __construct()
	{
		parent:: __construct();
		$this->operate = new Operations();
	}

public function getRequest(){

	$result = $this->operate->retrieve('pwyou','*',null, null,null,null);
	// $fetch = $result->fetch_assoc();

	// $check = $this->operate->retrieve('user','*','uname=?',null,null,['s',$fetch['user']]);
	// $get = $check->fetch_assoc();
	$request ='<section class="boxs" style="width:60%; margin-left:auto; margin-right:auto; margin-top:5em;">
              <div class="boxs-header dvd dvd-btm">
                  <h1 class="custom-font"><strong>Prayer Needs </strong></h1>
              </div>
              <div class="content-box-large">
              <div class="panel-heading">
              <div class="panel-body">
                <table class="table table-condensed"><tr><th>Full Name</th><th>Contact</th><th>Prayer Need</th><th>Date</th><th>Action</th></tr>';
	while ($fetch = $result->fetch_assoc()) {
		$request .= '<tr><td>'.$fetch['user'].'</td><td>'.$fetch['contact'].'</td><td><a href="?admin=prequest&request=response">'.$fetch['prequest'].'
		</a></td><td>'.$fetch['reg_date'].'</td><td><button type="submit" name="btn"><i class="fa fa-send"></i>Text</button></td></tr>'; 
	}
	$request .= '</table></div></div></div>
   </section>';

   //sms plugin
   if (isset($_POST['btn'])) {
	require_once('clockwork-php-master/src/Clockwork.php');
	require_once('clockwork-php-master/src/ClockworkException.php');
	   $contact = $this->operate->escape($_POST[$fetch['contact']]);
	   $message = "We are standing with you dear.";
	try{
		$clockwork = new mediaburst\ClockworkSMS\Clockwork('59569840053605b6a671055eaf591916ba50db3f'); //Be careful not to post your API Keys to public repositories.
		$message = array( 'to' =>$contact, 'message' => $message, 'long' => 1, 'from'=>'InspiredToInspire' );
		$result = $clockwork->send( $message );
		$clockwork->checkBalance();
		
		}
		catch(mediaburst\ClockworkSMS\ClockworkException $e){
			print $e->getMessage();	
			}
		}
	
		return $request;
   }

   public function home(){

	$result = $this->operate->retrieve('post_testimony','*','status=?', null,null,['s' , 'Pending']);
	// $fetch = $result->fetch_assoc();

	// $check = $this->operate->retrieve('user','*','uname=?',null,null,['s',$fetch['user']]);
	// $get = $check->fetch_assoc();
	$test ='<section class="boxs" style="width:60%; margin-left:auto; margin-right:auto; margin-top:5em;">
              <div class="boxs-header dvd dvd-btm">
                  <h1 class="custom-font"><strong>Approve Testimony</strong></h1>
              </div>
              <div class="content-box-large">
              <div class="panel-heading">
              <div class="panel-body">
                <table class="table table-condensed"><tr><th>Name</th><th>Date Posted</th><th>Testimony</th><th>Status</th><th>Action</th></tr>';
	while ($fetch = $result->fetch_assoc()) {
		global $id;
		$id= $fetch['id'];
		$test .= '<tr><td>'.$fetch['user'].'</td><td>'.$fetch['reg_date'].'</td><td><a href="?admin=prequest&request=response">'.$fetch['test'].'
		</a></td><td>'.$fetch['status'].'</td><td><form method="post"><button type="submit" name="btn"><i class="glyphicon glyphicon-ok"></i>Approve</button></form></td></tr>'; 
	}
	$test .= '</table></div></div></div>
   </section>';
	$collect = $result->fetch_assoc();
   if (isset($_POST['btn'])) {
	  $update = $this->operate->update('post_testimony',array('status'=>'?'),'id = ?',null,['si', 'active',$id ]);
	  if ($update) {
		  header('Location:index.php');
	  }
   }

   return $test;
  } 	
}
$quest = new Prequest();
?>