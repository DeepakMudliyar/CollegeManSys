<?php
$id="";
$opr="";
if(isset($_REQUEST['opr']))
	$opr=$_REQUEST['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	

//------------------Insert operation PHP code ----------
if(isset($_REQUEST['btn_sub'])){
	$facuties_name=$_REQUEST['fnametxt'];
	$note1=$_POST['notetxt'];	
	

$sql_ins=mysqli_query($con, "INSERT INTO facuties_tbl (
	                  faculties_name, note) 
					  VALUES ('$facuties_name', '$note1');
					");
if($sql_ins==true){
	// $msg="1 Row Inserted";
	echo "<div style='background-color: white;color: green; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "1 Row Inserted Sucessfully"
                . "</span>"
                . "</div>";
}
else{
	// $msg="Insert Error:".mysqli_error($con);
	echo "<div style='background-color: white;color: red; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Insert Error: Record not Inserted please try again"
                . "</span>"
                . "</div>";
}
}
	

//------------------Update operation PHP code----------
if(isset($_REQUEST['btn_upd'])){
	// $id = $_POST['faculties_id'];
	$fac_name=$_REQUEST['fnametxt'];
	$note=$_POST['notetxt'];	

	// if(isset($_REQUEST['btn_upd'])){
	// 	if($_REQUEST['fnametxt']=="") || ($_REQUEST['note']==""){	
	// 		echo '<small> Please Fill all Fields...</small><hr>';
	// 	}
//   }
	
	$sql_update=mysqli_query( $con, "UPDATE facuties_tbl SET 
							    faculties_name='$fac_name',
								note='$note'
							WHERE
							faculties_id = '$id'
							");
	if($sql_update==true)
		echo "<div style='background-color: white; color: green; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";
	else
		// $msg="Update Failed...!";
		echo "<div style='background-color: white;color: red; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Update Failed...!"
                . "</span>"
                . "</div>";
	}

	   
?>

<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>

	<?php

if($opr=="upd")	
{
	$sql_upd=mysqli_query($con, "SELECT * FROM facuties_tbl WHERE faculties_id='$id' ");
	$rs_upd=mysqli_fetch_array($sql_upd);	
	
?>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h1><span class="glyphicon glyphicon-hdd"></span> Faculties Update Form</h1>
		</div>
		<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update the faculties detail to record into database.</p>
			</div>

			<div class="container_form">
				<form method="post">
					<div class='faculty_pos'>

						<input type="text" style="width: 250px;" class="form-control" name="fnametxt"
							value="<?php echo $rs_upd['faculties_name'];?>" /><br>

						<textarea name="notetxt" class="form-control" cols="18"
							rows="4"><?php echo $rs_upd['note'];?></textarea><br><Br>
						



						<input type="submit" name="btn_upd" href="#" class="btn btn-primary btn-large"
							value="Update" />&nbsp;&nbsp;&nbsp;
						<input type="reset" href="#" class="btn btn-primary btn-large" value="Cancel" />
					</div>
				</form>
			</div>

<?php	
}
else
{
?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1><span class="glyphicon glyphicon-hdd"></span> Faculties Entry Form</h1>
				</div>
				<div class="panel-body">
					<div class="container">
						<p style="text-align:center;">Here, you can add new facultie's detail to record into database.
						</p>
					</div>


					<div class="container_form">
						<form method="post">
							<div class='faculty_pos'>

								<input type="text" style="width: 250px;" class="form-control" name="fnametxt"
									placeholder='Faculties name' /><br>

								<textarea name="notetxt" class="form-control" cols="18" placeholder='Add notes..'
									rows="4"></textarea><br><Br>

								 <a href="View_Faculties.php">  <input type="submit" name="btn_sub" class="btn btn-primary btn-large"
									value="Register" /></a> &nbsp;&nbsp;&nbsp;
								<input type="reset" href="View_Faculties.php" class="btn btn-primary btn-large" value="Cancel" />
							</div>
						</form> 
					</div><!-- end of style_informatios --
<?php
}
?>
</body>

</html>