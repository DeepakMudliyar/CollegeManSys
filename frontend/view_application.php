<?php	
$con = mysqli_connect("localhost","root", "") or die("No Connection");
mysqli_select_db($con, "deepak") or die("No Database connected!");

?>

<html>
<head>
<title>Student Application Form</title>
<!-- <link rel="stylesheet" href="style.css"> -->
<style>
.header {
    display: flex;
    width: 100%;
    justify-content: center;
    align-items: center;
}
.collegeNameTitle h3 {
    float: right;
    position: fixed;
    font-weight: 900;
}
h3{
  font-family: Calibri; 
  font-size: 25pt;         
  font-style: normal; 
  font-weight: bold; 
  color:black;
  text-align: center; 
  text-decoration: underline
}

table{
  width: 55vw;
  font-family: Calibri; 
  color:black; 
  font-size: 11pt; 
  font-style: normal;
  font-weight: bold;
  text-align:; 
  background-color: white; 
  border-collapse: collapse; 
  border: 2px solid ;
}
table.inner{
  border: 0px;
}
</style>

</head>
 
<body>

    <div class="header">
        <div class="collegeLogo">
            <img src="images/collegelogo.jpg" alt="Logo" width=100px>
        </div>
        <div class="collegeNameTitle">
            <h1 style=display:inline>Deepak and Vijay College Of Arts Commerce and Science</h1>
        </div>
        <div class="naacLogo" width=10px>
            <img src="images/NAAClogo.jpg" alt="NAAC_Logo">
        </div>
    </div>
<?php
if(isset($_POST['find'])){
    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];

     
    $sql_sel=mysqli_query($con, "SELECT * FROM new_appilcations_tbl WHERE f_name='$f_name' AND l_name='$l_name' ");
    $row=mysqli_fetch_array($sql_sel);

// if($row!=true){
// 	echo "<div style='background-color: red ;color: white; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
// 				. "<span class='p_font'>"
// 				. "Application Not Found..."
// 				. "</span>"
// 				. "</div>";
//             }

// else{



?>
<form>
<?php
$row;
?>
<h3 style="text-align:center;">STUDENT APPLICATION FORM</h3>
<h3 style="text-align:center;"><?php echo $row['course'];?></h3>



 
<table align="center" cellpadding = "10" style="background-color:lightgrey;">
 
<!-- <tr style="display:inline-block; float:right;">
<td rowspan="all" align="right"><img src="<?php echo $row['photo'];?>" alt="student's photo" width="75px" height="100px"></td>
</tr> -->
<tr>

</tr>

<!----- Student Name ---------------------------------------------------------->
<tr>
<td>STUDENT NAME:</td>
<td><input type="text" value="<?php echo $row['f_name']. "   " .$row['l_name'];?>" readonly /></td>
<td align="right" style="display:inline-block; margin: 0px 30px;"><img src="<?php echo $row['photo'];?>" alt="student's photo" width="120px" height="120px">  
</td>
</tr>
 
<!----- Parents Nam ---------------------------------------------------------->
<tr>
<td>FATHER NAME:</td>
<td><input type="text" value="<?php echo $row['father_name'];?>" readonly /></td>
<td align="right" style="display:inline-block; margin: 0px 30px; "> <strong> Application No.</strong> &nbsp;&nbsp;&nbsp; <input type="text" value="<?php echo $row['a_no']; ?>" readonly style="width:120px; height:25px; text-align:center;" />
</tr>

<tr>
<td>MOTHER NAME:</td>
<td><input type="text" value="<?php echo $row['mother_name'];?>" readonly /></td>
<td align="right" style="display:inline-block; margin: 0px 30px;">
</tr>
 

<!----- Date Of Birth -------------------------------------------------------->
<tr>
<td>DATE OF <br>BIRTH: </td>
<td><input type="text" value="<?php echo $row['dob'];?>" readonly /></td>
</tr>
<!----- Email Id ---------------------------------------------------------->
<tr>
<td>EMAIL ID : </td>
<td><input type="text" value="<?php echo $row['email'];?>" readonly /></td>
</tr>
 
<!----- Mobile Number ---------------------------------------------------------->
<tr>
<td>MOBILE NUMBER: </td>
<td><input type="text" value="<?php echo $row['phone'];?>" readonly /></td>
</tr>
 
<!----- Gender ----------------------------------------------------------->
<tr>
<td>GENDER: </td>
<td><input type="text" value="<?php echo $row['gender'];?>" readonly /></td>
</tr>
 
<!----- Address ---------------------------------------------------------->
<tr>
<td>ADDRESS: <br /><br /><br /></td>
<td> <textarea cols="50" rows="8" readonly><?php echo $row['address'] . "  " . $row['city'] . "- " .  $row['pincode'] . "  " .  $row['state'] . " India";?></textarea> </td>
</tr>
 
<!----- Qualification---------------------------------------------------------->
<tr>
<td>QUALIFICATIONS: <br /><br /><br /><br /><br /><br /><br /></td>
 
<td>
<table>
 
<tr>
<td align="center"><b>Sr.No.</b></td>
<td align="center"><b>Examination</b></td>
<td align="center"><b>Board</b></td>
<td align="center"><b>Percentage</b></td>
<td align="center"><b>Year of Passing</b></td>
</tr>
 
<tr>
<td>1</td>
<td>Class X</td>
<td><input type="text" value="<?php echo $row['X_board']; ?>" readonly /></td>
<td><input type="text" value="<?php echo $row['X_%']; ?>" readonly /></td>
<td><input type="text" value="<?php echo $row['X_yop']; ?>" readonly /></td>
</tr>
 
<tr>
<td>2</td>
<td>Class XII</td>
<td><input type="text" value="<?php echo $row['XII_board']; ?>" readonly /></td>
<td><input type="text" value="<?php echo $row['XII_%']; ?>" readonly /></td>
<td><input type="text" value="<?php echo $row['XII_yop']; ?>" readonly /></td><br>
</tr><br>
 
</table>
 
 
<!----- Print Button ------------------------------------------------->
<tr>
<td colspan="2" align="center">
<input type="submit" value="Print" name="print" onclick="window.print();" ></td>
</tr>
</table>
 
</form>

<?php
}
// }
?>


 
</body>
</html>