<?php

$id=" ";
$opr=" ";

if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	
if(isset($_POST['btn_sub'])){
	$course=$_POST['course'];
	$faculties=$_POST['faculties'];
	

$sql_ins=mysqli_query($con, "INSERT INTO `courses`(`course_name`, `faculties_name`)
						VALUES(
							'$course',
							'$faculties' 
							)
					");
if($sql_ins==true)
    	echo "<div style='background-color: white;color: green; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
				. "<span class='p_font'>"
				. "1 Row Inserted Sucessfully"
				. "</span>"
				. "</div>";
else
    echo "<div style='background-color: white;color: red; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
    . "<span class='p_font'>"
    . "Insert Error:". mysqli_error($con)
    . "</span>"
    . "</div>";

	
}

//------------------update data----------
if(isset($_POST['btn_upd'])){
	$course=$_POST['course'];
	$faculties=$_POST['faculties'];

	$sql_update=mysqli_query($con, "UPDATE courses SET	
							course_name='$course' ,
							faculties_name='$faculties'  
						WHERE course_id=$id

					");
					
if($sql_update==true){

echo "<div style='background-color: white; color: green; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";

}
else
	// $msg="Update Fail!...";	
	// header('location:everyone.php?tag=view_course');
  echo "<div style='background-color: white; color: red; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Update Fail!..." . mysqli_error($con)
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
	$sql_upd=mysqli_query($con, "SELECT * FROM courses WHERE course_id=$id");
	$rs_upd=mysqli_fetch_array($sql_upd);
	
?>
    <div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-globe"></span> Course Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can update the Course records into Database.</p>
			</div><br><br>
                  <form method="post">    
    
                      <div class="teacher_note_pos" style="margin:auto;">
                        <input type="text" class="form-control" name="course" id="textbox" value="<?php echo $rs_upd['course_name'];?>" />
                      </div><br>

                      <div class="teacher_bday_box" style="margin-left: 0px;">
					            <span class="p_font" style="font-weight: bold;">Faculties Name : </span>&nbsp;&nbsp;&nbsp;
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
                
               
                
                      <div>
                        <a href="View_Course.php">
                        <input type="submit" class="btn btn-primary btn-large" name="btn_upd" value="Update" id="button-in"  /></a>
                        <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>
                      </div>    
       </div>
    
        </form>
    
    </div><!-- end of style_informatios -->
    
    <?php
}
else
{
?>

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-th-list"></span> Course Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can add New Course records into database.</p>
			</div><br><br>
                  <form method="post">    
                      
                      <div class="teacher_note_pos" style="margin:auto;">
                        <input class="form-control" type="text" name="course" id="textbox" placeholder='Course name'  required="required" />
                      </div><br>
                      
                      <div class="teacher_bday_box" style="margin:5px auto;">
					            <span class="p_font" style="font-weight: bold;">Faculties Name : </span>&nbsp;&nbsp;&nbsp;
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
                
                
                      <div>
                        <input type="submit" class="btn btn-primary btn-large" name="btn_sub" value="Add Now" id="button-in"  />
                        <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>
                      </div>
    
                  </form>
                      </div>
    </div><!-- end of style_informatios -->
    
<?php
}
?>
</body>
</html>