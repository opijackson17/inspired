<?php
ob_start();
session_start();

require_once ("Operations.php");
class Account extends Operations
{

    private $fname, $lname, $uname, $password, $address, $description, $dob, $religion;


    public function __construct(){
        parent::__construct();
        $this->operate = new Operations();
    }
    public function register(){
        $reg ='<h3 style="margin-left:.6em;">Register Here..</h3>
        <div class="form-column col-md-12 col-sm-12 col-xs-12">
                <!--Contact Form-->
                <div class="default-form contact-form">
                    <form method="POST" action="#" id="contact-form">
                        <div class="row clearfix">
                                
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="fname" placeholder="First-name" required>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="lname"  placeholder="Last-name" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="username" placeholder="User-name" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="date" name="dob" placeholder="Date of Birth" required>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="address" placeholder="Address" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="religion" placeholder="Religion/Faith" required>
                            </div>
                              
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <textarea name="decription" placeholder="Brief Description" required></textarea>
                            </div>
                            
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-center"><button name = "signup" type="submit" class="theme-btn btn-style-one" style="background-color:#333333;">Finish</button></div>
                            </div>
                            
                        </div>
                    </form>
                </div>
                
                <div style="margin-top:3em;margin-bottom:3em; background-color:#3333333;"><h4><span>Already has an account !</span></h4><a href="?info=account&register=signin">Login here..</a></div
                <h3 style="font-weight:bold;">Terms and Conditions</h3>
                <div style="font-weight:bold;font-family:times new roman">
                <i>This web-site is designed to allow Christian friends interact, respect the rules, Administrator has a right 
                to disable you the moment we observe anything contrary to our reason of creating the site.</i> 
                </div>
                '
                ;
                
                if (isset($_POST['signup'])) {
                   //$id = ''; 
                   $this->fname = $this->operate->escape($_POST['fname']);
                   $this->lname = $this->operate->escape($_POST['lname']);
                   $this->uname = $this->operate->escape($_POST['username']);
                   $this->password = $this->operate->escape(md5($_POST['password']));
                   $this->dob = $this->operate->escape($_POST['dob']);
                   $this->address = $this->operate->escape($_POST['address']);
                   $this->religion = $this->operate->escape($_POST['religion']);
                   $this->description = $this->operate->escape($_POST['decription']);
                   $reg_date = date("Y.mm.dd");
                   
                   $insert = $this->operate->insert('user',array('fname'=>'?','lname'=>'?','uname'=>'?','password'=>'?','dob'=>'?','address'=>'?','faith'=>'?','description'=>'?','reg_date'=>'?'),
                   ['sssssssss', $this->fname, $this->lname, $this->uname, $this->password, $this->dob, $this->address, $this->religion, $this->description, $reg_date]);

                   if ($insert) {
                    //$res = $this->operate->retrieve('user','*','uname=?',null,null, ['s',$this->uname]);
                    $res=$this->operate->retrieve('user','*','uname = ? AND password = ?',null,null,['ss',$this->uname,$this->password]);
                    if ($res->num_rows > 0) {
                    $fetch = $res->fetch_assoc();    
                    $_SESSION['users'] = $fetch['uname'];
                    header('Location:index.php');
                    //$reg = 'session started'.$_SESSION['users'];
                    }
                    
                   }
                   else{
                    $reg .= mysqli_error();
                   }
                }
            return $reg;
    }
    public function login(){
        $login ='
        <h3 style="margin-left:.6em;">Login Here..</h3>
        <div class="form-column col-md-12 col-sm-12 col-xs-12">
                <!--Contact Form-->
                <div class="default-form contact-form">
                    <form method="POST" action="#" id="contact-form">
                        <div class="row clearfix">
                                
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="username" value="" placeholder="User-name" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="password" name="password" value="" placeholder="Password" required>
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-center"><button type="submit" name = "signin" class="theme-btn btn-style-one" style="background-color:#333333;">Submit</button></div>
                            </div>
                            
                        </div>
                    </form>
                </div>
                
                <div style="margin-top:3em;margin-bottom:3em; background-color:#3333333;"><h4><span>Need an account !</span></h4><a href="?info=account&register=signup">Signup here..</a></div
                <h3 style="font-weight:bold;">Terms and Conditions</h3>
                <div style="font-weight:bold;font-family:times new roman">
                <i>This web-site is designed to allow Christian friends interact, respect the rules, Administrator has a right 
                to disable you the moment we observe anything contrary to our reason of creating the site.</i> 
                </div>';
        if (isset($_POST['signin'])) {
            $this->uname = $this->operate->escape($_POST['username']);
            $this->password = $this->operate->escape(md5($_POST['password']));
           // $res = $this->operate->retrieve('user','*','uname = ?',null,null, ['s',$this->uname]);
            $res=$this->operate->retrieve('user','*','uname = ? AND password = ?',null,null,['ss',$this->uname, $this->password]);
            if ($res->num_rows > 0) {
                $fetch = $res->fetch_assoc();
                $_SESSION['users'] = $fetch['uname'];
                header('Location:index');
                //$login = 'session started'.$_SESSION['users'];
            }else{
               // $login = '<div>The '.$this->uname.' or '.$this->password.' is not correct  <a href="?info=account&register=signin">Try again...</a>. </div>';
            }
           
        }

        return $login;
    }


