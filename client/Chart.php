<?php

session_start();
require_once ('Operations.php');
class Chart extends Operations
{
    private $message,$des;
    public function __construct(){
        parent:: __construct();
        $this->operate = new Operations();
    }
    public function chat(){
        $chat = '<figure class="main-image"><img src="images/main-slider/2.jpg" alt="" style="height:15em;"></figure>
            
            <div class="content-container">
                <h2 class="post-title">Join The Chart Platform Today</h2>
                
                <div class="content">
                    <p>Information flows fast don’t miss to join the kingdom chart platform and be one of them, we 
                    give you a chance to share your mind with different friends open an account with us today and enjoy the chart platform.</p>
                <p><h3>Share your message here.</h3></p></div></div>
                
                <div class="reply-form" style="border-style:solid;border-radius:5px;border-width:thin;background-color:light cream; margin-bottom:1em; ">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row clearfix">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <input type="file" class="form-control-file" name="file">
                        </div>
                        <div class = "form-group co-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <textarea name="describe" placeholder="Photo Description.. " required></textarea>
                        </div>
                         <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <textarea name="message" placeholder="Your Message.. " style="border-style:thin;" required></textarea>
                        </div>
                            
                            <div class="form-group col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                <button type="submit" name = "btn" class="theme-btn btn-style-two">Post Now &ensp; <span class="fa fa-angle-right"></span></button>
                            </div>
                        </div>
                    </form>
                </div>';

  if (isset($_POST['btn'])) {
        $this->message = $this->operate->escape($_POST['message']);
        $this->des = $this->operate->escape($_POST['describe']);
        $reg_date = date('Y.m.d');

        //$folder = "media/image/";
        $name = $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], 'media/image/'.$name);

       if (!empty($_SESSION['users'])) {
        $res = $this->operate->retrieve('user','*', 'uname = ?', null, null, ['s', $_SESSION['users']]);
        $rt = $res->fetch_assoc();
          if ($res->num_rows > 0) {
          $insert = $this->operate->insert('chat',array('message'=>'?','image'=>'?','description'=>'?','reg_date'=>'?','user'=>'?'),
          ['sssss', $this->message, $name, $this->des, $reg_date, $rt['uname']]);
          if ($insert) {
               header('Location:?info=chart');
           }
            //$chat .= $this->message. ",". $name ."," .$this->des. "," .$reg_date;
       }
    }  
       else{
         $chat .= "Please <a href='?info=account&register=signin'>login here..</a>";
       }
    }
// comment started from here

