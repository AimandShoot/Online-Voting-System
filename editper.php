<?php
session_start();
include 'db.php';
$k = $_SESSION['userName'];
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  </head>
  <body>
  <!--navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
          <a class="navbar-brand" href="homepage.php">E-Voting</a>
          <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
              aria-expanded="false" aria-label="Toggle navigation"></button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

              <li class="nav-item active"><a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a></li>

              

             
              <?php
                if($k != null){
                  echo "<li class='nav-item'><a class='nav-link' href=personal.php>Personal Information</a></li>";
                  
              }?>
              <li class="nav-item"></li>
            </ul>
            <?php if( isset($_SESSION['userName']) && !empty($_SESSION['userName'])){?>
                <ul class='navbar-nav navbar-right'><li class='nav-item'><a class='nav-link' href=logout.php>Log Out</a></li></ul>
               
            <?php }else{ ?>
              <ul class='navbar-nav navbar-right'>
                <li class='nav-item'><a href='signuptest.php' class='nav-link'> Sign Up</a></li>
                <li class='nav-item'><a href='logintest.php' class='nav-link'>Login</a></li>
                </ul>
                <?php } ?>
            
            

          </div>
        </nav>
        <!--navbar-->



  <br><br><br><?php 
  
    include 'db.php';
	if (isset($_POST['edit'])) {
      $name =$_POST['userName'];
      $password=$_POST['userPassword'];
      $email=$_POST['userMail'];
      $phone=$_POST['userPhone'];
      
      $sql = "update userInfo set userName='$name',userPassword='$password',userMail='$email',userPhone='$phone' where userName='$k'";
      $result = mysqli_query($conn,$sql);
      if(!$result){
    die("Database access failed" .mysqli_error($conn));
      }
        else{
          echo "Edit your information success!";
          echo  "<a href=personal.php>Back to edit page</a>";
            
  ?>
   <?php   }
    }else {?>
    <div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>"method="post">
   Name:<input class="form-control" type="text" name="userName">
   <div class="form-row">
    <div class="form-group col-md-6">
    Password:<input class="form-control" type="text" name="userPassword">
    </div>
      <div class="form-group col-md-6">
      Confirm password: <input class="form-control" type="password" name="confirm">
      </div>
   </div>
   <div class="form-row">
      <div class="form-group col-md-8">
      Email:<input class="form-control" type="email" name="userMail">
      </div>
          <div class="form-group col-md-4">
          Phone:<input class="form-control" type="phone" name="userPhone"><br>
          </div>
   </div>

   <input type="submit" name="edit" value="Submit Edit" ><br>
   <br><u><a name=""id=""class="btn btn-primary"href="javascript:history.go(-1)" role="button">Previous page</a></u> 
   
  
 </form>
    </div>
   

<?php }?>

    
  </body>
</html>