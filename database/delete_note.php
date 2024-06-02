<?php

session_start();
if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!==true)
{
    header("Location: login.php");
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/notes-app' . '/database/dbConnect.php';

// delete note
if(isset($_POST['delete_note'])){
    $note_id = $_POST['note_id'];

    $delete_query = "DELETE FROM notes WHERE note_id = $note_id";

    $delete_result = mysqli_query($conn,$delete_query);

    if(!$delete_result){
        echo mysqli_error($conn);
    }
    else{
        echo "deleted";
        header("Location: /notes-app/pages/dashboard.php");
    }
}

?>