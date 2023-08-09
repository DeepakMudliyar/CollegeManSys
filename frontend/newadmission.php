<?php	
$con = mysqli_connect("localhost","root", "") or die("No Connection");
mysqli_select_db($con, "deepak") or die("No Database connected!");

if(isset($_POST['submit'])){
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$father_name=$_POST['father_name'];
$mother_name=$_POST['mother_name'];
$dob=$_POST['dd']." / ".$_POST['mm']." / ".$_POST['yy'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$city=$_POST['city'];
$pincode=$_POST['pincode'];
$state=$_POST['state'];
$classX_board=$_POST['classX_board'];
$classX_per=$_POST['classX_%'];
$classX_yop=$_POST['classX_yop'];
$classXII_board=$_POST['classXII_board'];
$classXII_per=$_POST['classXII_%'];
$classXII_yop=$_POST['classXII_yop'];
$course=$_POST['course'];

$target_dir = "uploads/";
$target_photo= $target_dir . "photo" . $f_name . $l_name .basename($_FILES["photo"]["name"]);
$target_X_marksheet= $target_dir . "Xmarksheet" . $f_name . $l_name .basename($_FILES["classX_doc"]["name"]);
$target_XII_marksheet= $target_dir . "XIImarksheet" . $f_name . $l_name .basename($_FILES["classXII_doc"]["name"]);

$photo_url = move_uploaded_file($_FILES["photo"]["tmp_name"], $target_photo);
$X_marksheet_url = move_uploaded_file($_FILES["classX_doc"]["tmp_name"], $target_X_marksheet);
$XII_marksheet_url = move_uploaded_file($_FILES["classXII_doc"]["tmp_name"], $target_XII_marksheet);


$sql_ins=mysqli_query($con, "INSERT INTO `new_appilcations_tbl`(`f_name`, `l_name`, `father_name`, `mother_name`, `dob`, `email`, `phone`, 
                        `gender`, `address`, `city`, `pincode`, `state`, `X_board`, `X_%`, `X_yop`, `XII_board`, `XII_%`, `XII_yop`,
                        `course`, `photo`, `X_marksheet`, `XII_marksheet` )
						VALUES(
                            '$f_name',
                            '$l_name',
                            '$father_name',
                            '$mother_name',
                            '$dob',
                            '$email',
                            '$phone',
                            '$gender',
                            '$address',
                            '$city',
                            '$pincode',
                            '$state',
                            '$classX_board',
                            '$classX_per',
                            '$classX_yop',
                            '$classXII_board',
                            '$classXII_per',	
                            '$classXII_yop',
                            '$course',
                            '$target_photo',
                            '$target_X_marksheet',
                            '$target_XII_marksheet'
							)
					");
if($sql_ins==true)
	echo "<div style='background-color: green;color: white; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
				. "<span class='p_font'>"
				. "Application Submitted Successfully"
				. "</span>"
				. "</div>";
else
	echo "<div style='background-color: red;color: white; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
				. "<span class='p_font'>"
				. "Insert Error:". mysqli_error($con)
				. "</span>"
				. "</div>";
	
}
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
  color:SlateBlue;
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
  background-color: lightgrey; 
  border-collapse: collapse; 
  border: 2px solid navy
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

    <hr>
    <div style="text-align:center;  background-color:lightblue;">
           <h2 style="margin-right:50px;">&nbsp; &nbsp;&nbsp; &nbsp; <br>View Application:</h2>
           <form action="view_application.php" method="post">
           <input type="text" name="f_name" maxlength="30" placeholder="First Name" required="required"/> &nbsp; &nbsp;
           <input type="text" name="l_name" maxlength="30" placeholder="Last Name" required="required"/> <br> <br>
           <input type="submit" name="find" value="Find" required="required"/>
           </form><br>  
    </div>
    <hr>

<form method="POST" enctype="multipart/form-data">
<h3 style="text-align:center;">STUDENT APPLICATION FORM</h3>



 
<table align="center" cellpadding = "10" style="background-color:lightgrey;">
 
<!----- First Name ---------------------------------------------------------->
<tr>
<td>FIRST NAME</td>
<td><input type="text" name="f_name" maxlength="30" required="required"/>
(max 30 characters a-z and A-Z)

</td>
</tr>
 
<!----- Last Name ---------------------------------------------------------->
<tr>
<td>LAST NAME</td>
<td><input type="text" name="l_name" maxlength="30" required="required"/>
(max 30 characters a-z and A-Z)
</td>
</tr>

<!----- Parents Name ---------------------------------------------------------->
<tr>
<td>FATHER's NAME</td>
<td><input type="text" name="father_name" maxlength="30" required="required"/>
(max 30 characters a-z and A-Z)
</td>
</tr>

<tr>
<td>MOTHER's NAME</td>
<td><input type="text" name="mother_name" maxlength="30" required="required"/>
(max 30 characters a-z and A-Z) 
</td>
</tr>
 
<!----- Date Of Birth -------------------------------------------------------->
<tr>
<td>DATE OF BIRTH</td>
 
<td>
<select name="dd" id="Birthday_Day" required="required">
<option value="-1">Day:</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
 
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
 
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
 
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
 
<option value="31">31</option>
</select>
 
<select id="Birthday_Month" name="mm" required="required">
<option value="-1">Month:</option>
<option value="January">Jan</option>
<option value="February">Feb</option>
<option value="March">Mar</option>
<option value="April">Apr</option>
<option value="May">May</option>
<option value="June">Jun</option>
<option value="July">Jul</option>
<option value="August">Aug</option>
<option value="September">Sep</option>
<option value="October">Oct</option>
<option value="November">Nov</option>
<option value="December">Dec</option>
</select>
 
<select name="yy" id="Birthday_Year" required="required">
 
<option value="-1">Year:</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
 
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
 
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
</select>
</td>
</tr>
 
<!----- Email Id ---------------------------------------------------------->
<tr>
<td>EMAIL ID</td>
<td><input type="text" name="email" maxlength="100" required="required"/></td>
</tr>
 
<!----- Mobile Number ---------------------------------------------------------->
<tr>
<td>MOBILE NUMBER</td>
<td>
<input type="number" name="phone" maxlength="10" required="required"/>
(10 digit number)
</td>
</tr>
 
<!----- Gender ----------------------------------------------------------->
<tr>
<td>GENDER</td>
<td>
Male <input type="radio" name="gender" value="Male" />
Female <input type="radio" name="gender" value="Female" />
</td>
</tr>
 
<!----- Address ---------------------------------------------------------->
<tr>
<td>ADDRESS <br /><br /><br /></td>
<td><textarea name="address" rows="4" cols="30" required="required"></textarea></td>
</tr>
 
<!----- City ---------------------------------------------------------->
<tr>
<td>CITY</td>
<td><input type="text" name="city" maxlength="30" required="required"/>
(max 30 characters a-z and A-Z)
</td>
</tr>
 
<!----- Pin Code ---------------------------------------------------------->
<tr>
<td>PIN CODE</td>
<td><input type="text" name="pincode" maxlength="6" />
(6 digit number)
</td>
</tr>
 
<!----- State ---------------------------------------------------------->
<tr>
<td>STATE</td>
<td><input type="text" name="state" maxlength="30" required="required"/>
(max 30 characters a-z and A-Z)
</td>
</tr>
 
<!----- Country ---------------------------------------------------------->
<tr>
<td>COUNTRY</td>
<td><input type="text" name="Country" value="India" readonly="readonly" required="required" /></td>
</tr>
 
<!----- Qualification---------------------------------------------------------->
<tr>
<td>QUALIFICATIONS <br /><br /><br /><br /><br /><br /><br /></td>
 
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
<td><input type="text" name="classX_board" maxlength="30" required="required" /></td>
<td><input type="text" name="classX_%" maxlength="30" required="required" /></td>
<td><input type="text" name="classX_yop" maxlength="30" required="required" /></td>
</tr>
 
<tr>
<td>2</td>
<td>Class XII</td>
<td><input type="text" name="classXII_board" maxlength="30"  required="required"/></td>
<td><input type="text" name="classXII_%" maxlength="30" required="required"/></td>
<td><input type="text" name="classXII_yop" maxlength="30" required="required"/></td>
</tr>
 
<tr>
<td></td>
<td></td>
<td align="center">(100 char max)</td>
<td align="center">(upto 2 decimal)</td>
</tr>
</table>
 
</td>
</tr>
 
<!----- Course ---------------------------------------------------------->
<tr>
<td>COURSES<br />APPLYING FOR</td>
<td>
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
</td>
</tr>
<!----- Upload Doucments ---------------------------------------------------------->
<tr>
<td>UPLOAD  <br> DOCUMENTS</td>
<td><br><br><br><br>Upload your Photo: &nbsp;&nbsp;&nbsp;
<input type="file" id="photo" name="photo" accept="image/*"><br><br>
Upload Class X Marksheet: &nbsp;&nbsp;&nbsp;
<input type="file" id="photo" name="classX_doc" accept="image/*, .pdf,.jpg, .jpeg, .doc"><br><br>
Upload Class XII Marksheet: &nbsp;&nbsp;&nbsp;
<input type="file" id="photo" name="classXII_doc" accept="image/*, .pdf,.jpg, .jpeg, .doc"><br><br>
</td>
</tr>
 
<!----- Submit and Reset ------------------------------------------------->
<tr>
<td colspan="2" align="center">
<input type="submit" value="Submit" name="submit">
<input type="reset" value="Reset">
</td>
</tr>
</table>
 
</form>




 
</body>
</html>