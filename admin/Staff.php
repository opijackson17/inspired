<?php

require_once("../client/Operations.php");
class Staff extends Operations 
{
    function __construct(){
        parent::__construct();
        $this->operate = new Operations();
    }

    public function addStaff(){
        $staff = '<section class="boxs" style="width:60%; margin-left:auto; margin-right:auto; margin-top:5em;">
        <div class="boxs-header dvd dvd-btm">
            <h1 class="custom-font"><strong>Add Staff</strong></h1>
        </div>
        <div class="boxs-body">
        <form class="form-horizontal" role="form" method = "POST" enctype="plain-data">
        <table class="table table-borderless"><tr><td>
        <div class="form-group">
        <div class="col-sm-10">
        <input type="text" name="fname"  placeholder="First-name" required>
        </div>
        </div>
        <div class="form-group">
        <div class="col-sm-10">
        <input type="text" name="lname"  placeholder="Last-name" required>
        </div>
        </div>
        <div class="form-group">
        <div class="col-sm-10">
        <input type="text" name="address"  placeholder="Residence" required>
        </div>
        </div></td><td>
        <div class="form-group">
        <div class="col-sm-10">
        <input type="text" name="uname"  placeholder="User-name" required>
        </div>
        </div>
        <div class="form-group">
        <div class="col-sm-10">
        <input type="password" name="lname"  placeholder="Password" required>
        </div>
        </div>
        <div class="form-group">
        <div class="col-sm-10">
        <select class="form-control form-control-lg">
        <option>Select gender</option>
        <option value="M">Male</option>
        <option value = "F">Female</option>
        </select>
        </div>
        </div></td></tr>
        <tr><td colspan="2"><div class="form-group">
        <div class="col-sm-10">
        <textarea class="form-control"  name="txt" cols = "8" placeholder="Description here..." required></textarea>
        </div>
        </div></td></tr></table>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="prayer" class="btn btn-raised btn-primary">Add Staff</button>
            </div>
        </div>
               
            </form>
        </div>
    </section>';

        return $staff;
    }

    public function getPartners(){
        $result = $this->operate->retrieve('partner','*',null, null,null,null);
        $partners = '<section class="boxs" style="width:60%; margin-left:auto; margin-right:auto; margin-top:5em;">
        <div class="boxs-header dvd dvd-btm">
            <h1 class="custom-font"><strong>Partners</strong></h1>
        </div>
        <div class="content-box-large">
        <div class="panel-heading">
        <div class="panel-body">
        <table class="table table-condensed"><tr><th>Full Name</th><th>Contact</th><th>Area</th><th>Date</th><th>Company</th></tr>';
        while ($fetch = $result->fetch_assoc()) {
        $partners .= '<tr><td>'.$fetch['fname'].' '.$fetch['lname'].'</td><td>'.$fetch['contact'].'</td><td>'.$fetch['partner0'].'
        </td><td>'.$fetch['reg_date'].'</td><td>'.$fetch['organization'].'</td></tr>'; 
        }
        $partners .= '</table></div></div></div>
       </section>';

        return $partners;

    }

    public function getReply(){
        $result = $this->operate->retrieve('pmessage','*',null, null,null,null);
        
        $msg = '<section class="boxs" style="width:60%; margin-left:auto; margin-right:auto; margin-top:5em;">
        <div class="boxs-header dvd dvd-btm">
            <h1 class="custom-font"><strong>Replies from Prayer Message</strong></h1>
        </div>
        <div class="content-box-large">
        <div class="panel-heading">
        <div class="panel-body">
        <table class="table table-condensed"><tr><th>Full Name</th><th>Contact</th><th>Reply</th><th>Date</th><th>Message</th></tr>';
        while ($fetch = $result->fetch_assoc()) {
        $res = $this->operate->retrieve('user','*','uname=?', null,null,['s', $fetch['uname']]);
        $ge=$res->fetch_assoc();
        $msg .= '<tr><td>'.$ge['fname'].' '.$ge['lname'].'</td><td>'.$fetch['contact'].'</td><td>'.$fetch['message'].'
        </td><td>'.$fetch['reg_date'].'</td></tr>'; 
        }
        $msg .= '</table></div></div></div>
       </section>';

        return $msg;
    }

    public function stayTouch(){
        $result = $this->operate->retrieve('contactForm','*',null, null,null,null);
        
        $msg = '<section class="boxs" style="width:70%; margin-left:auto; margin-right:auto; margin-top:5em;">
        <div class="boxs-header dvd dvd-btm">
            <h1 class="custom-font"><strong>Stay In Touch</strong></h1>
        </div>
        <div class="content-box-large">
        <div class="panel-heading">
        <div class="panel-body">
        <table class="table table-condensed"><tr><th>Full Name</th><th>Email</th><th>Subject</th><th>Information</th><th>Date</th><th>Action</th></tr>';
        while ($fetch = $result->fetch_assoc()) {
        $msg .= '<tr><td>'.$fetch['name'].'</td><td>'.$fetch['email'].'</td><td>'.$fetch['subject'].'</td><td>'.$fetch['details'].
        '</td><td>'.$fetch['reg_date'].'</td><td><button name="email"><i class="fa fa-send-o"></i></button></td></tr>'; 
        }
        $msg .= '</table></div></div></div>
       </section>';

        return $msg;
    }
}

$staff = new Staff();

?>