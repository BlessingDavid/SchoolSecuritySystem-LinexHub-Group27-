<!DOCTYPE html>
<html>
<title>School Security System using RFID</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <script src="jquery-1.8.2.js"></script>
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidenav to 120px */
.w3-sidenav {width: 180px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidenav (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
<script>
function myFunction(val)
	 {
		 var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      
	  document.getElementById("details").innerHTML = xhttp.responseText;
    }
  };
  
  var sid=document.getElementById("sid").value;
  xhttp.open("GET", "studetails.php?sid="+sid, true);
  xhttp.send();
	 }
 </script>
<body>
<form method="post">
<?php
	
	include("connect.php");
	 session_start();
	
	
	
	
	if(isset($_POST['sub']))
	{
		$stuid=$_POST['stuid'];
		$sel="select * from student where sid='$stuid'";
		$res=$con->query($sel);
		if(mysqli_num_rows($res)== 0)
       {
		   
	   }
	   else
	   {
		   $data= mysqli_fetch_assoc($res);
		   $sname=$data['sname'];
		   $contact=$data['contact'];
		   $today=date('Y-m-d');
		   date_default_timezone_set("Asia/Kolkata");
		   $time=date("h:i:s");
		   
		   $sq="select * from arrival where sid='$stuid' and date='$today'";
		   $rq=$con->query($sq);
		   if(mysqli_num_rows($rq)==0)
            {
		        $ins="insert into arrival values('$stuid','$sname','$contact','$today','$time','')";
                if(mysqli_query($con,$ins))
	             {
		            // echo "<script>alert('Intime inserted successfully');</script>";
					   //SMS code starts here
							  $_my_clicksend_username = "poonam.yadav677";
							  $_my_clicksend_key = "DE9138B8-8FDD-5AD7-BB86-8ADBD4511CC3";
							  //You *MUST* define the 'to', 'message' and 'senderid'
							  $to        = $contact;
							  $message   = "Student Id: ".$stuid."<br>Student Name:".$sname." arrived in school";
							  $senderid  = "XYZ";
                              $message=urlencode($message);
							  $to=urlencode($to);
							  $vars="method=http&username=$_my_clicksend_username&key=$_my_clicksend_key&to=+91" . $to ."&message=" . $message . "&senderid=" . $senderid;	
file_get_contents('https://api-mapper.clicksend.com/http/v2/send.php?method=http&username=poonam.yadav677&key=DE9138B8-8FDD-5AD7-BB86-8ADBD4511CC3&to=+91'.$to.'&message='.$message.'&senderid=XYZ');
	
                 }				
	        }
			else
			{
				$data1= mysqli_fetch_assoc($rq);
				$out=$data1['outtime'];
				$in=strtotime($data1['intime']);
				$time1=strtotime($time);
				$diff=($time1-$in)/60;
				if($out=='')
				{
					if($diff > '15')
					{
						$upd="update arrival set outtime='$time' where sid='$stuid' and date='$today'";
						if(mysqli_query($con,$upd))
	                    {
		                  echo "<script>alert('Outtime inserted successfully');</script>";
						  $_my_clicksend_username = "poonam.yadav677";
							  $_my_clicksend_key = "DE9138B8-8FDD-5AD7-BB86-8ADBD4511CC3";
							  //You *MUST* define the 'to', 'message' and 'senderid'
							  $to        = $contact;
							  $message   = "Student Id: ".$stuid."<br>Student Name:".$sname." leave from school";
							  $senderid  = "XYZ";
                             $message=urlencode($message);
							  $to=urlencode($to);
							  $vars="method=http&username=$_my_clicksend_username&key=$_my_clicksend_key&to=+91" . $to ."&message=" . $message . "&senderid=" . $senderid;

								file_get_contents('https://api-mapper.clicksend.com/http/v2/send.php?method=http&username=poonam.yadav677&key=DE9138B8-8FDD-5AD7-BB86-8ADBD4511CC3&to=+91'.$to.'&message='.$message.'&senderid=XYZ');
                        }	
					}
				}
				else
				{
					 echo "<script>alert('Please Try Again');</script>";
				}
				
			}
	   }
	}
	
	?>
