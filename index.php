<?php

include("config.php");
if(!isset($_SESSION['user'] )){

  header("location: signup.html");

} else
{   
    header("location: dashboard.php");
    


}