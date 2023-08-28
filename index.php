
<?php
//after login
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>

    <!--Company logo Binary city -->
    <nav>
        <a href="https://www.bcity.me/"><img src="images/logo1.png" alt="logo"></a>
    </nav>
    <!----Login form page--->
    <div class="container">
        <div class="box form-box">

        <!----php login session--->
        <!----connecting the login page--->
       <?php
        
        include("php/config.php");
        if(isset($_POST['submit'])){

            $email = mysqli_real_escape_string($con,$_POST['email']);
            $password = mysqli_real_escape_string($con,$_POST['password']);
            //check if the user really exist in the system

            $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' AND Password='$password'") or die ("selection error");
            $row = mysqli_fetch_assoc($result);

            if(is_array($row) && !empty($row)){
                //verify the roles
                $_SESSION['valid'] = $row['Email'];
                $_SESSION['username'] = $row['Username'];
                $_SESSION['id'] = $row['Id'];


            }else{

                echo "<div class='massage'>
                            <p>Wrong Username or Password</p>
                        </div> <br>";
                echo"<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            } 
                //after the login is done, you need to sent to home page
                if(isset($_SESSION['valid'])){
                    header("location:home.php");
                }
            

        }else{
        
        
        ?>
            <!--Login login form-->

            <header>Login to BC System</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required>

                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>


                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>

                </div>
                <div class="links">Dont have Account?
                    <a href="register.php">Sign Up</a>
                </div>

            </form>
        </div>
    <?php  } ?>
    </div>


</body>

</html>