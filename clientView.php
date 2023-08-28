<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>client View</title>
    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <!--displaying table with style-->
    <style>
        /* Additional CSS styles */
        .main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Make the main section take up the full viewport height */
            padding: 0 20px; /* Adjust horizontal padding */
            box-sizing: border-box;
        }

        /* Style for the excel table */
        .excel-table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            margin-left:50%;
            margin-top: 20px;
            margin-bottom:300px;
        }

        .excel-table th,
        .excel-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        .excel-table th {
            background-color: #f2f2f2;
            color: red;
        }

        
    /* Media  for responsive design */
    @media (max-width: 768px) {
        .excel-table {
            font-size: 12px; /* Decrease font size for smaller screens */
        }
        .excel-table th,
        .excel-table td {
            padding: 6px; /* Decrease padding for smaller screens */
        }
    }

    @media (max-width: 480px) {
        .excel-table {
            font-size: 10px; /* Further decrease font size for even smaller screens */
        }
        .excel-table th,
        .excel-table td {
            padding: 4px; /* Further decrease padding for even smaller screens */
        }
    }
    </style>
    
  </head>
  <!-- still using home page menus or existing homepage-->
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
   <!-- end of home page-->
   <!--adding logo-->
    <nav class="navbar">
      <i class="fa-solid fa-bars" id="sidebar-close"></i>
      <a href="https://www.bcity.me/"><img src="images/logo1.png" alt="logo"></a>
    </nav>
    <!-- including or displaying php file from database -->
    <main class="main">
        <table class="excel-table">
            <tr>
                <th>Client Name</th>
                <th>Client Code</th>
                <th>No. of Linked Contacts</th>
            </tr>
            <?php
            include("php/config.php");

            $sql = "SELECT * FROM clients";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['client_name'] . "</td>";
                    echo "<td>" . $row['client_code'] . "</td>";
                    echo "<td>" . $row['No_of_linked_contacts'] . "</td>";
                    echo "</tr>";
                }
            } else {
              echo "<tr><td colspan='3'>No clients found</td></tr>";
              echo "<tr><td colspan='3'><a href='addClients.php'><button class='btn'>Add New Clients</button></a></td></tr>";
            }
            ?>
        </table>
        <!-- Other content can be added after the table if needed -->
    </main>

    <script src="script2.js"></script>
  </body>
</html>