//counter
$res = $this->operate->retrieve('chat','*',null,'id DESC',null,null);
$fetch = $res->fetch_assoc();
    $sql = $this->operate->retrieve('ratings','*','type=? AND likes=? AND typeid=? AND type=?', 'id DESC', null, ['ssis','Chat','1',$fetch['id'],'Chat'] );
    $sqld = $this->operate->retrieve('ratings','*','type=? AND dislike=? AND typeid=? AND type=?', 'id DESC', null, ['ssis','Chat','1',$fetch['id'],'Chat'] );

    $receive = $this->operate->retrieve('comment','*','type = ? AND messageid=?','id DESC',2,['si', 'Chat',$fetch['id']]);
    // $test .= '<div class="bevel all" style="height:10em;"><h3 style="text-align:center;font-weight:bold;">Testimony Transforms</h3>';

    if (!empty($fetch['image'])){
                  
        $chat .= '<div class="row clearfix"><div class="panel-body">
          <div class="table-responsive"><table class = "table" style=" margin-top:2em;"><tr><td>
            <div class="image-column col-md-12 col-sm-12 col-xs-12" style=""><figure class="image-box"><img 
            src="media/image/'.$fetch['image'].'" alt="" style="width:250px;height:200px;"></figure></td><td>
            <div style="background-color:#EEE8AA; width:550px; height:150px; margin-top:0em; border-radius:5px 5px 5px 5px;">'.$fetch['description'].'</div>
            </div></td></tr></table></div></div>
        </div>';
    }
    else {
        $chat .= '<div class="row clearfix"><div class="panel-body"><div style="border-style:solid;border-width:thin">
          <div class="table-responsive"><table class = "table" style=" margin-top:2em;"><tr><td>
            <div class="image-column col-md-12 col-sm-12 col-xs-12" style=""><figure class="image-box"><img 
            src="images/jk.jpg" alt="" style="width:250px;height:200px;"></figure></div></td><td>
            <div style="background-color:#EEE8AA; width:550px; height:150px; margin-top:0em; border-radius:5px 5px 5px 5px;">Description of the activity or blessing(s)!</div></td></tr></table></div>';
    }

    
    

    $chat .= $fetch['message'].'
    <form method="post" ><span style="margin-right:1.5em;">'.$fetch['reg_date'].'</span>
    <span name = "comment" style="width:1.5em;background-color:#fff;"><i class="icon fa fa-comment"></i></span>
    <span style="margin-right:2em">'.$receive->num_rows.'</span>

    <button name = "like" style="width:1.5em;background-color:#fff;"><i class="icon fa fa-thumbs-up"></i></button>
    <span style="margin-right:2em">'.$sql->num_rows.'</span>
    <button name = "dislike" style="width:1.5em;background-color:#fff;"><i class="icon fa fa-thumbs-down"></i></button>
    <span style="margin-right:19em;">'.$sqld->num_rows.'</span>

    Share:
    <a href="#" ><button style="width:2em;border-radius:5px; background-color:#333333;"><i class="fa fa-facebook-f" style="color:#ffff;"></i></button></a>
    <a href="#" ><button style="width:2em;border-radius:5px; background-color:#333333;"><i class="fa fa-twitter" style="color:#ffff;"></i></button></a>
    <a href="#" ><button style="width:2em;border-radius:5px; background-color:#333333;"><i class="fa fa-envelope" style="color:#ffff;"></i></button>
    </a>
     <a href="#" ><button style="width:2em;border-radius:5px; background-color:#333333;"><i class="fa fa-whatsapp" aria-hidden = "true" 
     style="color:#ffff;"></i></button></a></form>
    ';

    //like start
 if (isset($_POST['like'])) {
    if (!empty($_SESSION['users'])) {
        $reg = date('Y.mm.dd');
        $sql = $this->operate->retrieve('chat','*',null, 'id DESC', null, null);
        $fetch = $sql->fetch_assoc();

        $insert = $this->operate->insert('ratings',array('likes'=>'?','dislike'=>'?','type'=>'?','reg_date'=>'?','user'=>'?','typeid'=>'?'),['ssssss'
        ,'1','0','Chat',$reg,$_SESSION['users'],$fetch['id']]);
        if ($insert) {

            header('Location:?info=chart');
        }
    }
    else{
         $chat .= "Please <a href='?info=account&register=signin'>login here..</a>";
    }
}
//end like

