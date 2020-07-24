<?php
include('connect.php');
$sid=$_GET['sid'];
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
?>