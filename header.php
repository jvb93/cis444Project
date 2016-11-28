<?php session_start() ?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tukwut Chow</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/site.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Tukwut Chow</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="faqContact.php">About</a></li>
          <?php 
         
     
            if(isset($_SESSION['userName']))	//If the sesssion is already started.
            {          
              echo"<li><a href='addRestaurant.php'>Add Restaurant</a></li>";
              if($_SESSION['isAdmin'] == 1)
              {
                echo"<li><a href='listUsers.php'>List Users</a></li>";
              }

              echo"<li><a href='logout.php'>Logout</a></li>";                          
            }
            else	//Session not set, so load these links.
            {	
              echo"<li><a href='login.php'>Login</a></li>";   
            }
          ?>                
          <li><a href="references.php">References</a></li>         
        </ul>
        <div class="col-sm-3 col-md-3 navbar-right">
        <form class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="q">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
    </div>
      </div><!--/.nav-collapse -->

      </div>

    </nav>
    <?php include('phpFunctions/db_connect.php'); ?>
    <div class="container-fluid">