    public function partner(){
    $partner = '<div class="content-container"><h2 class="post-title">Partner with us</h2>
        <div class="content" style="margin-top:-1.5em;">
            <p>In all our efforts we endeavor to share the love of God to others, we give a chance to every person who finds it necessary to partner with us in the following filled. Kindly take time and fill the forms, this will help us have a right way of getting to you for the same.</p>
        </div>
            <div class="form-column col-md-12 col-sm-12 col-xs-12">
                <div class="default-form contact-form">
                    <form method="POST" action="#" id="contact-form">
                        <div class="row clearfix">
                            
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="fname" placeholder="First Name" >
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="lname" placeholder="Last Name" >
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <input type="text" autocomplete="on" name= "gender"   list="state" placeholder="Male or Female" />
                        <datalist id="state">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </datalist>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <input type="text" autocomplete="on" name= "occupation" list="state" placeholder="Student or Working">
                        <datalist id="state">
                        <option value="Student">Student</option>
                        <option value="Working">Working</option>
                        </datalist>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <input type="date" name="dob" placeholder="Date of Birth" >
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <input type="tel" name="tel" placeholder="Contact" >
                        </div>
                         <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-left:-.2em;">
                        <input type="text" name="org" placeholder="Organization Name. " >
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <select name="partner" id = "partner" onchange="hid()"> 
                        <div class="col">
                        <option value = "">Choose to partner with us...</option>
                        </div>
                        <div class="col">
                        <option value = "Join us">Join us</option>
                        </div>
                        <div class="col">
                        <option value = "Finance">Finance</option>
                        </div>
                        <div class="col">
                        <option value = "Support">Support</option>
                        </div>
                        <div class="col">
                        <option value = "Volunteer">Volunteer</option>
                        </div></select>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-left:-.2em;">
                        <input type="text" name="serve1" placeholder="Specify Others...." ></div>
                        </div>  
                       
                         
                        
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <div class="text-center"><button type="submit" name = "btn" class="theme-btn btn-style-one" style="background-color:#333333;">Submit</button></div>
                        </div>
                        </div>

                    </form>
                </div>
            </div>
      

                    <div class="info-column col-md-12 col-sm-12 col-xs-12" id = "info">
                		<h3 style="margin-bottom:-.2em;"><span ">Financial partnering options</span></h3>
                        <ul class="info-list">
                        <table class = "design"><tr><td>
                            <li><span>MTN mobile money:&nbsp;</span></td><td><strong>+256 772-406-925, </strong></li></td></tr>
                            <tr><td><li><span>MM a/c Name:&nbsp;</span></td><td><strong>Joane Katushabe </strong></li></td></tr>
                            <tr><td><li><span>a/c Number:&nbsp;</span></td><td><strong>01081083581940</strong></li></td></tr>
                            <tr><td><li><span>a/c Name:&nbsp;</span></td><td><strong>Opio Jackson</strong></li></td></tr>
                        </table>
                        </ul>
                    </div>
                </div>';

        if (isset($_POST['btn'])) {
            $this->fname = $this->operate->escape($_POST['fname']);
            $this->lname = $this->operate->escape($_POST['lname']);
            $this->dob = $this->operate->escape($_POST['dob']);
            $gender = $this->operate->escape($_POST['gender']);
            $occupation = $this->operate->escape($_POST['occupation']);
            $tel = $this->operate->escape($_POST['tel']);
            $s = $this->operate->escape($_POST['partner']);
            $s1 = $this->operate->escape($_POST['serve1']);
            $org = $this->operate->escape($_POST['org']);
            $reg = date('Y.mm.dd');
            $insert = $this->operate->insert('partner',array('fname'=>'?','lname'=>'?','gender'=>'?','occupation'=>'?','dob'=>'?','contact'=>'?',
            'partner0'=>'?','partner1'=>'?','organization'=>'?','reg_date'=>'?'),['ssssssssss', $this->fname, $this->lname, $gender, $occupation, 
            $this->dob, $tel, $s, $s1,$org,$reg]);
            if ($insert) {
              $partner .= header('Location:?info=account&register=partner');
            }

        }
        return $partner;
    }
    
public function signout(){
    if (session_id()) {
        session_unset();
        session_destroy();
        if ($_SESSION['users'] == '') {
            //$out = 'signed out'.$_SESSION['users'];
            header('Location:index.php');
        }
        return $out;
    }
}


public function update(){
    if (!empty($_SESSION['users'])) {
        $fo = $this->operate->retrieve('user','*', 'uname=?',null,null,['s',$_SESSION['users']]);
        if ($fo->num_rows > 0) {
            $c =$fo->fetch_assoc();
            $up = '<h3 style="margin-left:.6em;">Update Account Info Here..</h3>
                <div class="form-column col-md-12 col-sm-12 col-xs-12">
                <!--Contact Form-->
                <div class="default-form contact-form">
                    <form method="POST" action="#" id="contact-form">
                        <div class="row clearfix">
                                
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">'.$c['fname'].'</div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">'.$c['lname'].'</div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">'.$c['uname'].'</div>

                            <div class="form-group col-md-6 col-sm-6  col-xs-12">
                            <input type="file"  name="file">
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="address" value = " '.$c['address'].' " placeholder="Address" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">'.$c['faith'].'</div>
                        
                            
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-center"><button name = "edit" type="submit" class="theme-btn btn-style-one" style="background-color:#333333;">Update</button></div>
                            </div>
                            
                        </div>
                    </form>
                </div>';
        }

        //$ed = $this->operate->update('user',array(),[]);
    }
    else{
         $up .= '<div>Login to <a href="?info=account&register=signin">update account ...</a>. </div>'.mysqli_error();
    }

    return $up;
    
}

public function pRequest(){
$home = '<div class="content-container"><h2 class="post-title" style="text-align:center;">Yes, we can Pray with you</h2>
<p> Are you disappointed, are you in that place of a dilemma, confused so much and wondering what the next step is to take in this life, well I inspire you in a word that I received many years back. God argued me to pray with his people the word was clear “can you pray with my people”. Trust me at that point when no one can understand what is running in your heart, there is a close friend who is just close to you. The challenge is you may be too much covered up with questions on which way to take, Listen God is just close there with you. Can we pray together with you? You may wonder where we get the courage to do this well the burden on us is to stand with you in prayer and watch our True God do a miracle in one’s life. Ours simple stand with you in prayer. Share your prayer request. 
</p>                   

<div class="form-column col-md-12 col-sm-12 col-xs-12">
    <!--<h3><span class="theme_color">Contact</span> Form:</h3>-->
    <!--Contact Form-->
    <div class="default-form contact-form">
        <form method="post" action="#" id="contact-form">
            <div class="row clearfix">
                
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <input type="tel" name="tel" value="" placeholder="2567..." required>
                </div>
                  
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <textarea name="message" placeholder="Prayer Needs" required></textarea>
                </div>
                
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <div class="text-center"><button type="submit" name = "btn" class="theme-btn btn-style-one">Send now!</button></div>
                </div>
                
            </div>
        </form>
    </div>';
if (isset($_POST['btn'])) {
$x = $this->operate->escape($_SESSION['users']);  
$y = $this->operate->escape($_POST['tel']);
$z = $this->operate->escape($_POST['message']);
$reg = date('Y.mm.dd');
if (!empty($_SESSION['users'])) {
$res = $this->operate->retrieve('user','uname', 'uname = ?', null, null, ['s', $x]);
if ($res->num_rows > 0) {

if (isset($_POST['btn'])) {
    $insert = $this->operate->insert('pwyou',array('user'=>'?','contact'=>'?','prequest'=>'?','reg_date'=>'?'), ['ssss',$x,$y,$z,$reg]);
    if ($insert) {
        return $msg = header('Location:?info=account&register=prayerrequest');
    }
        }
    }
    }else{
        return $msg = "Please <a href='?info=account&register=signin'>login here..</a>";
    }
  }  
return $home;
    }
}
$register = new Account();




?>