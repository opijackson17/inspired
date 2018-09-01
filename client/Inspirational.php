<?php
session_start();
require_once ('Operations.php');
class Inspirational extends Operations
{
private $comment, $reg_date;

    public function __construct(){
        parent:: __construct();
        $this->operate = new Operations();
    }
public function iRequest(){
        $res = $this->operate->retrieve('message','*','type = ?','id DESC',null,['s','inspiration message']);
$fetch = $res->fetch_assoc();
$req = '<div class="content-container" style="margin-bottom:5em;"><h2 class="post-title">Inspirational Message</h2>
<div class="row clearfix">
<div class="image-column col-md-7 col-sm-12 col-xs-12" style="margin-bottom:.2em;"><figure class="image-box"><img src="images/resource/res-1.jpg" style="width:250%;" alt=""></figure>
</div></div>
<div class="content" style="margin-top:-.5">
<p>Every day in life you find yourself in need of a word to keep you going, we wish to answer that by giving you a massage (article) expounded from the word of God (the bible) flashing a clear light into day today experiences that touch the spiritual, social, economic and political aspect of life. This word therefore is for all of us irrespective of our differences we areunited by one belief that God is Lord of all. These rich teachings, revelations, and illustrations are guaranteed to empower our walk with God.</p>
<div class="holder">
    <div class="main">'.$fetch['message']    
    .'</div>
    <div class="corner">   
    </div>
</div>'; 
// $res = $this->operate->retrieve('message','*','type = ?','id DESC',null,['s','inspiration message']);
// $fetch = $res->fetch_assoc();

$res = $this->operate->retrieve('comment','*','type = ? AND messageid=?','id DESC',2,['si','inspiration message',$fetch['id']]);

$sql = $this->operate->retrieve('ratings','*','type=? AND likes=? AND typeid=?', 'id DESC', null, ['ssi','inspiration message','1',$fetch['id']] );
$sqld = $this->operate->retrieve('ratings','*','type=? AND dislike=? AND typeid=?', 'id DESC', null, ['ssi','inspiration message','1',$fetch['id']] );

$req .='<form method="post" style="margin-top:15em;"><span style="margin-right:1.5em;">'.$fetch['reg_date'].'</span>
<span name = "comment" style="width:1.5em;background-color:#fff;"><i class="icon fa fa-comment"></i></span>
<span style="margin-right:2em">'.$res->num_rows.'</span>

<button name = "like" style="width:1.5em;background-color:#fff;"><i class="icon fa fa-thumbs-up"></i></button>
<span style="margin-right:2em">'.$sql->num_rows.'</span>
<button name = "dislike" style="width:1.5em;background-color:#fff;"><i class="icon fa fa-thumbs-down"></i></button>
<span style="margin-right:25em;">'.$sqld->num_rows.'</span>

Share:
<a href="#" ><button style="width:2em;border-radius:5px; background-color:#333333;"><i class="fa fa-facebook-f" style="color:#ffff;"></i></button></a>
<a href="#" ><button style="width:2em;border-radius:5px; background-color:#333333;"><i class="fa fa-twitter" style="color:#ffff;"></i></button></a>
<a href="#" ><button style="width:2em;border-radius:5px; background-color:#333333;"><i class="fa fa-envelope" style="color:#ffff;"></i></button></a>
<a href="#" ><button style="width:2em;border-radius:5px; background-color:#333333;"><i class="fa fa-whatsapp" aria-hidden = "true" 
style="color:#ffff;"></i></button></a>
<form>
</div>';

 //like start
 if (isset($_POST['like'])) {
    if (!empty($_SESSION['users'])) {
        $reg = date('Y.mm.dd');
        $sql = $this->operate->retrieve('message','*','type=?', 'id DESC', null, ['s','inspiration message'] );
        $fetch = $sql->fetch_assoc();

        $insert = $this->operate->insert('ratings',array('likes'=>'?','dislike'=>'?','type'=>'?','reg_date'=>'?','user'=>'?','typeid'=>'?'),
        ['ssssss','1','0','inspiration message',$reg,$_SESSION['users'],$fetch['id']]);
        if ($insert) {

            header('Location:?info=inspired&message=inspire');
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
            $sql = $this->operate->retrieve('message','*','type=?', 'id DESC', null, ['s','inspiration message'] );
            $fetch = $sql->fetch_assoc();

            $insert = $this->operate->insert('ratings',array('likes'=>'?','dislike'=>'?','type'=>'?','reg_date'=>'?','user'=>'?','typeid'=>'?'),
            ['ssssss','0','1','inspiration message',$reg,$_SESSION['users'],$fetch['id']]);
            if ($insert) {

                header('Location:?info=inspired&message=inspire');
            }
        }
        else{
             $home .= "Please <a href='?info=account&register=signin'>login here..</a>";
        }
    }
    //end dislike

    $result = $this->operate->retrieve('user','*','uname=?',null,null,['s',$_SESSION['users']]);
    $sql = $result->fetch_assoc();

    $collect = $this->operate->retrieve('message','*','type = ?','id DESC',null,['s','inspiration message']);
    $get = $collect->fetch_assoc();
    
    
    //$fetch = $res->fetch_assoc();
    $req .= ' <!--Comments Container-->
            <div class="comments-container">
                <div class="big-title">'.$res->num_rows.' Comments</div>
                <div class="comments-area">';
    while ($fetch = $res->fetch_assoc()) {
    $req .= '<!--Comment Box-->
            <div class="comment-box">
                <div class="inner-box">
                    <figure class="comment-thumb"><i class = "fa fa-user"></i></figure>
                    <div class="comment-info"><strong>'.$sql['fname'].' '.$sql['lname'].'</strong> <span class="time">'.$fetch['reg_date'].'</span></div>
                    <div class="text">'.$fetch['comment'].'</div>
                   
                </div>
            </div>';
    }
    $req .= '</div>';
    $req .= ' <div class="big-title">Post Your Comment</div>
        <!--Reply Form-->
        <div class="reply-form">
            
            <form method="post" action="#">
                <div class="row clearfix">
                 <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <textarea name="message" placeholder="Your Message.. " ></textarea>
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

            $insert = $this->operate->insert('comment', array('comment'=>'?','type'=>'?','reg_date'=>'?','user'=>'?','messageid'=>'?'),['sssss', $this->comment, $get['type'], $this->reg_date, $_SESSION['users'], $get['id']]);

            if ($insert) {
                header('Location:?info=inspired&message=inspire');
            }
        }else{
    $req .= 'Please <a href="?info=account&register=signin">login here..</a> to comment.';
}

}
return $req;
    }
    
}