//dislike start
if (isset($_POST['dislike'])) {
        if (!empty($_SESSION['users'])) {
            $reg = date('Y.mm.dd');
            $sql = $this->operate->retrieve('chat','*',null, 'id DESC', null, null );
            $fetch = $sql->fetch_assoc();

            $insert = $this->operate->insert('ratings',array('likes'=>'?','dislike'=>'?','type'=>'?','reg_date'=>'?','user'=>'?','typeid'=>'?'),['ssssss'
            ,'0','1','Chat',$reg,$_SESSION['users'],$fetch['id']]);
            if ($insert) {

                header('Location:?info=chart');
            }
        }
        else{
             $chat .= "Please <a href='?info=account&register=signin'>login here..</a>";
        }
    }
    //end dislike


    $result = $this->operate->retrieve('user','*','uname = ?',null,null,['s',$_SESSION['users']]);
    $sql = $result->fetch_assoc();
    
    $collect = $this->operate->retrieve('chat','*',null,'id DESC',null,null);
    $get = $collect->fetch_assoc();
    
    
    //replies starts from here

    $chat .= ' <!--Comments Container-->
            <div class="comments-container">
                <div class="big-title">'.$receive->num_rows.' Comments</div>
                <div class="comments-area">';

  
    while ($resource = $receive->fetch_assoc()){
    $_GET['id'] = $resource['id'];  
    $f = $this->operate->retrieve('reply','*','commentid = ?', 'id DESC', 2, ['i',$resource['id']]);
    $pick =$this->operate->retrieve('user','*','uname = ?', null, null, ['s',$resource['user']]);
    $sqli = $pick->fetch_assoc();

    $push = $f->fetch_assoc();
    $chat .= '<!--Comment Box-->
            <div class="comment-box">
                <div class="inner-box">
                    <figure class="comment-thumb"><i class = "fa fa-user"></i></figure>
                    <div class="comment-info"><strong>'.$sqli['fname'].' '.$sqli['lname'].'</strong> <span class="time">'.$resource['reg_date'].'</span></div>
                    <div class="text">'.$resource['comment'].'</div>
                    <div class="reply-btn" id="reply-btn">Reply '.$f->num_rows.'[replies]</div>
                </div>

                 <div class="comment-box reply-comment">
                        <div class="inner-box">
                             <figure class="comment-thumb"><i class = "fa fa-user"></i></figure>
                            <div class="comment-info"><strong>'.$push['user'].'</strong> <span class="time">'.$push['reg_date'].'</span></div>
                             <div class="text">'.$push['reply'].'</div>
                      
                    <div class="reply-form" id="reply-form" style="border-style:solid;border-width:thin; background-color:light cream; margin-bottom:1em;">
                        <form method="post" action="">
                            <div class="row clearfix">
                             <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <textarea name="message" placeholder="Your Reply.. " style="border-style:thin;" required></textarea>
                            </div>
                                
                                <div class="form-group col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                    <button type="submit" name = "btn3" class="theme-btn btn-style-two">Reply Now &ensp; <span class="fa fa-angle-right"></span></button>
                                </div>
                            </div>
                        </form>
                    </div> </div>
                  </div>';

          
    }
     if (isset($_POST['btn3'])) {
       if (!empty($_SESSION['users'])) {
         $reply = $this->operate->escape(htmlspecialchars($_POST['message']));
         $now = date('Y.m.d');

         $gt = $this->retrieve('user','*','uname=?',null,null,['s',$_SESSION['users']]);
         $pull = $gt->fetch_assoc();

        if ($gt->num_rows > 0) {
           $insert = $this->operate->insert('reply',array('commentid'=>'?','user'=>'?','reply'=>'?','reg_date'=>'?'),
            ['isss', $_GET['id'], $pull['uname'], $reply, $now]);
         if ($insert) {
           header('Location:?info=chart');
         }
          //$chat .= $reply .",". $_GET['id'] .",". $pull['uname'];
        }
        
         }else{
          $chat .='Please <a href="?info=account&register=signin">Login here...</a> to reply a comment!';
         }
       }

    $chat .= '</div></div>';
    $chat .= ' <div class="big-title">Post Your Comment</div>
        <!--Reply Form-->
        <div class="reply-form">
            
            <form method="post" action="#">
                <div class="row clearfix">
                 <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <textarea name="message" placeholder="Your Message.. " required></textarea>
                    </div>
                    
                    <div class="form-group col-lg-12 col-md-6 col-sm-12 col-xs-12">
                        <div class="text-right"><button type="submit" name = "cbtn" class="theme-btn btn-style-two">Post Now &ensp; <span class="fa fa-angle-right"></span></button></div>
                    </div>
                </div>
                
            </form>
        </div>';

        if(isset($_POST['cbtn'])){
            if (!empty($_SESSION['users'])) {
            $this->comment = $this->operate->escape($_POST['message']);
            $this->reg_date = $this->operate->escape(date('Y.m.d'));

            $insert = $this->operate->insert('comment', array('comment'=>'?','type'=>'?','reg_date'=>'?','user'=>'?','messageid'=>'?'), 
            ['sssss', $this->comment, 'Chat', $this->reg_date, $_SESSION['users'], $get['id']]);

            if ($insert) {
                header('Location:?info=chart');
            }
        }else{
    $chat .= 'Please <a href="?info=account&register=signin">login here..</a> to comment.';
    }

}

return $chat;
  }
}

$chart = new Chart();

?>