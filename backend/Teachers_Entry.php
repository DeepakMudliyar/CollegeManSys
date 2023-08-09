<?php

	$msg="";
	$opr="";
	$id="";
	
	if(isset($_GET['opr'])){
	$opr=$_GET['opr'];}
	
if(isset($_GET['rs_id'])){
	$id=$_GET['rs_id'];}
	
//--------------add data-----------------
if(isset($_POST['btn_sub'])){
	$f_name=$_POST['f_name'];
	$l_name=$_POST['l_name'];
	$faculties=$_POST['faculties'];
	$gender=$_POST['gender'];
	$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$mail=$_POST['email'];

$sql_ins=mysqli_query($con, "INSERT INTO teacher_tbl
						VALUES(
							NULL,
							'$f_name',
							'$l_name' ,
							'$faculties' ,
							'$gender',
							'$dob',
							'$address',
							'$phone',
							'$mail'
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
				. "Insert Error:". mysqli_error($con)
				. "</span>"
				. "</div>";
	}
//------------------update data----------
if(isset($_POST['btn_upd'])){
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$faculties=$_POST['faculties'];
$gender=$_POST['gender'];
$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$mail=$_POST['email'];


$sql_update=mysqli_query($con,"UPDATE teacher_tbl SET
                        f_name='$f_name' ,
                        l_name='$l_name' ,
						faculties_name='$faculties' ,
                        gender='$gender' ,
                        dob='$dob' ,
                        address='$address' ,
                        phone='$phone' ,
                        email='$mail' 
                    WHERE teacher_id=$id

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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Welcome to College Management system</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>

<?php
if($opr=="upd")
{
	$sql1_upd=mysqli_query($con,"SELECT * FROM teacher_tbl WHERE teacher_id=$id");
	$rs_upd=mysqli_fetch_array($sql1_upd);
	list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Teachers Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can update the teachers records into database.</p>
			</div>


<div class="container_form">
    <form method="post">
				<div class="teacher_name_pos">
					<input type="text" name="f_name" class="form-control" value="<?php echo $rs_upd['f_name'];?>" />
					<input type="text" name="l_name" class="form-control" value="<?php echo $rs_upd['l_name'];?>" />
				</div><br>

				<div class="teacher_bday_box" >
					            <span class="p_font">Faculties Name : </span>&nbsp;&nbsp;&nbsp;
					                <div class="select_style">
                                <select name="faculties" style="width: 300px">  
                                    <option disabled>-- select --</option>
                          <?php
                          $fac_name=mysqli_query($con,"SELECT * FROM facuties_tbl");
								          while($row=mysqli_fetch_array($fac_name)){
								        	if($row['faculties_name']==$rs_upd['faculties_name'])
								   	      	$iselect="selected";
								        	else
									      	$iselect="";
							          	?>
                                <option <?php echo $iselect?> > <?php echo $row['faculties_name'];?> </option>
                                	
								        <?php	
								        	}
                                        ?>
                                        </select>
                                        </div>
                 </div><br><br>
				
				<div class="teacher_radio_pos">
					<input type="radio" name="gender" value="Male"<?php if($rs_upd['gender']=="Male") echo "checked";?> /> <span class="p_font">&nbsp;Male</span>
					<input type="radio" name="gender" value="Female"<?php if($rs_upd['gender']=="Female") echo "checked";?> /> <span class="p_font">&nbsp;Female</span>
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
					</div>
					
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
                        ?>                        </select>
					</div>
					
					<div class="select_style">
    					<select name="dd">
       						<option>date</option>
       						<?php
						$sel="";
                        for($i=1;$i<=31;$i++){
							if($i==$d)
							$sel="selected='selected'";
							else
								$sel="";
                        ?>
                        <option value="<?php echo $i ;?>"<?php echo $sel ;?> >
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
					<input type="text" name="address" class="form-control" value=" <?php echo $rs_upd['address'];?>" />
				</div><br>
				
				<div class="teacher_mobile_pos">
					<input type="text" name="phone" class="form-control" value="<?php echo $rs_upd['phone'];?>" />
				</div><br>
				
				<div class="teacher_mail_pos">
					<input type="text" name="email" class="form-control" value="<?php echo $rs_upd['email'];?>" />
				</div><br>
				
				<div class="teacher_btn_pos">
					<input type="submit" name="btn_upd" class="btn btn-primary btn-large" value="Update" />&nbsp;&nbsp;&nbsp;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
                                    </form>
			</div>
		</div>
	</div>
<?php	
}
else
{
?>
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Teachers Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can add new teachers detail to record into database.</p>
			</div>

<div class="container_form">
    <form method="post">
				<div class="teacher_name_pos">
					<input type="text" name="f_name" class="form-control" placeholder="First name" />
					<input type="text" name="l_name" class="form-control" placeholder="Last name" />
				</div><br>
				
				<div class="teacher_bday_box">
					<span class="p_font">Faculties Name : </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style" >
    					<select name="faculties" required="required" style= " width:280px;">
							<option selected disabled>-- select --</option>

						<?php
							$result = mysqli_query($con, "SELECT * FROM facuties_tbl");
							while ( $row= mysqli_fetch_array($result)){
								echo "<option>".$row['faculties_name']."</option>";
							}
						?>
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
    					<select name="yy">
       						<option>Year</option>
       						<?php
							for($i=1985;$i<=2015;$i++){	
							echo"<option value='$i'>$i</option>";
							}
						?>
						</select>
					</div>
					
					<div class="select_style">
    					<select name="mm">
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
    					<select name="dd">
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
				
				<div class="teacher_address_pos">
					<input type="text" name="address" class="form-control" placeholder="Address" />
				</div><br>
				
				<div class="teacher_mobile_pos">
					<input type="text" name="phone" class="form-control" placeholder="Mobile no." />
				</div><br>
				
				<div class="teacher_mail_pos">
					<input type="text" name="email" class="form-control" placeholder="Email address" />
				</div><br>
				
				<div class="teacher_btn_pos">
					<input type="submit" name="btn_sub" href="#" class="btn btn-primary btn-large" value="Add Now" />&nbsp;&nbsp;&nbsp;
					<a href="/everyone.php?tag=view_teachers">
					<input type="reset"  class="btn btn-primary btn-large" value="Cancel" /> </a>
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