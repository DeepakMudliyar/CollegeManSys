<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysqli_query($con,"DELETE FROM sub_tbl WHERE sub_id=$id");
	if($del_sql)
		echo "<div style='background-color: white; color:green; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "1 Record Deleted... !"
                . "</span>"
                . "</div>";
	else
		// $msg="Could not Delete :".mysqli_error();	
        echo "<div style='background-color: white; color:green; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
        . "<span class='p_font'>"
        . "Could not Delete :"
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
            <div >
            <a href="?tag=subject_entry"><input type="button" class="btn btn-large btn-primary" value="Register new" name="butAdd"/></a>
            </div>
</div><br><br>
<br />
<form method="post">
<div class="teacher_bday_box" style="margin: 5px auto;">
				<span class="p_font" style="font-weight:bold;">Select Course Name : </span>&nbsp;&nbsp;&nbsp;

					<div class="select_style">
    					<select name="course" style="width: 400px; height:30px;">
                                            <option selected disabled>-- select --</option>
                            <?php
                               $course_name=mysqli_query($con, "SELECT * FROM courses");
							   while($row=mysqli_fetch_array($course_name)){
								?>
                        		<option> <?php echo $row['course_name'];?> </option>
                                <?php 
							   }
                            ?>
                    	</select>&nbsp;&nbsp;
                        <input type="submit" name="btn_find" class="btn btn-primary btn-large" value="Find"/>
                    </div>

 			</div><br><br>


                            </form>

            <div class="panel-heading"><h1><span class="glyphicon glyphicon-list"></span> List of Subjects under the particular Course</h1></div>


<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Subject Name</th>
            <th style="text-align: center;">Class</th>
            <th style="text-align: center;">Semester</th>
            <th style="text-align: center;">Course Name</th>
            <th style="text-align: center;">Teacher Name</th>
            <th style="text-align: center;">Note</th>
            <th style="text-align: center;" colspan="2">Operation</th>
            </tr>
        </thead>
        
         <?php
     
      
	// if(isset($_POST['searchtxt']))
	// 	$key=$_POST['searchtxt'];
	
	//       if($key !="")
	// 	       $sql_sel=mysqli_query($con,"SElECT * FROM sub_tbl WHERE sub_name  like '%$key%' ");
    //       else 
    //             $sql_sel=mysqli_query($con,"SELECT * FROM sub_tbl");
    $course="";
	if(isset($_POST['btn_find']))
    $course=$_POST['course'];
   
                $sql_sel=mysqli_query($con,"SELECT * FROM `sub_tbl` WHERE `course_name`= '$course'");
	
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    ?>
      <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['sub_name'];?></td>
            <td><?php echo $row['class'];?></td>
            <td><?php echo $row['semester'];?></td>
            <td><?php echo $row['course_name'];?></td>
            <td><?php echo $row['teacher_name'];?></td>
            <td><?php echo $row['note'];?></td>
            <td align="center"><a href="?tag=subject_entry&opr=upd&rs_id=<?php echo $row['sub_id'];?>" title="Upate"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/update.png" height="20" alt="Update" /></a></td>
            <td align="center"><a href="?tag=view_subjects&opr=del&rs_id=<?php echo $row['sub_id'];?>" title="Delete"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/delete.jpg" height="20" alt="Delete" /></a></td>
        </tr>
    <?php	
    }
    ?>
</table>
</div><!--end of content_input -->
</body>
</html>