$inspire = new Inspirational();

/**
* 
*/
class Testimony extends Operations
{
private $message, $comment, $reg_date;

public function __construct(){
    parent:: __construct();
    $this->operate = new Operations();
}
    
public function getTest(){
    $test = '<div class="form-column col-md-12 col-sm-12 col-xs-12">
        <h3><span class="">Testimony</span> Form:</h3>
        <div class="default-form contact-form">
            <form method="post" id="contact-form">
                <div class="row clearfix">
                      
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <textarea name="message" placeholder="Leave your Testimony in here." required></textarea>
                    </div>
                    
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <div class="text-center"><button type="submit" name = "btn" class="theme-btn btn-style-one">Send now!</button></div>
                    </div>
                    
                </div>
            </form>
        </div>';   

        if (isset($_POST['btn'])) {
        $this->message = $this->operate->escape($_POST['message']);
        $reg_date = date('Y.mm.dd');
        $status = "pending";

       if (!empty($_SESSION['users'])) {
        $res = $this->operate->retrieve('user','uname', 'uname = ?', null, null, ['s', $_SESSION['users']]);
            if ($res->num_rows > 0) {
           $insert = $this->operate->insert('post_testimony',array('user'=>'?','test'=>'?','reg_date'=>'?','status'=>'?'),['ssss',$_SESSION['users'],
            $this->message,$reg_date,$status]);
           if ($insert) {
               header('Location:?info=inspired&message=test');
           }
       }
    }  
       else{
         $test .= "Please <a href='?info=account&register=signin'>login here..</a>";
       }
    }
// comment started from here

//counter
    $res = $this->operate->retrieve('post_testimony','*','status = ?','id DESC',null,['s','active']);
    $fetch = $res->fetch_assoc();
    $sql = $this->operate->retrieve('ratings','*','type=? AND likes=? AND typeid=?', 'id DESC', null, ['ssi','Testimony','1',$fetch['id']] );
    $sqld = $this->operate->retrieve('ratings','*','type=? AND dislike=? AND typeid=?', 'id DESC', null, ['ssi','Testimony','1',$fetch['id']] );

    $receive = $this->operate->retrieve('comment','*','type = ? AND messageid=?','id DESC',2,['si', 'Testimony',$fetch['id']]);
    $test .= '<div class="bevel all" style="height:10em;"><h3 style="text-align:center;font-weight:bold;">Testimony Transforms</h3>';

    $test .= $fetch['test'].'</div></div>
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
        $sql = $this->operate->retrieve('post_testimony','*','status=?', 'id DESC', null, ['s','active'] );
        $fetch = $sql->fetch_assoc();

        $insert = $this->operate->insert('ratings',array('likes'=>'?','dislike'=>'?','type'=>'?','reg_date'=>'?','user'=>'?','typeid'=>'?'),['ssssss'
        ,'1','0','Testimony',$reg,$_SESSION['users'],$fetch['id']]);
        if ($insert) {

            header('Location:?info=inspired&message=test');
        }
    }
    else{
         $test .= "Please <a href='?info=account&register=signin'>login here..</a>";
    }
}
//end like

