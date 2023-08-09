<?php
$id="";
$opr="";
$course="";
$class="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];

// if(isset($_POST['find']))
// 	$course=$_POST['course'];
// 	$class=$_POST['class1'];
	 
// if(isset($_GET['course']))
//     $course=$_GET['course'];

// if(isset($_GET['class']))
//     $class=$_GET['class'];

if(isset($_POST['btn_sub'])){
	$roll_no=$_POST['roll_no'];
	$stu_name=$_POST['name'];
	$course=$_POST['course'];
	$class=$_POST['class'];	
	$subject=$_POST['subject'];
	$midterm=$_POST['midterm'];
	$final=$_POST['finalterm'];
	$result=$_POST['result'];
	$note=$_POST['note'];

	if(isset($_POST['find']))
	$course=$_POST['course'];
	$class=$_POST['class'];
	
for($j=0;$j<count($roll_no);$j++){
$sql_ins=mysqli_query($con,"INSERT INTO stu_score_tbl 
						VALUES(
							NULL,
							'$roll_no[$j]',
							'$stu_name[$j]',
							'$course',
							'$class',
							'$subject',
							'$midterm[$j]',
							'$final[$j]',
							'$result[$j]',
							'$note[$j]'
							)
					");
}
if($sql_ins==true)
	// $msg="1 Row Inserted";
		echo "<div style='background-color: white; color: green; padding: 20px;border: 1px solid black;margin-bottom: 25px;'>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";
else
	// $msg="Insert Error:".mysql_error();
	echo "<div style='background-color: white; color: red; padding: 20px;border: 1px solid black;margin-bottom: 25px;'>"
	. "<span class='p_font'>"
	. "Insert Error..." . mysqli_error($con)
	. "</span>"
	. "</div>";
	
}


//------------------update data----------
if(isset($_POST['btn_upd'])){
	$midterm=$_POST['midterm'];
	$finalterm=$_POST['finalterm'];
	$note=$_POST['note'];
	
	$sql_update=mysqli_query($con, "UPDATE stu_score_tbl SET
							midterm='$midterm' ,	
							final='$finalterm' ,
							remark='$note' 
						WHERE ss_id=$id		

					");
					
if($sql_update==true)
	echo "<div style='background-color: white; color: green; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";
	else
		// $msg="Update Failed...!";
		echo "<div style='background-color: white; color: red; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Update Failed...!" . mysqli_error($con)
                . "</span>"
                . "</div>";
	
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>
<?php
if($opr=="upd")
{
	$sql_upd=mysqli_query($con, "SELECT * FROM stu_score_tbl WHERE ss_id=$id");
	$rs_upd=mysqli_fetch_array($sql_upd);
?>

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-star-empty"></span> Score's Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can update the Student's Marks into database.</p>
			</div>
                  <form method="post">  
					  
				<div>
				<span class="p_font" style="font-weight: bold;">Roll No.:&nbsp;&nbsp;&nbsp; <?php echo $rs_upd['roll_no'];?> </span>
                </div><br><br>

                <div>
				<span class="p_font" style="font-weight: bold;">Student Name:&nbsp;&nbsp;&nbsp; <?php echo $rs_upd['student_name'];?> </span>
                </div><br><br>

				<div>
				<span class="p_font" style="font-weight: bold;">Studying in:&nbsp;&nbsp;&nbsp; <?php echo $rs_upd['class'];?>&nbsp;&nbsp;&nbsp; <?php echo $rs_upd['course_name'];?> </span>
                </div><br><br>

				<div>
				<span class="p_font" style="font-weight: bold;">Subject:&nbsp;&nbsp;&nbsp; <?php echo $rs_upd['subject_name'];?></span>
                </div><br><br>


            

                    
                    <div class="teacher_note_pos"  style="margin: 5px auto;">
					<span class="p_font" style="font-weight: bold;">Mid Term Marks : </span>&nbsp;&nbsp;&nbsp;
                	<input type="text" name="midterm"  id="textbox" value="<?php echo $rs_upd['midterm'];?>" style="width:80px;" />
                    </div><br>
                    
                    <div class="teacher_note_pos"  style="margin: 5px auto;">
					<span class="p_font" style="font-weight: bold;">Final Term Marks : </span>&nbsp;&nbsp;&nbsp;
                	<input type="text" name="finalterm"  id="textbox" value="<?php echo $rs_upd['final'];?>" style="width:80px;" />
                    </div><br>
            
					<div class="teacher_note_pos" style="margin: 5px auto;">
					<span class="p_font" style="font-weight: bold;">Remarks / Note : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="note"  id="textbox" value="<?php echo $rs_upd['remark'];?>" style="width:auto; margin:2px auto;" />
				    </div><br>
                    
                    <div>
                	<input type="submit" class="btn btn-primary btn-large" name="btn_upd" value="Update" id="button-in" title="Update"  />
                        <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>
                    </div>
				</form>
   </div>
</div><!-- end of style_informatios -->
<?php	
}
else
{
?>
	
	<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-star-empty"></span> Score's Entry Form</h1></div>
  			<div class="panel-body">
				<div class="container">
				<p style="text-align:center;">Here, you can entry Marks of students into database.</p>
				</div>

				<form method="post"> 
				<div class="teacher_bday_box" style="margin-left: 0px;">
					<span class="p_font" style="font-weight: bold;">Select Course : </span>&nbsp;&nbsp;&nbsp;

					<div class="select_style">
                                            <select name="course" required="required" style="width: 200px;">
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
           		</div><br><br>


				<div class="teacher_bday_box"  style="margin-left: 0px;">
					<span class="p_font" style="font-weight: bold;">Class : </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="class" required="required" Style="width:150px;" > 
						<option selected disabled value="">-- select --</option>
						<option>FY</option>
						<option>SY</option>
						<option>TY</option>
						</select>
					</div>
				</div><br><br>	

				<div>
                    <input type="submit"  class="btn btn-primary btn-large" name="find" value="Find" id="button-in"  />
                    <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>                	
            </div><br><br>
			</form>

            <form method="post">
			<?php
			// $course="";
		    // $class="";
		//    $roll_no="";
		// $f_name="";
        // $l_name="";
		   $sql_find="";
			if(isset($_POST['find'])){
				$course=$_POST['course'];
				$class=$_POST['class'];	
		   ?>
			<div class="teacher_bday_box" style="margin-left: 0px;">
				<span class="p_font" style="font-weight: bold;">Subject : </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
                                            <select name="subject" required style="width: 200px;">
                                            <option selected disabled value="">Subject's name</option>
                            <?php
                               $subject=mysqli_query($con,"SELECT * FROM sub_tbl WHERE Course_name='$course' && class='$class'");
							   while($row=mysqli_fetch_array($subject)){
							?>
                            <option> <?php echo $row['sub_name'];?> </option>
                            <?php	   
							   }
							   $sql_find=mysqli_query($con,"SELECT * FROM `stu_tbl` WHERE `course_name`= '$course' AND `class`= '$class'");
                             if($sql_find==true){
                            ?>	
                    </select>
               		</div>
            	</div><br><br>
				<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> List of Students under the particular Class</h1></div>

			<div class="table_margin">
            <table class="table table-bordered">
       			 <thead>
           			 <tr>
            			<th style="text-align: center;">No</th>
						<th style="text-align: center;">Roll No.</th>
            			<th style="text-align: center;">Student Name</th>
            			<th style="text-align: center;">Mid Term Marks</th>	
            			<th style="text-align: center;">Final Term Marks</th>
            			<th style="text-align: center;">PAAS / FAIL</th>
            			<th style="text-align: center;">Remarks / Note</th>
            		</tr>
      		     </thead>

	<?php

		// $row=mysqli_fetch_array($sql_find)
	    // $roll_no=$row['roll_no'];
		// $f_name=$row['f_name'];
        // $l_name=$row['l_name'];
		$i=0;
    while($row=mysqli_fetch_array($sql_find)){
    $i++;
    ?>
     	 <tr>
            <td><?php echo $i;?></td>
			<td><input type="text" name="roll_no[]" value="<?php echo $row['roll_no'];?>" readonly /></td>
            <td><input type="text" name="name[]" value="<?php echo $row['f_name'] ." ". $row['l_name'];?>" readonly />
			    <input type="hidden" name="course" value="<?php echo $course;?>" readonly />
			    <input type="hidden" name="class" value="<?php echo $class;?>" readonly /></td>
			<td><input type="text" name="midterm[]" placeholder="Enter Marks out of 100"  required /></td>
			<td><input type="text" name="finalterm[]" placeholder="Enter Marks out of 100" required /></td>	
			<td><input type="text" name="result[]" /></td>
			<td><input type="text" name="note[]" /></td>

        </tr>
		<?php 
	 	}
        ?>
			</table>
            </div>
	
	

			<div>
                    <input type="submit"  class="btn btn-primary btn-large" name="btn_sub" value="Save & Declare Result" id="button-in"  />
                    <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Reset" id="button-in"/>                	
            </div>
            
			</form>
			</div>	
			
	</div>


	
<?php
}
else
{ echo "No Records Found";}



			}


}

?>
</body>
</html>