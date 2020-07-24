<?php
session_start();
include('connect.php');

 if(empty($_SESSION['aid']))
 {
	 echo "<script>window.location.href='adminlogin.php'</script>";
 }
 else
 {
    include('adminmenu.php');
	 
	
?>

<script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="jquery.validate.min.js"></script>
  <script>
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#myForm").validate({
    
        // Specify the validation rules
        rules: {
			    sid: "required",
				sname: "required",
				course: "required",
				address: "required",
				pname: "required",
				username: "required",
				password: "required",
				room: "required",
				email: {
                required: true,
                email: true
				},
				contact:{
				required:true,
				minlength:8,
				maxlength:16,
				number: true
				},		
			},
		
        
        // Specify the validation error messages
        messages: {
			  sid: "<label><h5>Please Enter Student ID!</h5></label>",
            sname: "<label><h5>Please Enter Student Name!</h5></label>",
			lname: "<label><h5>Please enter last name!</h5></label>",
            address:"<label><h5>Please enter address</h5></label>",
			pname:"<label><h5>Please enter parent name</h5></label>",
			username:"<label><h5>Please Enter username</h5></label>",
			email:"<label><h5>Please enter valid email Address!</h5></label>",
			contact:"<label><h5>Please enter Valid Contact No!</h5></label>",
			password:"<label><h5>Please enter Password</h5></label>",
			room: "<label><h5>Please enter Room number</h5></label>",
		
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>

<body>
<form method="post" id='myForm' novalidate="novalidate" enctype="multipart/form-data">
<center> 
<br><br><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;
<table width='90%' border='0' align='center'>
<tr align='center'>
<td>
<div class="w3-container w3-card-4 w3-light-grey w3-text-black " style='width:65%;'>
<h2 class="w3-center" style='color:green'>Add Student</h2>

<div class="w3-row w3-section " style='width:60%;'>
  <div class="w3-col" style="width:50px;"></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="sid" type="text" value="" placeholder="Enter Student Id">
    </div>
</div>


<div class="w3-row w3-section " style='width:60%;'>
  <div class="w3-col" style="width:50px;"></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="sname" type="text" placeholder="Enter Student Name" required>
    </div>
</div>

<div class="w3-row w3-section" style='width:60%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
     <select type="text" class="w3-input w3-border" name='course' id='course' style='color:grey' required>
		   <?php  
		   if (isset($_POST['course']))
		 {
			  echo "<option>".$_POST['course']."</option>";
		 }
		 else
		 {
		 }
		 ?>
		   <option value=''>--Select Course--</option>
		  <?php
		 $sql5="select * from class";
		  //$cnt=$cnt+1;
		 $res = $con->query($sql5);
		while($row = $res->fetch_assoc()) 
		{
			?>
			<option value="<?php echo $row['course'] ?>"/><?php echo $row['course'] ?></option>
		 
			<?php }
			
			
		?>
		</select>
    </div>
</div>

<div class="w3-row w3-section" style='width:60%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
     <select type="text" class="w3-input w3-border" name='batch' id='batch' style='color:grey' required>
		   <?php  
		   if (isset($_POST['batch']))
		 {
			  echo "<option>".$_POST['batch']."</option>";
		 }
		 else
		 {
		 }
		 ?>
		   <option value=''>--Select Batch--</option>
		  <?php
		 $sql5="select * from class";
		  //$cnt=$cnt+1;
		 $res = $con->query($sql5);
		while($row = $res->fetch_assoc()) 
		{
			?>
			<option value="<?php echo $row['batch'] ?>"/><?php echo $row['batch'] ?></option>
		 
			<?php }
			
			
		?>
		</select>
    </div>
</div>

<div class="w3-row w3-section" style='width:60%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
     <select type="text" class="w3-input w3-border" name='class' id='class' style='color:grey' required>
		   <?php  
		   if (isset($_POST['class']))
		 {
			  echo "<option>".$_POST['class']."</option>";
		 }
		 else
		 {
		 }
		 ?>
		   <option value=''>--Select Class--</option>
		  <?php
		 $sql5="select * from class";
		  //$cnt=$cnt+1;
		 $res = $con->query($sql5);
		while($row = $res->fetch_assoc()) 
		{
			?>
			<option value="<?php echo $row['class'] ?>"/><?php echo $row['class'] ?></option>
		 
			<?php }
			
			
		?>
		</select>
    </div>
</div>

<div class="w3-row w3-section w3-center" style='width:60%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
      <input type='file' name='image' class='w3-border' style='width:100%' required>
    </div>
</div>

<div class="w3-row w3-section w3-center" style='width:60%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
      <textarea name='address' class="w3-input w3-border" placeholder="Enter Address" style='width:100%' required></textarea>
    </div>
</div>

<div class="w3-row w3-section w3-center" style='width:60%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="pname" type="text" placeholder="Enter Parents Name"  required>
    </div>
</div>

<div class="w3-row w3-section w3-center" style='width:60%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="contact" type="text" placeholder="Enter Parents Contact"  required>
    </div>
</div>

<div class="w3-row w3-section w3-center" style='width:60%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="email" type="text" placeholder="Enter Parents EmailID"  required>
    </div>
</div>

<div class="w3-row w3-section w3-center" style='width:60%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="username" type="text" placeholder="Enter Username"  required>
    </div>
</div>

<div class="w3-row w3-section w3-center" style='width:60%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="password" type="password" placeholder="Enter Password"  required>
    </div>
</div>

<p class="w3-center">
<input type='submit' class="w3-button w3-section w3-green w3-ripple" value='ADD' name='add'>
</p>
</center>

</div>
<?php
if(isset($_POST['add']))
{
	 $file=$_FILES['image']['tmp_name'];
					  $iname=$_FILES['image']['name'];
					  if(isset($iname))
					  {
					 if(!empty($iname))
					  {      
                      $location = 'images/';      
                     if(move_uploaded_file($file, $location.$iname))
					 {
                             'uploaded';
                     }
                    } 
					  }			
                else
					{
                      'please upload';
                    }
					
	$sid=$_POST['sid'];
    $sname=$_POST['sname'];	
	$course=$_POST['course'];
	$batch=$_POST['batch'];
	$class=$_POST['class'];
	$image=$iname;
	$address=$_POST['address'];
	$pname=$_POST['pname'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$pass=$_POST['password'];
	
$sql="Insert into student values('$sid','$sname','$course','$batch','$class','$image','$address','$pname','$contact','$email','$username','$pass')";
	if(mysqli_query($con,$sql))
	  {
		         $_my_clicksend_username = "poonam.yadav677";
				 $_my_clicksend_key = "DE9138B8-8FDD-5AD7-BB86-8ADBD4511CC3";
				 //You *MUST* define the 'to', 'message' and 'senderid'
				 $to = $contact;
			     $message   = "Login Details for School Security System<br>Username: ".$username."<br>Password:".$pass."";
		         $senderid  = "XYZ";
                  $message=urlencode($message);
				  $to=urlencode($to);
				 $vars="method=http&username=$_my_clicksend_username&key=$_my_clicksend_key&to=+91" . $to ."&message=" . $message . "&senderid=" . $senderid;	
file_get_contents('https://api-mapper.clicksend.com/http/v2/send.php?method=http&username=poonam.yadav677&key=DE9138B8-8FDD-5AD7-BB86-8ADBD4511CC3&to=+91'.$to.'&message='.$message.'&senderid=XYZ');
		echo "<script>alert('Student details added successfully');</script>";
		echo "<script>location.replace('addstu.php')</script>";
      }
}
		?>
		</td>
		</tr>
		</table>
</form>
</body>
</html>
<br>
<?php
include("footer.php");
 }
?>