<?php


$DSN="mysql:host=localhost;dbname=PDO_Product";
$user='admin';
$pass='admin';
//$options=array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8' ); // for arabic values in database
try {
    $db=new PDO($DSN,$user,$pass);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $query="INSERT INTO items (Name) VALUES ('صباح الفل ')";
    $db->exec($query);

}
catch(PDOException $e) {
    echo "Faield".$e->getMessage();
}




?>