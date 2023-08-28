<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>home page</title>
    <link rel="stylesheet" href="style2.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  </head>
  <body>
    <!-- side bar menu including links to actions -->
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
              <!--access client portal hear-->
              <span>Clients Portal</span>
              <i class="fa-solid fa-chevron-right"></i>
            </div>

            <ul class="menu-items submenu">
              <div class="menu-title">
                <i class="fa-solid fa-chevron-left"></i>
                Go Back
              </div>
              <li class="item">
                <!--link to view and adding clients hear-->
                <a href="clientView.php">View Clients</a>
              </li>
              <li class="item">
                <a href="addClients.php">Add Clients</a>
              </li>
              
            </ul>
          </li>
          <li class="item">
            <div class="submenu-item">
               <!--access contacts portal hear-->
              <span>Contacts Portal</span>
              <i class="fa-solid fa-chevron-right"></i>
            </div>

            <ul class="menu-items submenu">
              <div class="menu-title">
                <i class="fa-solid fa-chevron-left"></i>
                Go Back
              </div>
              <li class="item">
                 <!--link to view and adding contacts hear-->
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
<!-- end of side bar menu -->
<!-- placing company logo -->
    <nav class="navbar">
      <i class="fa-solid fa-bars" id="sidebar-close"></i>
      <a href="https://www.bcity.me/"><img src="images/logo1.png" alt="logo"></a>
    </nav>

    <main class="main">
    <div class="binarypic">
      <!-- place image -->
        <img src="images/binarypic.jpg" alt="Binary Picture">
    </div>
    </main>

    <script src="script2.js"></script>
  </body>
</html>
