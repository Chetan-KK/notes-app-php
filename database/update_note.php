<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/notes-app' . "/database/dbConnect.php";

if(isset($_POST['update_note']))
{
    $title = $_POST['title'];
    $note = $_POST['note'];
    $note_id = $_POST['note_id'];
    $user_id = $_POST['user_id'];

    $udpate_note_query = "UPDATE notes SET title = '$title', note = '$note' where note_id = $note_id AND user_id = $user_id";

    $udpate_query_result = mysqli_query($conn,$udpate_note_query);

    if(!$udpate_query_result){
        echo 'not working' . mysqli_error($conn);
    }
    else{
        header("Location: /notes-app/pages/dashboard.php");
    }
}

?>