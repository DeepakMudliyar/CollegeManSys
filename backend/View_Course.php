<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysqli_query($con, "DELETE FROM courses WHERE course_id=$id");
	if($del_sql)
		echo "<div style='background-color: white; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "1 Record Deleted... !"
                . "</span>"
                . "</div>";
	else
		// $msg="Could not Delete :".mysqli_error();	
		echo "<div style='background-color: red; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
		. "<span class='p_font'>"
		. "Could not Delete :".mysqli_error()
		. "</span>"
		. "</div>";
			
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>
<div class="btn_pos">
        <form method="post">
            <input type="text" name="searchtxt" class="input_box_pos form-control" placeholder="Search name.." />
            <div class="btn_pos_search">
            <input type="submit" class="btn btn-primary btn-large" name="btnsearch" value="Search"/>&nbsp;&nbsp;
            <a href="?tag=course_entry"><input type="button" class="btn btn-large btn-primary" value="Add New Course" name="butAdd"/></a>
            </div>
        </form>
    </div><br><br>
            
            
<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">SR No.</th>
            <th style="text-align: center;">Course Name</th>
            <th style="text-align: center;">Faculties Name</th>
            <th style="text-align: center;" colspan="2">Operation</th>
      	</tr>
        	 <?php
			 $key="";
			if(isset($_POST['searchtxt']))
				$key=$_POST['searchtxt'];
			
			if($key !="")
				$sql_sel=mysqli_query($con, "SElECT * FROM courses WHERE  course_name  like '%$key%'");
			else
			 $sql_sel=mysqli_query($con, "SELECT * FROM courses");
			 
			 $i=0;
			while($row=mysqli_fetch_array($sql_sel)){
				$i++;
			?>	 
			<tr>
				<td align="center"><?php echo $i;?></td>
				<td><?php echo $row['course_name'];?></td>
				<td><?php echo $row['faculties_name'];?></td>
				<td align="center"><a href="?tag=course_entry&opr=upd&rs_id=<?php echo $row['course_id'];?>" title="Update"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/update.png" height="20" alt="Update" /></a></td>
                <td align="center"><a href="?tag=view_course&opr=del&rs_id=<?php echo $row['course_id'];?>" title="Delete"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/delete.jpg" height="20" alt="Delete" /></a></td>
			</tr>
<?php
} 
?>   
    </table>
        
    </form>
        
        </div>
        
</body>
</html>