<?php
session_start();

require_once ('Operations.php');
class Pray extends Operations
{
private $comment, $reg_date;

    public function __construct(){
        parent:: __construct();
        $this->operate = new Operations();
    }

        public function home(){

            switch($_GET['pray']){
                case 'msg':
                    $sql = $this->operate->retrieve('prayer','*','mediatype=?','id DESC',null,['s','Text']);
                    $fetch = $sql->fetch_assoc();
                    $pray = $fetch['content'];
                    break;
                case 'audio':
                $sql = $this->operate->retrieve('prayer','*','mediatype=?','id DESC',null,['s','audio']);
                $fetch = $sql->fetch_assoc();
                $pray = '<audio style="width:100%; height:100%;" controls = "controls" src = "media/media/'.$fetch['content'].'" type = "video/mp3"></audio>';
            
                    
                    break;
                case 'video':
                    $sql = $this->operate->retrieve('prayer','*','mediatype=?','id DESC',null,['s','Video']);
                    $fetch = $sql->fetch_assoc();
                    $pray = '<video style="width:100%; height:100%;" controls = "controls" src = "media/media/'.$fetch['content'].'" type = "video/mp4"></video>';
                
                    break;
            }       
        $res3 = $this->operate->retrieve('prayer','*',null,'id DESC',null,null);
        $fetch = $res3->fetch_assoc();
        $res1 = $this->operate->retrieve('ratings','*','likes =? AND typeid=? AND type=?',null,null,['sis','1',$fetch['id'],'Prayer']);
        $res2 = $this->operate->retrieve('ratings','*','dislike =? AND typeid=? AND type=?',null,null,['sis','1',$fetch['id'],'Prayer']);

        $res = $this->operate->retrieve('comment','*','type =? AND messageid=?','id DESC',2,['si','Prayer',$fetch['id']]);
        $home='<div class="content-container">
        <h2 class="post-title">Prayer for you</h2>
        <div class="content" style="margin-top:-1.3em;">
            <p>“The prayer you are about to read / hear / watch in here is an inspiration of the Spirit of God at that moment, in that hour and minute and we believe by the time it gets to you, you are the ideal candidate for it. Don’t miss this prayer moment be a part of a group of prayer partners inspired to pray, be strengthened encouraged and achieve tangible results out of it.”</p>
            <h3 style="margin-bottom: -.1em;"><span style="margin-right:3em"><a href="?pray=msg" style="color:#333333;">Message</a></span><span style="margin-right:3em"><a href="?pray=video" style="color:#333333;">Video</a></span><span style="margin-right:3em"><a href="?pray=audio" style="color:#333333;">Audio</a></span><span class="info" style="margin-left:30%;"></span></h3>
            <div class="two-column" style="border:solid;1%; width:auto; height:15em;">'.$pray.'</div>
            <form method="post" action = ""><span style="margin-right:1.5em;">'.$fetch['reg_date'].'</span>
            <span name = "comment" style="width:1.5em;background-color:#fff;"><i class="icon fa fa-comment"></i></span>
            <span style="margin-right:2em">'.$res->num_rows.'</span>
            
            <button name = "like" style="width:1.5em;background-color:#fff;"><i class="icon fa fa-thumbs-up"></i></button>
            <span style="margin-right:2em">'.$res1->num_rows.'</span>
            <button name = "dislike" style="width:1.5em;background-color:#fff;"><i class="icon fa fa-thumbs-down"></i></button>
            <span style="margin-right:24em;">'.$res2->num_rows.'</span>

            Share:
            <a href="#" ><button style="width:2em;border-radius:5px; background-color:#333333;"><i class="fa fa-facebook-f" style="color:#ffff;"></i></button></a>
            <a href="#" ><button style="width:2em;border-radius:5px; background-color:#333333;"><i class="fa fa-twitter" style="color:#ffff;"></i></button></a>
            <a href="#" ><button style="width:2em;border-radius:5px; background-color:#333333;"><i class="fa fa-envelope" style="color:#ffff;"></i></button></a>
            <a href="#" ><button style="width:2em;border-radius:5px; background-color:#333333;"><i class="fa fa-whatsapp" aria-hidden = "true" style="color:#ffff;"></i></button></a></form>
        </div>
    </div>';

    //like start
    if (isset($_POST['like'])) {
        if (!empty($_SESSION['users'])) {
            $reg = date('Y.mm.dd');
            $sql = $this->operate->retrieve('prayer','*',null, 'id DESC', null, null );
            $fetch = $sql->fetch_assoc();

            $insert = $this->operate->insert('ratings',array('likes'=>'?','dislike'=>'?','type'=>'?','reg_date'=>'?','user'=>'?','typeid'=>'?'),['ssssss'
            ,'1','0','Prayer',$reg,$_SESSION['users'],$fetch['id']]);
            if ($insert) {

                header('Location:?info=home');
            }
        }
        else{
             $home .= "Please <a href='?info=account&register=signin'>login here..</a>";
        }
    }
    //end like

    //dislike start
        if (isset($_POST['dislike'])) {
            if (!empty($_SESSION['users'])) {
                $reg = date('Y.mm.dd');
                $sql = $this->operate->retrieve('prayer','*',null, 'id DESC', null, null );
                $fetch = $sql->fetch_assoc();
    
                $insert = $this->operate->insert('ratings',array('likes'=>'?','dislike'=>'?','type'=>'?','reg_date'=>'?','user'=>'?','typeid'=>'?'),['ssssss'
                ,'0','1','Prayer',$reg,$_SESSION['users'],$fetch['id']]);
                if ($insert) {
    
                    header('Location:?info=home');
                }
            }
            else{
                 $home .= "Please <a href='?info=account&register=signin'>login here..</a>";
            }
        }
        //end dislike

    
    $result = $this->operate->retrieve('user','*','uname=?',null,null,['s',$_SESSION['users']]);
    $sql = $result->fetch_assoc();
    
    $collect = $this->operate->retrieve('prayer','*',null,'id DESC',null,null);
    $get = $collect->fetch_assoc();
    
    
    //$fetch = $res->fetch_assoc();
    $home .= ' <!--Comments Container-->
            <div class="comments-container">
                <div class="big-title">'.$res->num_rows.' Comments</div>
                <div class="comments-area">';
    while ($fetch = $res->fetch_assoc()) {
    $home .= '<!--Comment Box-->
            <div class="comment-box">
                <div class="inner-box">
                    <figure class="comment-thumb"><i class = "fa fa-user"></i></figure>
                    <div class="comment-info"><strong>'.$sql['fname'].' '.$sql['lname'].'</strong> <span class="time">'.$fetch['reg_date'].'</span></div>
                    <div class="text">'.$fetch['comment'].'</div>
                    <!--<span class="reply-btn">Reply 3[replies]</span>-->
                </div>
            </div> 
            <!--Comment Box-
            <div class="comment-box">
                <div class="inner-box">
                    <figure class="comment-thumb"><i class = "fa fa-user"></i></figure>
                    <div class="comment-info"><strong>'.$sql['fname'].' '.$sql['lname'].'</strong> <span class="time">2 hours ago</span></div>
                    <div class="text">'.$fetch['comment'].'</div>
                    <a href="#" class="reply-btn">Reply 3[replies]</a>
                </div>
            </div>-->'; 
    }
    $home .= '</div>';
    $home .= ' <div class="big-title">Post Your Comment</div>
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
            ['sssss', $this->comment, 'Prayer', $this->reg_date, $_SESSION['users'], $get['id']]);

