<?php
session_start();
$sid= $_SESSION['sid'];
if(empty($sid))
{
	echo "<script>window.location.href='parentlogin.php'</script>";
}
else
{
	include('parentmenu.php');
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
	   <h2 class="w3-text-light-green">Leave Application</h2>
       <hr style="width:200px" class="w3-opacity">
	   
	   <div class="w3-row w3-section" style='width:60%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">Enter Leave reason
     <textarea name='leave' class="w3-input w3-border" required></textarea>
    </div>
</div>

<table style='width:60%' border='0'>
<tr>
<td  style='width:29%'>
<div class="w3-row w3-section " style='width:100%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
	Enter From Date:<br>
      <input class="w3-input w3-border" name="fdate" type="date" required>
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
	Enter To Date:<br>
      <input class="w3-input w3-border" name="tdate" type="date" required>
    </div>
</div>
</td>
</tr>
</table>
<p class="w3-center">
<input type='submit' class="w3-button w3-section w3-green w3-ripple" value='Submit' name='sub'>
</p>
<?php
if(isset($_POST['sub']))
{
	   $leave=$_POST['leave'];
	   $today=date('Y-m-d');
	   $fdate=$_POST['fdate'];
	   $tdate=$_POST['tdate'];
	   $sql="Insert into ldetail values('$sid','$leave','$fdate','$tdate','$today')";
	if(mysqli_query($con,$sql))
	  {
		echo "<script>alert('Leave Application submitted successfully');</script>";
      }
}

?>
</div></div><?php
include("footer.php");
 }
?>