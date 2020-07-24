<?php
session_start();
$aid= $_SESSION['aid'];
if(empty($aid))
{
	echo "<script>window.location.href='adminlogin.php'</script>";
}
else
{
	include('adminmenu.php');
	include('connect.php');
	?>
	<html>
<title>School Security System using Rfid</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<body>

<form method='POST'>
<div class="w3-padding-large" id="main">
<div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about"  style='width:90%'>
    <center>
	   <h2 class="w3-text-light-green">View Student Details</h2>
       <hr style="width:200px" class="w3-opacity">
	   <?php
	   $sel="select * from student";
	   $res=$con->query($sel);
	   if(mysqli_num_rows($res)==0)
	   {
		  echo "<table align='center'><tr align='center'><td style='color:red'><b>No data found</b></td></tr></table>";
	   }
	   else
	   {
		   echo"
		   <div class='w3-container'>
	   <table class='w3-table-all w3-hoverable' border='1' cellspacing='0' cellpadding='0' width='95%' >
	   <thead>
        <tr class='w3-light-green'>
	   <th>Stu_Id</th>
	   <th>Stu_Name</th>
	   <th>Course</th>
	   <th>Batch</th>
	   <th>Class</th>
	   <th>Image</th>
       <th>Address</th>
	   <th>Parent</th>
	   <th>Contact</th>
	   <th>Update</th>
	   <th>Delete</th>
		</tr>
    </thead>   ";
		   while($data=mysqli_fetch_array($res))
		   {
			  $sid=$data['sid'];
			  $sname=$data['sname'];
			  $course=$data['course'];
			  $class=$data['class'];
			  $batch=$data['batch'];
			  $image=$data['image'];
	          $contact=$data['contact'];
	          $address=$data['address'];
			  $pname=$data['pname'];
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr align='center'>
        <td width='5%'>".$sid."</td>
        <td width='10%'>".$sname."</td>
        <td width='10%'>".$course."</td>
		<td width='10%'>".$batch."</td>
		<td width='10%'>".$class."</td>
		<td width='10%'><img src='images/".$image."' width='50px'></td>
		<td width='10%'>".$address."</td>
		<td width='10%'>".$pname."</td>
		<td width='10%'>".$contact."</td>
		<td width='5%'>
		<a href='updatestu.php?sid=".$sid."' style='font-weight:bold;color:green'>
         Update
        </a>
		</td>
		<td width='5%'>
		<a href='deletestu.php?sid=".$sid."' style='font-weight:bold;color:green'>
         Delete
        </a>
		</td>
      </tr>
      
    </tbody>";
		   }
			   
	   }
	   
	   ?>
	   </table>
	   </div>
	   </div>
	   </div>
	   </form>
	   </body>
	   <br><br><br>
<?php
include("footer.php");
}
?>