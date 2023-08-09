<!--for delete Record -->
<?php
	$msg="";
	$opr="";
    $course="";
    $class="";  
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysqli_query($con, "DELETE FROM stu_tbl WHERE stu_id=$id");
	if($del_sql)
		echo "<div style='background-color: white; color:green; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "1 Record Deleted... !"
                . "</span>"
                . "</div>";
	
	else
		// $msg="Could not Delete :".mysql_error();
        echo "<div style='background-color: white; color:red; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
        . "<span class='p_font'>"
        . "Could not Delete..."
        . "</span>"
        . "</div>";
			
}
	// echo $msg;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>
<div class="btn_pos" style="margin: 5px auto;">
            <a href="?tag=student_entry"><input type="button" class="btn btn-large btn-primary" value="Add New Student" name="butAdd"/></a>
    </div><br><br>

    <form method="post"> 
				<div class="teacher_bday_box" style="margin-left: 0px;">
					<span class="p_font" style="font-weight: bold;">Select Course : </span>&nbsp;&nbsp;&nbsp;

					<div class="select_style">
                                            <select name="course" required="required" style="width: 400px; height:30px;">
											<option selected disabled value="">-- select --</option>
                            <?php
                               $course_name=mysqli_query($con,"SELECT * FROM courses");
							   while($row=mysqli_fetch_array($course_name)){
								?>
                        		<option> <?php echo $row['course_name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
              	 	</div>
           		</div><br>


				<div class="teacher_bday_box"  style="margin-left: 0px;">
					<span class="p_font" style="font-weight: bold;">Select Class : </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="class" required="required" Style="width:150px; height:30px;" > 
						<option selected disabled value="">-- select --</option>
						<option>FY</option>
						<option>SY</option>
						<option>TY</option>
						</select>
					</div>
				</div><br>

				<div>
                    <input type="submit"  class="btn btn-primary btn-large" name="find" value="Find" id="button-in"  />
                    <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>                	
            </div><br><br>
                            </form>
        <?php 
        if(isset($_POST['find'])){
         $course=$_POST['course'];
         $class=$_POST['class'];	
         $sql_sel=mysqli_query($con, "SELECT * FROM stu_tbl WHERE `course_name`= '$course' && `class`= '$class'");
         ?>

           <div><h1><span class="glyphicon glyphicon-user"></span> List of Teachers under the particular Class</h1></div>
 
<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">SR No.</th>
            <th style="text-align: center;">Roll No.</th>
            <th style="text-align: center;">Student Name</th>
            <th style="text-align: center;">Course Enrolled</th>
            <th style="text-align: center;">Class</th>
            <th style="text-align: center;">Gender</th>
            <th style="text-align: center;">Date of Birth</th>
            <th style="text-align: center;">Address</th>
            <th style="text-align: center;">Phone</th>
            <th style="text-align: center;">E-mail</th>
            <th style="text-align: center;">Fees Paid</th>
            <th style="text-align: center;">Note</th>
            <th style="text-align: center;" colspan="2">Operation</th>
        </tr>
        
        <?php
	// $key="";
	// if(isset($_POST['searchtxt']))
	// 	$key=$_POST['searchtxt'];
	
	//  if($key !="")
	// 	$sql_sel=mysqli_query($con, "SElECT * FROM stu_tbl WHERE f_name like '%$key%' or l_name like '%$key%' ");
            
    // else
	// 	 $sql_sel=mysqli_query($con, "SELECT * FROM stu_tbl");


    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){   
    $i++;
    ?>
      <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['roll_no'];?></td>
            <td><?php echo $row['f_name']."    ".$row['l_name'];?></td>
            <td><?php echo $row['course_name'];?></td>
            <td><?php echo $row['class'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['dob'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['fees_paid'];?></td>
            <td><?php echo $row['note'];?></td>
            <td><a href="?tag=student_entry&opr=upd&rs_id=<?php echo $row['stu_id'];?>" title="Update"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/update.png" height="20" alt="Update" /></a></td>
            <td><a href="?tag=view_students&opr=del&rs_id=<?php echo $row['stu_id'];?>" title="Delete"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/delete.jpg" height="20" alt="Delete" /></a></td>
             
        </tr>
    <?php	
    }


        }
		
	
    ?>
    </table>
</form>
</div>
</body>
</html>


<!--
<td>
        	<a href="?tag=student_entry"><input type="button" title="Add new student" name="butAdd" value="Add New" id="button-search" /></a>
        </td>
        <td>
        	<input type="text" name="searchtxt" title="Enter name for search " class="search" autocomplete="off"/>
        </td>
        <td style="float:right">
        	<input type="submit" name="btnsearch" value="Search" id="button-search" title="Search Student" />
        </td>
-->