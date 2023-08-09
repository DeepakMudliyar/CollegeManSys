<!--for delete Record -->
<?php
	$msg="";
	$opr="";
    $faculties="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysqli_query($con, "DELETE FROM teacher_tbl WHERE teacher_id=$id");
	if($del_sql)
		echo "<div style='background-color: white; color: green; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "1 Record Deleted... !"
                . "</span>"
                . "</div>";
	else
		// $msg="Could not Delete :".mysqli_error();	
        echo "<div style='background-color: white; color: red; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
        . "<span class='p_font'>"
        . "Could not Delete :"
        . "</span>"
        . "</div>";
			
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>

    <div class="btn_pos" style="margin: 5px auto;">
            <div>
            <a href="?tag=teachers_entry"><input type="button" class="btn btn-large btn-primary" value="Register new" name="butAdd"/></a>
            </div>
    </div><br><br>
    <form method="post">
<div class="teacher_bday_box" style="margin: 5px auto;">
				<span class="p_font" style="font-weight:bold;">Select Faculties Name : </span>&nbsp;&nbsp;&nbsp;

					<div class="select_style">
    					<select name="faculties" required style="width: 400px; height:30px;">
                                            <option value="" selected disabled>-- select --</option>
                            <?php
                               $faculties_name=mysqli_query($con, "SELECT * FROM facuties_tbl");
							   while($row=mysqli_fetch_array($faculties_name)){
								?>
                        		<option> <?php echo $row['faculties_name'];?> </option>
                                <?php 
							   }
                            ?>
                    	</select>&nbsp;&nbsp;
                        <input type="submit" name="btn_find" class="btn btn-primary btn-large" value="Find"/>
                    </div>

 			</div><br>


                            </form>
          <div><h1><span class="glyphicon glyphicon-user"></span> List of Teachers under the particular Faculties</h1></div>

<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">No.</th>
            <th style="text-align: center;">Teacher Name</th>
            <th style="text-align: center;">Faculties Name</th>
            <th style="text-align: center;">Gender</th>
            <th style="text-align: center;">Date of Birth</th>
            <th style="text-align: center;">Address</th>
            <th style="text-align: center;">Phone</th>
            <th style="text-align: center;">E-mail</th>
            <th style="text-align: center;" colspan="2">Operation</th>
        </tr>
        </thead>
         <?php
	// 	 $key="";
	// if(isset($_POST['searchtxt']))
	// 	$key=$_POST['searchtxt'];
	
	// if($key !="")
	// 	$sql_sel=mysqli_query($con, "SElECT * FROM teacher_tbl WHERE f_name  like '%$key%' or l_name like '%$key%'");
	// else
    //     $sql_sel=mysqli_query($con, "SELECT * FROM teacher_tbl");
	

	if(isset($_POST['btn_find']))
    $faculties=$_POST['faculties'];
   
                $sql_sel=mysqli_query($con,"SELECT * FROM `teacher_tbl` WHERE `faculties_name`= '$faculties'");
    if($faculties!=""){
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    ?>
      <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['f_name']."    ".$row['l_name'];?></td>
            <td><?php echo $row['faculties_name'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['dob'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><a href="?tag=teachers_entry&opr=upd&rs_id=<?php echo $row['teacher_id'];?>" title="Upate"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/update.png" height="20" alt="Update" /></a></td>
            <td><a href="?tag=view_teachers&opr=del&rs_id=<?php echo $row['teacher_id'];?>" title="Delete"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/delete.jpg" height="20" alt="Delete" /></a></td>
        </tr>
    <?php	
    }
}
    ?>
    </table>

</div>
</body>
</html>

<!--
<td><a href="?tag=teachers_entry"><input type="button" title="Add new Teachers" name="butAdd" value="Add New" id="button-search" /></a></td>
        <td><input type="text" name="searchtxt" title="Enter name for search " class="search" autocomplete="off"/></td>
        <td style="float:right"><input type="submit" name="btnsearch" value="Search" id="button-search" title="Search Teacher" /></td>

-->