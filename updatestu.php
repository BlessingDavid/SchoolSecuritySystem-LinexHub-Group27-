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
	 
	$sid=$_GET['sid'];
	$sel="select * from student where sid='$sid'";
	$res=$con->query($sel);
	$data=mysqli_fetch_array($res);
	$img=$data['image'];
?>

<script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="jquery.validate.min.js"></script>
  <script>
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#myForm").validate({
    
        // Specify the validation rules
        rules: {
				sname: "required",
				course: "required",
				batch: "required",
				address: "required",
				pname: "required",
				campus: "required",
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
            sname: "<label><h5>Please Enter Student Name!</h5></label>",
			course: "<label><h5>Please select course</h5></label>",
            batch:"<label><h5>Please select Batch</h5></label>",
			address:"<label><h5>Please Enter address</h5></label>",
			pname:"<label><h5>Please Enter Parents Name</h5></label>",
			email:"<label><h5>Please enter valid email Address!</h5></label>",
			contact:"<label><h5>Please enter Valid Contact No!</h5></label>",
			campus:"<label><h5>Please enter campus location</h5></label>",
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
      <input class="w3-input w3-border" name="sname" type="text" value="<?php echo $data['sname'] ?>" placeholder="Enter Student Name" required>
    </div>
</div>

<div class="w3-row w3-section" style='width:60%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
     <select type="text" class="w3-input w3-border" name='course' id='course' style='color:grey' required>
		   <option><?php echo $data['course'] ?></option>
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
		  <option><?php echo $data['batch'] ?></option>
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
		  <option><?php echo $data['class'] ?></option>
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
	<img src="images/<?php echo $data['image'] ?>" width='50px'>
      <input type='file' name='image' class='w3-border' style='width:100%'>
    </div>
</div>

<div class="w3-row w3-section w3-center" style='width:60%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
      <textarea name='address' class="w3-input w3-border" placeholder="Enter Address" style='width:100%' required><?php echo $data['address'] ?></textarea>
    </div>
</div>

<div class="w3-row w3-section w3-center" style='width:60%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="pname" type="text" value="<?php echo $data['pname'] ?>" placeholder="Enter Parents Name">
    </div>
</div>

<div class="w3-row w3-section w3-center" style='width:60%'>
  <div class="w3-col" style="width:50px"></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="contact" type="text" value="<?php echo $data['contact'] ?>" placeholder="Enter Parents Contact"  required>
    </div>
</div>

<p class="w3-center">
<input type='submit' class="w3-button w3-section w3-green w3-ripple" value='Update' name='update'>
</p>
</center>

</div>
<?php
if(isset($_POST['update']))
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
					
	
    $sname=$_POST['sname'];	
	$course=$_POST['course'];
	$batch=$_POST['batch'];
	$class=$_POST['class'];
	$image=$iname;
	$address=$_POST['address'];
	$pname=$_POST['pname'];
	$contact=$_POST['contact'];
	$image=$iname;
	if(empty($image))
	{
	$sql="Update student set sname='$sname',course='$course',batch='$batch',class='$class',image='$img',address='$address',pname='$pname',contact='$contact' where sid='$sid'";
	}
	else
	{
		$sql="Update student set sname='$sname',course='$course',batch='$batch',class='$class',image='$image',address='$address',pname='$pname',contact='$contact' where sid='$sid'";
	}
	if(mysqli_query($con,$sql))
	  {
		echo "<script>alert('Student details Updated successfully');</script>";
		 echo "<script>location.replace('viewstu.php');</script>";
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