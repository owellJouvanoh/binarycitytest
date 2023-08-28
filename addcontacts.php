<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>add contacts</title>
    <link rel="stylesheet" href="style2.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <!--adding a css stript hear to make the form look good-->
    <style>
    /* Additional CSS styles */
    .main {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Adjusting the form width */
        form {
            background-color: #c32026;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%; /* Full width of container */
            max-width: 300px; /* Limiting maximum width */
        }

    /* Style for the header tag within the form */
    header {
        color: white;
        font-size: 24px;
        margin-bottom: 10px;
    }

    /* Style for form elements */
    label {
        font-weight: bold;
        color: white;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: none;
        border-radius: 5px;
    }

    .checkbox-field label {
        color: white;
    }

    .checkbox-item {
        margin-bottom: 5px;
    }

    .btn {
        background-color: white;
        color: red;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #f2f2f2;
    }

    .links a {
        color: white;
        text-decoration: none;
    }

    .links a:hover {
        text-decoration: underline;
    }
    /*if the are no clients display massage*/
    
</style>
<!--using existing home page menu-->
  </head>
  <body>
    <nav class="sidebar">
      <a href="" class="logo">BC System</a>

      <div class="menu-content">
        <ul class="menu-items">
          <div class="menu-title">Your menu</div>
          
          <li class="item">
          <a href="home.php">Home</a>
          </li>

          <li class="item">
            <div class="submenu-item">
              <span>Clients Portal</span>
              <i class="fa-solid fa-chevron-right"></i>
            </div>

            <ul class="menu-items submenu">
              <div class="menu-title">
                <i class="fa-solid fa-chevron-left"></i>
                Go Back
              </div>
              <li class="item">
                <a href="clientView.php">View Clients</a>
              </li>
              <li class="item">
                <a href="addClients.php">Add Clients</a>
              </li>
              
            </ul>
          </li>
          <li class="item">
            <div class="submenu-item">
              <span>Contacts Portal</span>
              <i class="fa-solid fa-chevron-right"></i>
            </div>

            <ul class="menu-items submenu">
              <div class="menu-title">
                <i class="fa-solid fa-chevron-left"></i>
                Go Back
              </div>
              <li class="item">
                <a href="contactView.php">View Contacts</a>
              </li>
              <li class="item">
                <a href="addcontacts.php">Add Contacts</a>
              
            </ul>
          </li>


          <li class="item">
            <a href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
<!--end of existing home page menu-->
    <nav class="navbar">
      <i class="fa-solid fa-bars" id="sidebar-close"></i>
      <a href="https://www.bcity.me/"><img src="images/logo1.png" alt="logo"></a>
    </nav>

    <main class="main">
    <?php
            include("php/config.php");
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $surName = $_POST['surName'];
                $email = $_POST['email'];
                
                //verification process for email
                $verify_query = mysqli_query($con,"SELECT Email FROM contacts WHERE Email='$email'");
                //if email already exist in database give a massage

                if(mysqli_num_rows($verify_query) !=0){
                    echo "<div class='massage'>
                            <p>Email already in used, Try a new one please!</p>
                        </div> <br>";
                    echo"<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    
                }
                //else if the email is not into database register the user
                else{

                      // Count the selected linked clients
                         $selectedClients= isset($_POST['selectedContacts']) ? $_POST['selectedContacts'] : array();
                         $noOfLinkedClients = count($selectedClients);

                    mysqli_query($con, "INSERT INTO contacts (Surname, Name, Email, No_of_linked_clients) VALUES('$surName','$name','$email','$noOfLinkedClients')") or die ("error");
                    
                    header("Location: home.php?message=success");
                    exit();
                } 

            }else{
            ?>
            
            <form action="" method="post">
            <header>Add Contacts to BC System</header>
                <div class="field input">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>

                </div>

                <div class="field input">
                    <label for="surName">Surname</label>
                    <input type="text" name="surName" id="surName" autocomplete="off" required>

                </div>


                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required>
                </div>
                    <!-- Linked clients -->
                 <div class="field checkbox-field">
                    <label>Available Clients:</label>
                    <?php
                    $sql = "SELECT client_name, client_code FROM clients";
                    $result = $con->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='checkbox-item'>";
                            echo "<input type='checkbox' name='selectedClients[]' value='" . $row["client_name"] . "'>";
                            echo "<label>" . $row["client_name"] . "</label>";
                            echo "</div>";
                        }
                    } else {
                        echo "No clients found";
                    }
                    ?>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Add Contact" required>
                </div>
                

            </form>
        </div>
       <?php } ?>
    </div>
      
    </main>

    <script src="script2.js"></script>
  </body>
</html>
