<?php	
$con = mysqli_connect("localhost","root", "") or die("No Connection");
mysqli_select_db($con, "deepak") or die("No Database connected!");
$roll_no="";
$course="";
$class="";
$semester="";

if(isset($_POST['find']))
$roll_no=$_POST['roll_no'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results: Deepak and Vijay College</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   

    <link rel="stylesheet" href="style.css">    
    <link rel="stylesheet" href="/deepak/backend/css/style_view.css">
    <link rel="stylesheet" href="/deepak/backend/css/style_entry.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>   
    <script src="javascript.js"></script>


    <style>

table, tr, th, td {
    border: 1px solid;
    text-align: center;
    width:700px;
    margin:15px;
}


    </style>


</head>

<body id="body" style="background-color:white;">
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
                <li> <a class="sub-btn" id="active" >Student Support</a>
                    <ul class="sub-menu" type=none>
                        <li><a href="exams.php" target="_blank">Examinations</a></li>
                        <li> <a id="active" href="result.php">Results</a></li>
                        <li><a href="home.html#notice">Notices</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
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

    <div class="panel panel-default">
        <div class="panel-heading" style="background-color:lightgrey">
            <h1><span class="glyphicon glyphicon-user"></span> Result Viewing Page</h1>
        </div>
        <div class="panel-body">
            <div class="container">
                <p style="text-align:center;">Here, Students can check their Results.</p>
            </div>



            <form method="post">
                <div class="teacher_name_pos" style=" margin: 5px auto; ">
                    <input type="text" name="roll_no" class="form-control" placeholder="Enter the Roll No..."
                        required />
                </div>

                <div  style="margin:5px auto; text-align:center;" >
                    <input type="submit" class="btn btn-primary btn-large" name="find" value="Find" id="button-in" />
                    <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel"
                        id="button-in" />
                </div><br><br>

            </form>

            <div id="result_container">
            <?php	
                   if(isset($_POST['find'])){
	               $roll_no=$_POST['roll_no'];

                   $sql_sel=mysqli_query($con, "SELECT * FROM stu_score_tbl WHERE  roll_no='$roll_no'");

                ?>
            
            <div style="margin:15px; top:15px;">
                <?php
                $name=mysqli_fetch_array(mysqli_query($con, "SELECT f_name, l_name, course_name, class FROM stu_tbl WHERE roll_no='$roll_no'"));
                   if($name==true){
                ?>
                   
                    <span>Name : </span>
                    <?php echo $name['f_name'] ." " . $name['l_name'];?> <br>
                    <span>Class : </span>
                    <?php echo $name['class'] . " - " . $name['course_name']  ;?><br>
                    <span>Class : </span>
                    <?php echo $roll_no;?>

            </div>




                <table class="table-bordered" >
                    <thead>
                        <tr>
                            <th style="text-align: center;" rowspan="2">Subject Name</th>
                            <th style="text-align: center;" colspan="2">Marks</th>
                            <th style="text-align: center;" rowspan="2">Paas / Fail</td>
                            <th style="text-align: center;" rowspan="2">Remark / Note</td>
                        </tr>
                        <tr>
                            <th>Mid Term</td>
                            <th>Final Term</td>
                        </tr>
                    </thead>


                    <?php
                           while($row=mysqli_fetch_array($sql_sel)){   

                        //    while($i < count($get_sub_name)){
                        ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $row['subject_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['midterm']; ?>
                            </td>
                            <td>
                                <?php echo $row['final']; ?>
                            </td>
                            <td>
                                <?php echo $row['paas/fail']; ?>
                            </td>
                            <td>
                                <?php echo $row['remark']; ?>
                            </td>

                        </tr>
                    </tbody>
                    <?php
                    }
                    ?>

                </table>


                <div  style="margin:5px auto; text-align:center;" >
                    <input type="submit" class="btn btn-primary btn-large" name="print" value="Print Result" id="button-in" onclick="print_content()" />
                </div><br><br>
                <?php
                   } 
                else {
                    echo "Roll no. not found or Result not Declared";
                }

                 
                }
                ?>
            </div>




        </div>


    </div>
    </div>
    <script>
    function print_content(){
        var body = document.getElementById('body').innerHTML;
        var data = document.getElementById('result_container').innerHTML;
        document.getElementById('body').innerHTML= data;
        window.print();
        document.getElementById('body').innerHTML= body;
    }


    </script>

</body>