            if ($insert) {
                header('Location:?info=home');
            }
        }
        else{
    $home .= 'Please <a href="?info=account&register=signin">login here.. </a>to comment.';

    }
}
    
$res = $this->operate->retrieve('message','*','type = ?','id DESC',null,['s','Prayer Message']);
                    $fetch = $res->fetch_assoc();
                    $id = $fetch['id'];
    $home .= '<div class="content-container"><h2 class="post-title">Prayer Message</h2>
            <div class="info"></div>
            <div class="content" style="margin-top:-1.5em;">
                <p>Many people claim they do prayer, some say we pray but looks as if there are no results from my prayer well, while in here we share with your biblical inspirations about prayer, there are a lot of mysteries about prayer and a few have discovered them. Enjoy the message about prayer here in: -</p>
                <div class="two-column" style="border:solid;1%; width:auto; height:10em;">'.$fetch['message'].'
                </div>
                <h3>Did you learn anything out of this message share with us? </h3>
                <div class="form-column col-md-12 col-sm-12 col-xs-12">
                        <!--Contact Form-->
                        <div class="default-form contact-form">
                            <form method="post" action="#" id="contact-form">
                                <div class="row clearfix">
                                    
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="tel" name="tel" value="" placeholder="Contact" required>
                                    </div>
                                      
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <textarea name="message" placeholder="Message" required></textarea>
                                    </div>
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="text-center"><button type="submit" name = "btn" class="theme-btn btn-style-one" style="background-color:#333333;">Send now!</button></div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div></div>
                         </div>
                     </div>';

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
		 $home .= header('Location:?info=home');
	}
		}
	}
	}else{
		 $home .= "Please <a href='?info=account&register=signin'>login here..</a>";
	}



        return $home;
    }

    
    
}

$display = new Pray();

?>