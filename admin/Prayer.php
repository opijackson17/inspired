<?php
/**
 * 
 */
include_once("../client/Operations.php");
class Prayer extends Operations
{
	private $name, $txt, $type, $reg_date;
	function __construct()
	{
		parent:: __construct();
		$this->operate = new Operations();

    }

public function adminPrayer(){
	$pray = '
		  	<section class="boxs" style="width:60%; margin-left:auto; margin-right:auto; margin-top:5em;">
              <div class="boxs-header dvd dvd-btm">
                  <h1 class="custom-font"><strong>Prayer </strong></h1>
              </div>
              <div class="boxs-body">
                  <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                      
                    <div class="form-group">
                          <div class="col-sm-10">
                              <select name="mtype" id="mtype" class="form-control mb-10" data-parsley-trigger="change" onchange="hid();" required/>
                                  <option value="">Select media type...</option>
                                  <option value="Text">Text</option>
                                  <option value="Audio">Audio</option>
                                  <option value="Video">Video</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                         <div class="col-sm-10">
                              <textarea class="form-control" id="txt" name="txt" cols = "8" placeholder="Type prayer here..." required></textarea>
                          </div>
                      </div>
                      <div class="" id = "filem">
                         <div class="col-sm-10">
                         <input type="file" name ="file" class="form-control-file"/>
                          </div><label class="col-md-4" style="margin-left:-25em">Media input e.g. Audio and Video</label>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                           <button type="submit" name="prayer" class="btn btn-raised btn-primary">Prayer</button>
                          </div>
                      </div>
                     
                  </form>
              </div>
          </section>';

if (isset($_POST['prayer'])) {
$this->name = $_FILES['file']['name'];
$this->txt = $this->operate->escape($_POST['txt']);
$this->type = $this->operate->escape($_POST['mtype']);
$this->reg_date = date('Y.m.d');

    
    if (!empty($this->name)) {
       // $name = $_FILES['file']['name'];
        $extension = explode('.', $this->name);
        if ($extension[1] == 'mp3' || $extension[1] == 'MP3' || $extension[1] == 'mp4' || $extension[1] == 'mp4' ||
         $extension[1] == 'avi' || $extension[1] =='AVI') {
        move_uploaded_file($_FILES["file"]["tmp_name"], '../client/media/media/'.$this->name);
        // $pray .= $this->name;
        $insert = $this->operate->insert('prayer',array('mediatype'=>'?','content'=>'?','reg_date'=>'?'),['sss',$this->type, $this->name, $this->reg_date]);
        if ($insert) {
        header('Location:?admin=prayer');
            } 
        }else{
            $pray .="Check that upload is media only";
        }
    }
    elseif(!empty($this->txt)){
        $insert = $this->operate->insert('prayer',array('mediatype'=>'?','content'=>'?','reg_date'=>'?'),['sss',$this->type, $this->txt, $this->reg_date]); 
        if ($insert) {
                header('Location:?admin=prayer');
            }

    }
    else{

    }

}

	return $pray;
  }



}


$prayer = new Prayer();


?>