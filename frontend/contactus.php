<?php	
$con = mysqli_connect("localhost","root", "") or die("No Connection");
mysqli_select_db($con, "deepak") or die("No Database connected!");

if(isset($_POST['send_msg'])){
$name=$_POST['name'];
$who=$_POST['who'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$msg=$_POST['msg'];


$sql_ins=mysqli_query($con, "INSERT INTO enquiries_tbl 
                    Values (
                           Null,
                           '$name',
                           '$who',
                           '$email',
                           '$phone',
                           '$msg'
                   )");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Deepak and Vijay College</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- navigation bar start-->
    <div class="nav-container">

        <nav>
            <input type="checkbox" id="click">
            <label for="click" class="menu-icon" id="toggle">
                <span id="menu-btn">&#9776</span>
            </label>

            <ul type=none class="navbar">
                <li><a href="home.html">Home</a></li>
                <li><a class="sub-btn" >Register Online</a>
                    <ul class="sub-menu" type=none>
                        <li><a href="newadmission.php" target="_blank">Apply for Admission</a></li>
                    </ul>
                </li>
                <li> <a class="sub-btn" id="active">Student Support</a>
                    <ul class="sub-menu" type=none>
                        <li><a href="exams.php" target="_blank">Examinations</a></li>
                        <li> <a href="result.php">Results</a></li>
                        <li><a href="home.html#notice">Notices</a></li>
                        <li><a  id="active" href="contactus.php">Contact Us</a></li>
                    </ul>
                </li>
                <li><a href="aboutus.html">About</a></li>
            </ul>
        </nav>
    </div>
    <!-- navigation bar end-->

    <div class="header">
        <div class="collegeLogo">
            <img src="images/collegelogo.jpg" alt="Logo" width=100px>
        </div>
        <div class="collegeNameTitle">
            <h1 style=display:inline>Deepak and Vijay College Of Arts Commerce and Science</h1>
        </div>
        <div class="naacLogo" width=10px>
            <img src="images/NAAClogo.jpg" alt="NAAC_Logo">
        </div>
    </div>

    
    <div class="getintouch">
        <img src="images/getintouch.png" alt="">
    </div>
    <div class="contactuscol">
        <div class="contactusphone">
            <span>&#9742;</span>
            <h1>Phone</h1>
             <h3>0251 0000000</h3>
        </div>
        <div class="contactusemail">
            <span>&#9993;</span>
            <h1>Email</h1>
            <h3>dvcoacs@gmail.com</h3>
        </div>
        <div class="contactuslocation">
            <span>&#10148;</span>
            <h1>Location</h1>
            <h3>Deepak and Vijay College, Tilak Road, Ulhasnagar-421003</h3>
        </div>
    </div>

    <div class="msgContainer">
        <div class="messageBox"><br>
              <h2>-OR- Leave us a Message</h2>
            <form method="post">
            <span> <strong>Name : </strong></span>
            <input type="text" name="name"  placeholder="Enter your Name"><br><br>
            <span> <strong>You are a : </strong></span>
            <select name="who" required="required">
                <option selected disabled value="">-- select --</option>
                <option>Student</option>
                <option>Staff</option>
                <option>Parents / Guardian</option>
                <option>Others</option>
                </select><br><br>
    
            <span> <strong>Email : </strong></span>
            <input type="email" name="email"  placeholder="Enter your Email address"><br><br>
            <span> <strong>Phone no. : </strong></span>
            <input type="phone" max="10" name="phone"  placeholder="Enter your Contact no."><br><br>
            <span> <strong>Message / Description : </strong></span>
            <textarea name="msg"  placeholder="Enter your Message here.." cols="33" rows="4"></textarea><br><br>
                <div>
            <input type="submit" name="send_msg"  value="Send" class="btn btn-primary btn-large"  value="Add Now" id="button-in" > &nbsp;&nbsp;&nbsp;
            <input type="reset" name="cancel"   value="Cancel" class="btn btn-primary btn-large"  value="Add Now" id="button-in" >
    
        </div>
    
    
    
    
            
            </form>
        </div>
    </div><br><br>

    <!-- footer  start  -->
    <div class="footer">
        <div class="footercol1">
            <p>Deepak and Vijay College, Tilak Road, Ulhasnagar-421003.</p>
            <h4>0251 0000000</h4>
            <h4>dvcoacs@gmail.com</h4>
            <hr />
        </div>
        <div class="footercol2">
            <h3>Quick Links</h3>
            <hr />
            <br>
            <ul type="none">
                <li><a href="https://www.ugc.ac.in/">UGC</a></li>
                <li><a href="https://mu.ac.in/">University of Mumbai</a></li>
                <li><a href="/deepak/backend">Admin Login</a></li>
            </ul>
        </div>
        <div class="footercol3">
            <h3>E-Resources</h3>
            <hr />
            <br>
            <ul type="none">
                <li><a href="https://nlist.inflibnet.ac.in/">N List</a></li>
                <li><a href="https://ndl.iitkgp.ac.in/">National Digital Library</a></li>
            </ul>
        </div>
    </div>
    <div class="basefooter">
        <p>Copyright All Right Reserved</p>
    </div>
    <!-- footer  end  -->
</body>
</html>