//dislike start
if (isset($_POST['dislike'])) {
        if (!empty($_SESSION['users'])) {
            $reg = date('Y.mm.dd');
            $sql = $this->operate->retrieve('post_testimony','*','status=?', 'id DESC', null, ['s','active'] );
            $fetch = $sql->fetch_assoc();

            $insert = $this->operate->insert('ratings',array('likes'=>'?','dislike'=>'?','type'=>'?','reg_date'=>'?','user'=>'?','typeid'=>'?'),['ssssss'
            ,'0','1','Testimony',$reg,$_SESSION['users'],$fetch['id']]);
            if ($insert) {

                header('Location:?info=inspired&message=test');
            }
        }
        else{
             $test .= "Please <a href='?info=account&register=signin'>login here..</a>";
        }
    }
    //end dislike


    $result = $this->operate->retrieve('user','*','uname = ?',null,null,['s',$_SESSION['users']]);
    $sql = $result->fetch_assoc();
    
    $collect = $this->operate->retrieve('post_testimony','*','status = ?','id DESC',null,['s', 'active']);
    $get = $collect->fetch_assoc();
    
    
    //$resource = $receive->fetch_assoc();

    $test .= ' <!--Comments Container-->
            <div class="comments-container">
                <div class="big-title">'.$receive->num_rows.' Comments</div>
                <div class="comments-area">';
    while ($resource = $receive->fetch_assoc()){
    $test .= '<!--Comment Box-->
            <div class="comment-box">
                <div class="inner-box">
                    <figure class="comment-thumb"><i class = "fa fa-user"></i></figure>
                    <div class="comment-info"><strong>'.$sql['fname'].' '.$sql['lname'].'</strong> <span class="time">'.$resource['reg_date'].'</span></div>
                    <div class="text">'.$resource['comment'].'</div>
                    <!--<span class="reply-btn">Reply 3[replies]</span>-->
                </div>
            </div> <!--Comment Box
            <div class="comment-box">
                <div class="inner-box">
                    <figure class="comment-thumb"><i class = "fa fa-user"></i></figure>
                    <div class="comment-info"><strong>'.$sql['fname'].' '.$sql['lname'].'</strong> <span class="time">'.$resource['reg_date'].'</span></div>
                    <div class="text">'.$resource['comment'].'</div>
                    <a href="#" class="reply-btn">Reply 3[replies]</a>
                </div>
            </div>-->'; 
    }
    $test .= '</div>';
    $test .= ' <div class="big-title">Post Your Comment</div>
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
            ['sssss', $this->comment, 'Testimony', $this->reg_date, $_SESSION['users'], $get['id']]);

            if ($insert) {
                header('Location:?info=inspired&message=test');
            }
        }else{
    $test .= 'Please <a href="?info=account&register=signin">login here..</a> to comment.';
    }

}
    

    return $test;
    }
}

$test = new Testimony();

?>