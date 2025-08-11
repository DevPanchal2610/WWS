<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>WWS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="../img/logo1.png">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap4.min.css">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- =======================================================
    * Template Name: FlexStart
    * Updated: Sep 18 2023 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <style>
      #profile {
    color: #4472c4 !important;
        }
     .btn-primary1
     {
      background:  #4472c4 !important;
      color: white;
     }

    </style>
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        
        <a href="index.php" class="logo d-flex align-items-center">
          <img src="../img/logo1.png" alt="">
          <span>WWS</span>
        </a>
        <form id="search-form" action="" method="GET">
          <div class="input-group">
            
            <input type="text" name="search" id="search-input"class="form-control " placeholder="Search Projects">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary1">
              <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </form>
        <script>
           function clearSearch() {
        document.getElementById('search_out').innerHTML = "";
    }
        document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('search-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the form from submitting normally
        document.getElementById('search_out').innerHTML ="";
        // Get the search query from the input field
        const searchQuery = document.getElementById('search-input').value;
        // Create a new XMLHttpRequest object
        const xhr = new XMLHttpRequest();
        // Construct the URL with the search query as a parameter
        const url = 'operation/search.php?search=' + encodeURIComponent(searchQuery);
        // Configure the request
        xhr.open('GET', url, true);
        // Define the callback function for when the request completes
        xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
        // Place the response text into the element with ID "search_out"
        document.getElementById('search_out').innerHTML = xhr.responseText;
        document.getElementById('search_out').innerHTML +="<tr><td colspan='6' align='center'><a href='#' onclick='clearSearch()' class='btn btn-primary'>clear</a><td></tr>";
       


        } else {
        // Handle errors
        console.error('Request failed with status:', xhr.status);
        }
        };
        // Define the callback function for errors
        xhr.onerror = function () {
        // Handle errors
        console.error('Request failed');
        };
        // Send the request
        xhr.send();
        });
        });
       
        </script>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="" href="index.php">Home</a></li>
            <li><a class="nav-link scrollto" href="all_project.php">All Projects</a></li>
            <li><a class="nav-link scrollto" href="feedback.php">Give FeedBack</a></li>
            <li class="dropdown"><a href="../registration.php"><span>Registation</span><i class="bi bi-chevron-down"></i></a>
            <ul>
              <li>
                <a href="../index.php">Login</a>
              </li>
            </ul>
          </li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle">
        </i>
        </nav><!-- .navbar -->
      </div>
      </header><!-- End Header -->
      <!-- ======= Hero Section ======= -->
      <section id="hero" class="">
      </section>
      <center>
      
      <table class="table w-50">
        <thead>
          
        </thead>
        <tbody id="search_out">
          
        </tbody>

      </table>
      </center>