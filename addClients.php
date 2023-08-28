<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>add Clients</title>
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
            $firstName = ucfirst($_POST['firstName']); // Convert first letter to uppercase
              $middleName = ucfirst($_POST['middleName']); // Convert first letter to uppercase
              $lastName = ucfirst($_POST['lastName']); // Convert first letter to uppercase

              // Extract the first capital letter from each name part
                 $nameParts = array($firstName, $middleName, $lastName);
                  $capitalLetters = '';
                      foreach ($nameParts as $part) {
               if (!empty($part) && preg_match('/^[A-Z]/', $part)) {
            $capitalLetters .= $part[0];
               }
            }

             // Ensure that we have at least 3 capital letters
              $capitalLetters = str_pad($capitalLetters, 3, 'B', STR_PAD_RIGHT);

            // Generate the numeric part
             // Retrieve the highest numeric part from the database
             $sql = "SELECT MAX(CAST(SUBSTRING(client_code, 4) AS UNSIGNED)) AS highest_numeric FROM clients";
              $result = $con->query($sql);

            if ($result->num_rows > 0) {
                 $row = $result->fetch_assoc();
              $highestNumericPart = $row['highest_numeric'];
                // Increment the numeric part
                 $numericPart = str_pad(intval($highestNumericPart) + 1, 3, '0', STR_PAD_LEFT);
          }

               $clientCode = $capitalLetters . $numericPart;
    
            // Count the selected linked contacts
                $selectedContacts = isset($_POST['selectedContacts']) ? $_POST['selectedContacts'] : array();
               $noOfLinkedContacts = count($selectedContacts);
              // Insert data into the database
             $insertQuery = "INSERT INTO clients (client_name, client_code, No_of_linked_contacts) VALUES ('$firstName $middleName $lastName', '$clientCode','$noOfLinkedContacts')";
              if ($con->query($insertQuery) === TRUE) {
        // Redirect back to the form with a success message
        header("Location: home.php?message=success");
        exit();
    } else {
        // Handle the case where the insertion failed
        echo "Error: " . $insertQuery . "<br>" . $con->error;
    }
}else{
?>
            <!-- my html form hear -->
            
            <form action="" method="post">
            <header>Add Client to BC System</header>
                <!--First Name-->
                <div class="field input">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" required>

                </div>
                
                <!--Last name hear-->
                <div class="field input">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" required>
                    <!--- Middle name hear-->
                <div class="field input">
                    <label for="middleName">Middle Name</label>
                    <input type="text" name="middleName" id="middleName">

                </div>

                </div>
                 <!-- Linked Contacts -->
                 <div class="field checkbox-field">
                    <label>Available Contacts:</label>
                    <?php
                    $sql = "SELECT Surname, Name, Email FROM contacts";
                    $result = $con->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='checkbox-item'>";
                            echo "<input type='checkbox' name='selectedContacts[]' value='" . $row["Name"] . "'>";
                            echo "<label>" . $row["Name"] . "</label>";
                            echo "</div>";
                        }
                    } else {
                      echo "No contacts found";
                  }
                    ?>
                </div>
                <!-- submit button-->
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Add contact" required>
                </div>
                <div class="links">Go back to Client List?
                    <a href="clientView.php">View</a>
                </div>

            </form>
        </div>
       <?php } ?>
    </div>
    
    </main>

    <script src="script2.js"></script>
  </body>
</html>
