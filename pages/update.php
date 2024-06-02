<?php

session_start();
if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!==true)
{
    header("Location: login.php");
    exit;
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/notes-app' . '/database/dbConnect.php';


if(!isset($_POST['update'])){
    header("Location: /notes-app/pages/dashboard.php");
}

$title = $_POST['title'];
$note = $_POST['note'];
$note_id = $_POST['note_id'];
$user_id = $_POST['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/notes-app/css/main.css">
    <link rel="stylesheet" href="/notes-app/css/dashboard.css">
</head>
<body>
<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/notes-app' . '/includes/_header.php'; 
?>

<div class="container">
    
    <form action="/notes-app/database/update_note.php" method="POST" class="form flex" style="margin-top: 0;">
        <h1>
            Update a note
        </h1>
        <div class="formField flex">
            <label for="title">Title:</label>
            <input type="text" name="title" value="<?php echo $title ?>" id="title" required>
        </div>
        <div class="formField flex">
            <label for="note">Note:</label>
            <textarea type="text" name="note" id="note" rows="10" required><?php echo $note ?></textarea>
        </div>
        <input type="hidden" name="note_id" value="<?php echo $note_id ?>">
        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
        <input type="submit" class="button submitButton" value="Update" name="update_note">
    </form>
</div>
    
</body>
</html>