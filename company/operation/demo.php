<?php
session_start();
    if(isset($_SESSION['project_id']))
        {
            unset($_SESSION['project_id']);
        }

    if(isset($_SESSION['p_name']))
        {
            unset($_SESSION['p_name']);
        }
           
        if(isset($_SESSION['refresh']))
        {
             unset($_SESSION['refresh']);
        }
   echo"<script>window.location.href='../index.php'</script>";

?>