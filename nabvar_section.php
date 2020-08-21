<?php 
    session_start();
    if ($name) 
        $name= $_SESSION['user_name_session'];
    else 
        $name="Guest";
    //$name=$_SESSION['user_name_session'] ?? 'Guest';
    /*

     $name=isset($_SESSION['user_name_session']) ? $_SESSION['user_name_session'] : 'Guest';*/
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>

<body>
    <!-- Navbar Section -->
    <div class="navbar_section">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php"><span class="Semi-color" >Pro</span>file</a>
            <div class="collapse navbar-collapse" >
                <!-- Profiles List option -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="local_profiles.php">Create Profiles</a>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link" href="global_profiles.php">Explore Profiles</a>
                    </li>
                </ul>
                <!-- User Authentication -->
                <span class="nav-item nav-link active float-right" >User : </span>
                <span class="nav-item nav-link active float-right" ><?php   echo $name;?> </span></span>
                <br>
            </div>
        </nav>
  </div>
  <p><?php include("db_connect.php"); ?> </p>