<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>register</title>
</head>


<body>

    <!--Company logo-->
    <nav>
        <a href="https://www.bcity.me/"><img src="images/logo1.png" alt="logo"></a>
         
        
    </nav>
    <!----Register form--->
    <div class="container">
        <div class="box form-box"> 
            
            <?php
            include("php/config.php");
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                
                //verification process for email
                $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");
                //if email already exist in database give a massage

                if(mysqli_num_rows($verify_query) !=0){
                    echo "<div class='massage'>
                            <p>Email already in used, Try a new one please!</p>
                        </div> <br>";
                    echo"<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    
                }
                //else if the email is not into database register the user
                else{
                    mysqli_query($con, "INSERT INTO users(Username, Email, Password) VALUES('$username','$email','$password')") or die ("error");
                    echo "<div class='massage'>
                            <p>Registration successfully!</p>
                        </div> <br>";
                    echo"<a href='index.php'><button class='btn'>Login Now</button>";
                }

            }else{
            ?>
            <!--Register form -->
            <header>sign up to BC System</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>

                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>

                </div>


                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>


                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">Already a member?
                    <a href="index.php">Sign in</a>
                </div>

            </form>
        </div>
       <?php } ?>
    </div>

</body>

</html>