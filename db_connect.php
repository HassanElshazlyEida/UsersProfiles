<?php 
    //Connect with Database (Normal Way)
    $connect_to_database=mysqli_connect('localhost','admin','admin','profiles');
    //Connect wit Database(PDO)
    /*
    $DSN="mysql:host=localhost;dbname=profiles";
    $user='admin';
    $pass='admin';
    try {
        $db=new PDO($DSN,$user,$pass);
        echo 'You Are Connected';

    }
    catch(PDOException $e) {
        echo "Faield".$e->getMessage();
    }
    */

    if (!$connect_to_database){
        die("Connection error  ");
        //echo "Connection error : ".mysqli_connect_error();
    }

/*
<?php x 
    //Connect with Database (Normal Way)
    $connect_to_database=mysqli_connect('localhost','mustafae_hassan',',3ifEFjlKp5P','mustafae_test');
    //Connect wit Database(PDO)
    
?>
*/
?>
