<?php

/**
 * 
 */
// session_start();

include_once("../client/Operations.php");
class Message extends Operations
{
  private $type, $message, $reg_date;
  
	public function __construct()
	{
		parent:: __construct();
		$this->operate = new Operations();
	}

  function set_type($new_type){
      $this->type = $new_type;
    }
  function get_type(){
      return $this->type;
    }

	function set_message($new_message){
      $this->message = $new_message;
    }
  function get_message(){
      return $this->message;
    }
  function set_reg_date($new_reg_date){

      $this->reg_date = $new_reg_date;
    }
  function get_reg_date(){
      return $this->reg_date;
    }

public function messageAdmin(){
	$msg = '<section class="boxs" style="width:60%; margin-left:auto; margin-right:auto; margin-top:5em;">
              <div class="boxs-header dvd dvd-btm">
                  <h1 class="custom-font"><strong>Message </strong></h1>
              </div>
              <div class="boxs-body">
                  <form class="form-horizontal" role="form" method="post" >
                      
                    <div class="form-group">
                          <div class="col-sm-10">
                              <select name="type" id="mtype" class="form-control mb-10" data-parsley-trigger="change" required>
                                  <option value="">Select message type...</option>
                                  <option value="Quotes">Quotes</option>
                                  <option value="inspiration message">inspirational message</option>
                                  <option value="Prayer Message">Prayer Message</option>
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                         <div class="col-sm-10">
                              <textarea class="form-control" id="mtext" name="message" cols = "8" placeholder="To&minus;day\'s Message ..." required></textarea>
                          </div>
                      </div>
 
                      <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                           <button type="submit" name="submit" class="btn btn-raised btn-primary">Message</button>
                          </div>
                      </div>
                     
                  </form>
              </div>
          </section>';
          // .	$this->set_message($this->operate->escape(htmlspecialchars($_POST['message'])));
    

    if (isset($_POST['submit'])) {
	  $this->set_type($this->operate->escape($_POST['type']));
		$this->set_message($this->operate->escape($_POST['message']));
		$this->set_reg_date(date('Y.m.d'));

    // $msg .= $this->get_type() .",". $this->get_message() .",". date('Y.m.d');
		$insert = $this->operate->insert('message',array('type'=>'?','message'=>'?','reg_date'=>'?'),['sss',$this->get_type(), $this->get_message(), $this->get_reg_date()]);
		if ($insert) {
			header('Location:?admin=message');
		}
    else{
			$msg .= mysql_error();
		}
	}
  return $msg;
	}

}

$message = new Message();
?>