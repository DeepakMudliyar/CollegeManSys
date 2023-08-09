<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
//--------------add data-----------------	
if(isset($_POST['btn_sub'])){
	$roll_no=$_POST['roll_no'];
	$f_name=$_POST['fname'];
	$l_name=$_POST['lname'];
	$course=$_POST['course'];
	$class=$_POST['class'];
	$gender=$_POST['gender'];
	$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
	$addr=$_POST['address'];
	$phone=$_POST['phone'];
	$mail=$_POST['email'];
	$fees_paid=$_POST['fees_paid'];
	$note=$_POST['note'];

$sql_ins=mysqli_query($con, "INSERT INTO stu_tbl 
						VALUES(
							NULL,
							'$roll_no',
							'$f_name',
							'$l_name' ,
							'$course',
							'$class',
							'$gender',
							'$dob',
							'$addr',
							'$phone',
							'$mail',
							'$fees_paid',
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
	$fees_paid=$_POST['roll_no'];
	$f_name=$_POST['fname'];
	$l_name=$_POST['lname'];
	$course=$_POST['course'];
	$class=$_POST['class'];
	$roll_no=$_POST['roll_no'];
	$gender=$_POST['gender'];
	$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
	$addr=$_POST['address'];
	$phone=$_POST['phone'];
	$mail=$_POST['email'];
	$fees_paid=$_POST['fees_paid'];
	$note=$_POST['note'];	
	
	$sql_update=mysqli_query($con, "UPDATE stu_tbl SET
								roll_no='$roll_no',
								f_name='$f_name',
								l_name='$l_name' ,
								course_name='$course',
								class='$class',
								gender='$gender',
								dob='$dob',
								address='$addr',
								phone='$phone',
								email='$mail',
								fees_paid='$fees_paid' ,
								note='$note'
							WHERE
								stu_id=$id
							");
	if($sql_update=='true')
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
	$sql_upd=mysqli_query($con, "SELECT * FROM stu_tbl WHERE stu_id=$id");
	
	$rs_upd=mysqli_fetch_array($sql_upd);
	list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>

<!-- Students Detials Upadte form-->

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Student Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can update/edit student's detail to record into database.</p>
			</div>

 
<div class="container_form">
    <form method="post">
	<div class="teacher_name_pos">
					<input type="text" name="roll_no" class="form-control" value="<?php echo $rs_upd['roll_no'];?>" />
				</div><br>

				<div class="teacher_name_pos">
					<input type="text" name="fname" class="form-control" value="<?php echo $rs_upd['f_name'];?>" />
					<input type="text" name="lname" class="form-control" value="<?php echo $rs_upd['l_name'];?>" />
				</div><br>
				
				<div class="teacher_bday_box">
					<span class="p_font" style= "justify-content:center;">Course Enrolled: </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style"  style= " width:300px;">
    					<select name="course" required="required" style= " width:300px;">
							<option disabled>-- select --</option>

						<?php
							$result = mysqli_query($con, "SELECT * FROM Courses");
							while ( $row= mysqli_fetch_array($result)){
								$iselect="";
								if($row['course_name']==$rs_upd['course_name'])
								   	      	$iselect="selected";
								        	else
									      	$iselect="";
							?>
						
								<option <?php echo $iselect?> ><?php echo $row['course_name']?></option>";
						<?php
							}
						?>
						</select>
					</div>
				</div><br><br>
				
				<div class="teacher_bday_box">
					<span class="p_font">Class : </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="class" Style="width:150px;" required="required"> 
						<!-- <option selected disabled>-- select --</option> -->
						<?php $iselect='selected="selected"'; ?>
						<option <?php if($rs_upd=="FY")echo $iselect;?>>FY</option>
						<option <?php if($rs_upd=="SY")echo $iselect;?>>SY</option>
						<option <?php if($rs_upd=="TY")echo $iselect;?>>TY</option>
						</select>
					</div>
				</div><br><br>

				<div class="teacher_radio_pos">
					<input type="radio" name="gender" value="Male" <?php if($rs_upd['gender']=="Male") echo "checked";?> /> <span class="p_font">&nbsp;Male</span>
					<input type="radio" name="gender" value="Female" <?php if($rs_upd['gender']=="Female") echo "checked";?> /> <span class="p_font">&nbsp;Female</span>
				</div><br>
				
				<div class="teacher_bday_box">
					<span class="p_font">Birthday: </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="yy">
       						<option>Year</option>
       						<?php
							$sel="";
							for($i=1985;$i<=2015;$i++){	
								if($i==$y){
									$sel="selected='selected'";}
								else
								$sel="";
							echo"<option value='$i' $sel>$i </option>";
							}
							
						?>
						</select>
					</div><br>
					
					<div class="select_style">
    					<select name="mm">
       						<option>Month</option>
       						<?php
							$sel="";
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","NOv","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
									if($i==$m){
										$sel=$sel="selected='selected'";}
									else
										$sel="";
                                echo"<option value='$i' $sel> $mon</option>";		
                            }
                        ?>
                        </select>
					</div>
					
					<div class="select_style">
    					<select name="dd">
       						<option>Date</option>
       						<?php
						$sel="";
                        for($i=1;$i<=31;$i++){
							if($i==$d){
								$sel=$sel="selected='selected'";}
							else
								$sel="";
                        ?>
                        <option value="<?php echo $i ;?>"<?php echo $sel?> >
                        <?php
                        if($i<10)
                            echo"0"."$i" ;
                        else
                            echo"$i";	
							  
						?>
						</option>	
						<?php 
						}?>
						</select>
					</div>
					
		     	</div><br><br>

				<div class="teacher_address_pos">
					<input type="text" name="address" class="form-control" value='<?php echo $rs_upd['address'];?>' />
				</div><br>
				
				<div class="teacher_mobile_pos">
					<input type="text" name="phone" class="form-control" value="<?php echo $rs_upd['phone'];?>" />
				</div><br>
				
				<div class="teacher_mail_pos">
					<input type="text" name="email" class="form-control" value="<?php echo $rs_upd['email'];?> " />
				</div><br>

				<div class="teacher_bday_box">
					<span class="p_font">Fees Status: </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
					<select name="fees_paid" required="required"  style= " width:250px;">
							<!-- <option selected disabled>-- select --</option> -->
							<option <?php if($rs_upd=='Full Fees Paid') echo "selected"?>>Full Fees Paid</option>
							<option <?php if($rs_upd=='1st Installment Paid') echo "selected"?>>1st Installments Paid</option>
							<option <?php if($rs_upd=='2nd Installment Paid') echo "selected"?>>2nd Installments Paid</option>
						</select>
					</div>
				</div><br><br>
				
				<div class="teacher_note_pos">
					<input type="text" name="note" class="form-control" value='<?php echo $rs_upd['note'];?>' />
				</div><br>
				
				<div class="teacher_btn_pos">
					<input type="submit" name="btn_upd" href="#" class="btn btn-primary btn-large" value="Update" />&nbsp;&nbsp;&nbsp;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
                                    </form>
			</div>
		</div>
	</div><!-- end of style_informatios -->

<?php	
}
else
{
?>
<!-- Students Entry Form-->
	
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Student Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can add new student's detail to record into database.</p>
			</div>

<div class="container_form">
    <form method="post">
				<div class="teacher_name_pos">
					<input type="text" name="roll_no" class="form-control" placeholder="Roll No..." required />
				</div><br>
				<div class="teacher_name_pos">
					<input type="text" name="fname" class="form-control" placeholder="First name" required/>
					<input type="text" name="lname" class="form-control" placeholder="Last name" required/>
				</div><br>

				<div class="teacher_bday_box">
					<span class="p_font">Course Enrolled: </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style"  style= "width:360px;">
    					<select name="course" required="required" style= "width:340px;">
							<option value="" selected disabled >-- select --</option>

						<?php
							$result = mysqli_query($con, "SELECT * FROM courses");
							while ( $row= mysqli_fetch_array($result)){
						?>
								<option> <?php echo $row['course_name']?></option>
						<?php
							}
						?>
						</select>
					</div>
				</div><br><br>

				<div class="teacher_bday_box">
					<span class="p_font">Class : </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="class" Style="width:150px;" required="required"> 
						<option value="" selected disabled>-- select --</option>
						<option >FY</option>
						<option >SY</option>
						<option >TY</option>
						</select>
					</div>
				</div><br><br>


				
				<div class="teacher_radio_pos">
					<input type="radio" name="gender" value="Male" /> <span class="p_font">&nbsp;Male</span>
					<input type="radio" name="gender" value="Female" /> <span class="p_font">&nbsp;Female</span>
				</div><br>
				
				<div class="teacher_bday_box">
					<span class="p_font">Birthday: </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="yy" required>
       						<option>Year</option>
       						<?php
							for($i=1985;$i<=2015;$i++){	
							echo"<option value='$i'>$i</option>";
							}
						?>
						</select>
					</div>
					
					<div class="select_style">
    					<select name="mm" required>
       						<option>Month</option>
       						<?php
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","NOv","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
                                echo"<option value='$i'> $mon</option>";		
                            }
                        ?>
                        </select>
					</div>
					
					<div class="select_style">
    					<select name="dd" required>
       						<option>date</option>
       						<?php
                        for($i=1;$i<=31;$i++){
                        ?>
                        <option value="<?php echo $i; ?>">
                        <?php
                        if($i<10)
                            echo"0".$i;
                        else
                            echo"$i";	  
						?>
						</option>	
						<?php 
						}?>
						</select>
					</div>
					
		     	</div><br><br>
		    
				
				<div class="teacher_address_pos" >
					<input type="text" name="address" class="form-control" placeholder="Address" />
				</div><br>
				
				<div class="teacher_mobile_pos">
					<input type="text" name="phone" class="form-control" placeholder="Mobile no." />
				</div><br>
				
				<div class="teacher_mail_pos">
					<input type="text" name="email" class="form-control" placeholder="Email address" />
				</div><br>

				<div class="teacher_bday_box">
					<span class="p_font">Fees Status: </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style" >
						<select name="fees_paid" required="required"  style= "width:250px;">
							<option selected disabled value="">-- select --</option>
							<option>Full Fees Paid</option>
							<option>1st Installments Paid</option>
							<option>2nd Installments Paid</option>
						</select>
					</div>
				</div><br><br>
				
				<div class="teacher_note_pos">
					<input type="text" name="note" class="form-control" placeholder="Note" />
				</div><br>
				
				<div class="teacher_btn_pos">
					<input type="submit" name="btn_sub" href="#" class="btn btn-primary btn-large" value="Register" />&nbsp;&nbsp;&nbsp;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
                                    </form>
			</div>
		</div>
	</div>
<?php
}
?>
</body>
</html>