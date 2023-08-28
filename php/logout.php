<?php
//log out the users 
session_start();
session_destroy();
header("Location: ../home.php");




?>