<!-- Icon Bar (Sidenav - hidden on small screens) -->
<nav class="w3-sidenav w3-center w3-small w3-green w3-hide-small">
  <!-- Avatar image in top left corner -->
  <br><br><br><br>
  <a class="w3-padding-large  w3-hover-white" href="#">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a class="w3-padding-large  w3-hover-white" href="#about">
    <i class="fa fa-info w3-xxlarge"></i>
    <p>ABOUT</p>
  </a>
  
  <a class="w3-padding-large w3-hover-white" href="record.php">
    <i class="fas fa-clock w3-xxlarge"></i>
    <p>Record Arrival</p>
  </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <ul class="w3-navbar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <li class="w3-left" style="width:25% !important"><a href="#">HOME</a></li>
    <li class="w3-left" style="width:25% !important"><a href="#about">ABOUT</a></li>
    <li class="w3-left" style="width:25% !important"><a href="record.php">Record Arrival</a></li>
  </ul>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center " id="home">
    <h1 class="w3-jumbo">School Security System using RFID</h1>
    <img src="images/banner.jpg"  class="w3-image" width="800" height="800">
  </header>

  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-green">About</h2>
    <hr style="width:200px" class="w3-opacity">
    <p> This System ensures safety of the students by making their parents aware about the various important status about their students like in-time, out-time, everything about their arrival.The information about student such as in time and out time from Bus and campus will be recorded to web based system and SMS will be automatically sent to their parents that the student arrived to Bus/Campus safely.
	</p>
    
  
  <!-- Portfolio Section 
  
   <div class="w3-padding-64 w3-content" id="admin">
   <br>
    <h2 class="w3-text-light-green">Students Arrival</h2>
    <hr style="width:200px" class="w3-opacity">

     <p><input class="w3-input w3-border w3-padding-16" type="text" placeholder="Student Id"  name="sid" id='sid' style='width:50%'></p>
	 <button class='w3-btn w3-light-green w3-padding-large' type='submit' name='view'>Scan</button>-->
	
  <?php
  if(isset($_POST['view']))
	{
		$sid=$_POST['sid'];
		$sql5="select * from student where sid='$sid'";
	$res = $con->query($sql5);
	$row= mysqli_fetch_assoc($res);
	if(mysqli_num_rows($res)== 0)
  {
	  echo "<table align='center'><tr align='center'><td style='color:red'><b>No data found</b></td></tr></table>";
  }
  else
  {
	$name=$row['sname'];
	$img=$row['image'];
	$course=$row['course'];
	$batch=$row['batch'];
	$class=$row['class'];
	echo"
	<input type='hidden' value='".$sid."' name='stuid'>
	<table border='0' width='40%'>
	<tr>
	<td width='20%'>
	<img src='images/".$img."' width='100%'>
	</td>
	<td width='20%'>
	<label><b>Student&nbsp;Name:&nbsp;".$name."</b><br>
	       <b>Course&nbsp;&nbsp;: ".$course."</b><br>
		   <b>Batch&nbsp;&nbsp;: ".$batch."&nbsp;".$class."</b><br>
	</label>
	</td>
	</tr>
	<tr align='center'><td colspan='2'>
	<button class='w3-btn w3-light-green w3-padding-large' type='submit' name='sub'>
         Submit
        </button>
		</td>
		</tr>
	</table>
	";
  }
   }
		?>
		
  </div>
    <!-- Footer -->
  <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
    <p class="w3-medium">Powered by <a href="" target="_blank" class="w3-hover-text-green">School Security System using RFID</a></p>
  <!-- End footer -->
  </footer>

<!-- END PAGE CONTENT -->
</div>
</form>
</body>
</html>
