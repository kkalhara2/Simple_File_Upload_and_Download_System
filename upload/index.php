<?php session_start(); ?>
<?php require_once('inc/connection.php');?>
<?php 
	
	date_default_timezone_set("Asia/Colombo");
	//check for the form submission
	if(isset($_POST['submit'])){

		$error=array();
		//check reg no and password entered properly
		if(!isset($_POST['reg_no']) || strlen(trim($_POST['reg_no']))<1){
			$error[]='Username is Missing/Invalid';
		}
		if(!isset($_POST['password']) || strlen(trim($_POST['password']))<1){

			$error[]='Password is Missing/Invalid';
		}
		//check if there any errors in the form
		if(empty($error)){

				//save username and password to variables
				$reg_no		=mysqli_real_escape_string($connection,$_POST['reg_no']);
				$password	=mysqli_real_escape_string($connection,$_POST['password']);
				$hashed_password=sha1($password);

				//prepare database query
				$query ="SELECT * FROM user
						WHERE reg_no='{$reg_no}'
						AND password='{$hashed_password}'
						LIMIT 1";
				$result_set=mysqli_query($connection,$query);

				if($result_set){

					//if query successful
					if(mysqli_num_rows($result_set) == 1){
						//valid user found
						$user=mysqli_fetch_assoc($result_set);
						$_SESSION['user_id'] =$user['reg_no'];
						$_SESSION['first_name'] =$user['first_name'];
						$_SESSION['user_level'] =$user['user_level'];
						$_SESSION['card'] =$user['card'];

						//updating last login
						$query="UPDATE user set last_login = NOW() WHERE reg_no={$_SESSION['user_id']} LIMIT 1";

						$result_set=mysqli_query($connection,$query);

						if(!$result_set){
							die("Database Query Failed");
						}
						//redirect to home.php
						header('Location:upload.html');
					}else{
						//username and password invalid
						$error[]='Invalid username / Password';
					}
				}else{
					$error[]='Database Query Failed';
				}
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Login | LMS 38th Batch</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="login">
                <img src="../images/logo.png" alt="38th Batch Faculty Of Science | University Of Ruhuna" style="width:160px;height: 100px;">
                <marquee behavior="scroll" direction="left" scrollamount="4"><p>Welcome to 38<sup>th</sup> batch LMS Service</p></marquee>
                <h1 class="text-center buttonDiv">Login</h1>
                <?php
                if(isset($error) && !empty($error)){
                    echo '<p class="error">Invalid Username / Password</p>';
                }
                ?>
                <?php
                if(isset($_GET['logout'])){
                    echo '<p class="info">Logout successful</p>';
                }

                ?>

                <form action="index.php" method="POST">
                    <p class="redFonts tinyFonts">Please Provide Your Login Details to Start Uploading</p>
                    <div class="col-lg-12 col-xs-12">
                        <label for="">SC Number</label>
                        <input type="text" name="reg_no" placeholder="Last 4 Digit only ex:1234" maxlength="4" class="form-control">
                    </div>
                    <div class="col-lg-12 col-xs-12">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="col-lg-12 col-xs-12 buttonDiv">
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    </div>
            </form>
        </div> <!-- login -->
    </div>
</div>
</body>
</html>
<?php mysqli_close($connection); ?>