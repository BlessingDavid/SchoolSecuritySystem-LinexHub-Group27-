<?php
 include("connect.php");
 $sid=$_GET['sid'];
 $sql="Delete from student where sid='$sid'";

 if(mysqli_query($con,$sql))
 {
	 echo "<script>location.replace('viewstu.php')</script>" ;
 }
 else
 {
	 
 }
 ?>