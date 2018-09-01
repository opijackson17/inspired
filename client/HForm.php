<?php

/**
* 
*/
session_start();
require_once ('Operations.php');
class HForm extends Operations
{
	
function __construct()
{
	parent:: __construct();
	$this->operate = new Operations(); 
}

public function pMessage(){

$w = $this->operate->escape($_POST['btn']);
$x = $this->operate->escape($_SESSION['users']);
$y = $this->operate->escape($_POST['tel']);
$z = $this->operate->escape($_POST['message']);
$reg = date('Y.mm.dd');
if (!empty($_SESSION['users'])) {

$res = $this->operate->retrieve('user','uname', 'uname = ?', null, null, ['s', $x]);
if ($res->num_rows > 0) {

if (isset($w)) {
	$insert = $this->operate->insert('pmessage',array('user'=>'?','contact'=>'?','message'=>'?','pmessageid'=>'?','reg_date'=>'?'), ['sssis',$x,$y,$z,$id,$reg]);
	if ($insert) {
		return $msg = header('Location:?info=home');
	}
		}
	}
	}else{
		return $msg = "Please <a href='?info=account&register=signin'>login here..</a>";
	}
}

public function contactForm(){

	$w = $this->operate->escape($_POST['mail']);
	$y = $this->operate->escape($_POST['fullname']);
	$x = $this->operate->escape($_POST['email']);
	$p = $this->operate->escape($_POST['subject']);
	$z = $this->operate->escape($_POST['message']);
	$reg = date('Y.m.d');
	if (isset($w)) {
		$insert = $this->operate->insert('contactForm',array('name'=>'?','email'=>'?','subject'=>'?','details'=>'?','reg_date'=>'?'), 
		['sssss',$y,$x,$p,$z,$reg]);
		if ($insert) {
			return $msg = header('Location:?info=home');
			}
		}	
	}

public function chart(){
$w = $this->operate->escape($_POST['btn']);
$x = $this->operate->escape($_SESSION['users']);
$y = $this->operate->escape($_POST['message']);
$z = $this->operate->escape($_POST['describe']);
$image = $_FILES["file"]["name"]; 
$reg = date('Y.m.d');
$id ='';

if (!empty($_SESSION['users'])) {

	$folder = "media/image/".$image;
    move_uploaded_file($_FILES[" file "]["tmp_name"],$folder);

	$res = $this->operate->retrieve('user','uname', 'uname = ?', null, null, ['s', $x]);
	if ($res->num_rows > 0) {
	if (isset($w)) {
	$insert = $this->operate->insert('chart', array('id'=>'?','chat'=>'?','describe'=>'?','reg_date'=>'?','user'=>'?'), 
	['isssss',$id,$y,$z,$reg,$x]);
	if ($insert) {
		return $msg = header('Location:?info=chart');
	}
		}
	}
}
else{
	return $msg = "Please <a href='?info=account&register=signin'>login here..</a>";
}

	

	}
}

$action = new HForm();

?>