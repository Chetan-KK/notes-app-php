<?php


$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'notes_app';


try{
    $conn = mysqli_connect($hostname,$username,$password,$database);

    if($conn){
        
    }
}
catch(mysqli_sql_exception){
echo "database not connected";
}

?>