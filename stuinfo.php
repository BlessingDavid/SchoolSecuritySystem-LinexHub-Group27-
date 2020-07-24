<?php
session_start();
include('connect.php');

 if(empty($_SESSION['sid']))
 {
	 echo "<script>window.location.href='parentlogin.php'</script>";
 }
 else
 {
     include('parentmenu.php');
	 include("connect.php");
$sid=$_SESSION['sid'];
$pro="select * from student where sid='$sid'";
		$prof=$con->query($pro);
        $pr = mysqli_fetch_assoc($prof);
		
		?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<form method='POST'>
<div class="container">
      <div class="row">
	 
				
      <div><br><br><br>
        <center><h2 class="w3-center" style='color:green'>Student Profile</h2></center> 
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info" style='border:1px solid #79c879'>
            <div class="panel-heading" style='background-color:#79c879'>
              <h3 class="panel-title" style='color:black'><b><?php echo $pr['sname']; ?></b></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="images/<?php echo $pr['image']?>" class="img-circle img-responsive"> </div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody style='font-size:14px'>
                      <tr>
                        <td><b style='color:grey;'>Course</b></td>
                        <td><?php echo $pr['course'] ?></td>
                      </tr>
					  <tr>
                        <td><b style='color:grey;'>Batch</b></td>
                        <td><?php echo $pr['batch'] ?></td>
                      </tr>
                      <tr>
                        <td><b style='color:grey;'>Class</b></td>
                        <td><?php echo $pr['class'] ?></td>
                      </tr>
					  <tr>
                        <td><b style='color:grey;'>Email</b></td>
                        <td><?php echo $pr['email'] ?></td>
                      </tr>
					  <tr>
                        <td><b style='color:grey;'>Contact</b></td>
                        <td><?php echo $pr['contact'] ?></td>
                      </tr>
					   <tr>
                        <td><b style='color:grey;'>Address</b></td>
                        <td><?php echo $pr['address'] ?></td>
                      </tr>
                      <tr>
                        <td><b style='color:grey;'>Parent Name</b></td>
                        <td><?php echo $pr['pname'] ?></td>
                      </tr>
                     
                      
                    </tbody>
                  </table>
                  
                  
                </div>
              </div>
            </div>
			</div>
			</div>
			</div>
			</div>
 <br><br>
<?php
include("footer.php");
 }
?>