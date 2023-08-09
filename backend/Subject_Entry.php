<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_sub'])){
	$subject=$_POST['subject'];
	$class=$_POST['class'];
	$semester=$_POST['semester'];
	$course=$_POST['course'];
	$teacher=$_POST['teacher'];
	$note=$_POST['note'];	
	
	

$sql_ins=mysqli_query($con, "INSERT INTO sub_tbl 
						VALUES(
							NULL,
							'$subject' ,
							'$class',
							'$semester',
							'$course' ,
							'$teacher' ,
							'$note'
							)
					");

if($sql_ins==true)
	// $msg="1 Row Inserted";
	echo "<div style='background-color: white;color: green; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
				. "<span class='p_font'>"
				. "1 Row Inserted Sucessfully"
				. "</span>"
				. "</div>";
else
	// $msg="Insert Error:".mysql_error();
	echo "<div style='background-color: white;color: red; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
				. "<span class='p_font'>"
				. "Insert Error:". "mysqli_error();"
				. "</span>"
				. "</div>";
	
}

//------------------update data----------
if(isset($_POST['btn_upd'])){
	$subject=$_POST['subject'];
	$class=$_POST['class'];
	$semester=$_POST['semester'];
	$course=$_POST['course'];
	$teacher=$_POST['teacher'];
	$note=$_POST['note'];
	
	
	$sql_update=mysqli_query($con, "UPDATE sub_tbl SET
							sub_name='$subject' ,
							class='$class' ,
							semester='$semester' ,
							course_name='$course' ,
							teacher_name='$teacher' ,
							note='$note' 
						WHERE sub_id=$id
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
		. "Update Failed...!"
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
	$sql_upd=mysqli_query($con, "SELECT * FROM sub_tbl WHERE sub_id=$id");
	$rs_upd=mysqli_fetch_array($sql_upd);
	
?>
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-th-list"></span> Subject's Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can update the subject's records into Database.</p>
			</div>
                  <form method="post">    
			<div class="teacher_note_pos" style="margin: 5px auto;">
                        <input type="text" class="form-control" name="subject"  id="textbox" value="<?php echo $rs_upd['sub_name'];?>" />
			</div><br>


			<div class="teacher_bday_box" style="margin: 5px auto;">
					<span class="p_font">Class : </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="class" Style="width:150px;" required="required"> 
						<option value="<?php $rs_update['class']?>" selected="selected"></option>
						<option  selected disabled>-- select --</option>
						<!-- $row=mysqli_fetch_array(mysqli_query($con,"SELECT class FROM sub_tbl WHERE sub_id= '$id'"));
						if($row==$rs_upd['class'])
								$iselect="selected";
						    else
							    $iselect=""; -->
			
						<option >FY</option>	
						<option >SY</option>
						<option >TY</option>
						</select>
					</div>
			</div><br><br>


			<div class="teacher_bday_box" style="margin: 5px auto;">
					<span class="p_font">Semester : </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="semester" Style="width:250px;" required="required"> 
       						<option selected disabled>-- select --</option>
       						<?php
							for($i=1;$i<=6;$i++){
							// 	if($i==$rs_upd['semester'])
							// 	$iselect="selected";
						    // else
							//     $iselect="";
							echo"<option" . $iselect. ">$i</option>";
							}
						?>
						</select>
					</div>
			</div><br><br>

			<div class="teacher_bday_box" style="margin: 5px auto;">
					<span class="p_font">Course Name : </span>&nbsp;&nbsp;&nbsp;

					<div class="select_style">
                                            <select name="course"  required="required" style="width: 250px">
                                            <option disabled>-- select --</option>
                            <?php
                                $course=mysqli_query($con,"SELECT * FROM courses");
								while($row=mysqli_fetch_array($course)){
									if($row['course_name']==$rs_upd['course_name'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                                <option <?php echo $iselect?> > <?php echo $row['course_name'] ;?> </option>
                                	
								<?php	
									}
                            ?>
                                        </select>
                                        </div>
            </div><br><br>
            
			<div class="teacher_bday_box"  style="margin: 5px auto;">
					<span class="p_font">Teacher Name : </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
                                            <select name="teacher"  required="required" style="width: 200px">
                                            <option selected disabled>-- select --</option>
                            <?php
                                $te_name=mysqli_query($con,"SELECT * FROM teacher_tbl");
								while($row=mysqli_fetch_array($te_name)){
									// if($strpos($rs_upd['teacher_name'], $row['f_name']))
								   	// 	$iselect="selected";
									// else
									// 	$iselect="";
								?>
                                <option  > <?php echo $row['f_name']; echo " "; echo $row['l_name'];?> </option>
                                	
								<?php	
									}
                            ?>
                                        </select>
                                        </div>
            </div><br><br>


                            <div class="text_box_pos" style="margin: 5px auto;" >
                                <textarea name="note"  cols="33" rows="3"><?php echo $rs_upd['note'];?></textarea>
                            </div><br><br>
            
                            <div>
                                <input type="submit" class="btn btn-primary btn-large" name="btn_upd" value="Update" id="button-in"  />
                                <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>                                
                            </div>
                  </form>            
    	</div>
    </form>
</div>
<?php
}
else
{
?>

<div class="panel panel-default" >
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-th-list"></span> Subject Entry Form</h1></div>
  			<div class="panel-body">
                        <form method="post">    
			<div class="container">
				<p style="text-align:center;">Here, you can add new subject's detail to record into database.</p>
			</div>

            <div class="teacher_note_pos" style="margin: 5px auto;">
                	<input type="text" class="form-control" name="subject"  id="textbox" placeholder="Subject's name"/>
            </div><br>
                
			<div class="teacher_bday_box" style="margin: 5px auto;" >
					<span class="p_font">Class : </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="class" Style="width:250px;" required="required"> 
						<option selected disabled>-- select --</option>
						<option>FY</option>
						<option>SY</option>
						<option>TY</option>
						</select>
					</div>
			</div><br><br>

				

			<div class="teacher_bday_box" style="margin: 5px auto;" >
					<span class="p_font">Semester : </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="semester" Style="width:250px;" required="required"> 
       						<option selected disabled>-- select --</option>
       						<?php
							for($i=1;$i<=6;$i++){	
							echo"<option>$i</option>";
							}
						?>
						</select>
					</div>
			</div><br><br>
          
			<div class="teacher_bday_box" style="margin: 5px auto;">
				<span class="p_font">Course Name : </span>&nbsp;&nbsp;&nbsp;

					<div class="select_style">
    					<select name="course" style="width: 300px;">
                                            <option selected disabled>-- select --</option>
                            <?php
                               $fac_name=mysqli_query($con, "SELECT * FROM courses");
							   while($row=mysqli_fetch_array($fac_name)){
								?>
                        		<option> <?php echo $row['course_name'];?> </option>
                                <?php 
							   }
                            ?>
                    	</select>
                    </div>
 			</div><br><br>
				
     		<div class="teacher_bday_box" style="margin: 5px auto;">
				<span class="p_font">Teacher Name : </span>&nbsp;&nbsp;&nbsp;

				<div class="select_style">
                            <select name="teacher" style="width: 250px;">
                                            <option selected disabled>-- select --</option>
                            <?php
                                $te_name=mysqli_query($con,"SELECT * FROM teacher_tbl");
								while($row=mysqli_fetch_array($te_name)){
								?>
                                <option> <?php echo $row['f_name'] ; echo " "; echo $row['l_name'];?> </option>
								<?php	
									}
                            ?>
                    	</select>
                    </div>
            </div><br><br>

                <div class="text_box_pos" style="margin: 5px auto;">
                	<textarea  name="note" cols="33" rows="3" placeholder=' Add note..'></textarea>
                </div><br><br>
            
                <div>
                	<input type="submit" class="btn btn-primary btn-large" name="btn_sub" value="Add Now" id="button-in"  />
                        <input type="reset" class="btn btn-primary btn-large" style="margin-left: 9px;" value="Cancel" id="button-in"/>
                </div>
           </form>
    	</div>
    </form>
</div><!-- end of style_informatios -->

<?php
}
?>
</body>
</html>