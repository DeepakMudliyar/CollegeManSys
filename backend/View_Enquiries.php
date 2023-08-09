<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>
            <div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> List of peoples who enquired or sent message</h1></div>


<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Student/Staff</th>
            <th style="text-align: center;">Email</th>
            <th style="text-align: center;">phone</th>
            <th style="text-align: center;">Message</th>
            </tr>
        </thead>
        
         <?php
                $sql_sel=mysqli_query($con,"SELECT * FROM enquiries_tbl ");
	
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    ?>
      <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['student/staff'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td><?php echo $row['message'];?></td>
        </tr>
        <?php
    }
    ?>
</table>
</div><!--end of content_input -->
</body>
</html>