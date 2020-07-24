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
	   <h2 class="w3-text-light-green">View Leave Details</h2>
       <hr style="width:200px" class="w3-opacity">


<table style='width:60%' border='0'>
<tr>
<td  style='width:29%'>
<div class="w3-row w3-section " style='width:100%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
	Enter Start Date:<br>
      <input class="w3-input w3-border" name="fdate" type="date" value="<?php if (isset($_POST['fdate'])) { echo $_POST['fdate']; }  ?>" required>
    </div>
</div>
</td>
<td align='center' style='width:2%'><br>
-
</td>
<td  style='width:29%'>
<div class="w3-row w3-section" style='width:100%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
	Enter End Date:<br>
      <input class="w3-input w3-border" name="tdate" type="date" value="<?php if (isset($_POST['tdate'])) { echo $_POST['tdate']; }  ?>" required>
    </div>
</div>
</td>
</tr>
</table>
<p class="w3-center">
<input type='submit' class="w3-button w3-section w3-green w3-ripple" value='Search' name='search'>
</p>
<?php
if(isset($_POST['search']))
{
	   
	   $fdate=$_POST['fdate'];
	   $tdate=$_POST['tdate'];
	   $sel="select * from ldetail where  date between '$fdate' and '$tdate'";
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
	   <th>Leave Reason</th>
	   <th>From Date</th>
       <th>To Date</th>
	   <th>Leave Applied Date</th>
	  
	  
		</tr>
    </thead>   ";
		   while($data=mysqli_fetch_array($res))
		   {
			     
				 
			  $sid=$data['sid'];
			  $sel1="select * from student where sid='$sid'";
	             $res1=$con->query($sel1);
				 $data1=mysqli_fetch_array($res1);
			  
			  $sname=$data1['sname'];
			  $course=$data1['course'];
			  $class=$data1['class'];
			  $batch=$data1['batch'];
			  $contact=$data1['contact'];
	          $date=$data['date'];
	          $leave=$data['ldetail'];
			  $fdate=$data['fdate'];
			  $tdate=$data['tdate'];
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr align='center'>
        <td width='5%'>".$sid."</td>
        <td width='10%'>".$sname."</td>
        <td width='10%'>".$leave."</td>
		<td width='10%'>".$fdate."</td>
		<td width='10%'>".$tdate."</td>
		<td width='10%'>".$date."</td>
		
	
      </tr>
      
    </tbody>";
		   }
			   
	   }
}

?></table></div></div>
<br><br><br><br>
<?php
include("footer.php");
 }
?>