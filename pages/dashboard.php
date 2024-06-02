<?php

session_start();
if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!==true)
{
    header("Location: login.php");
    exit;
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/notes-app' . '/database/dbConnect.php';


if(isset($_POST['create_note'])){
    $title = $_POST['title'];
    $note = $_POST['note'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO notes (title,note,user_id) VALUES ('$title','$note','$user_id')";

    $result = mysqli_query($conn,$sql);

    if(!$result){
        echo "something went wrong!" . mysqli_error($conn);
    }
    else{
        echo "note is created";
        header("Location: dashboard.php");
    }
}

// load all notes

$user_id = $_SESSION['user_id'];
$get_notes_sql = "SELECT * FROM notes WHERE user_id = $user_id";

$get_notes = mysqli_query($conn,$get_notes_sql);
    
// update note



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
    welcome, <?php echo $_SESSION['name'] ?>
    
    <form action="/notes-app/pages/dashboard.php" method="POST" class="form flex" style="margin-top: 0;">
        <h1>
            Create a Note
        </h1>
        <div class="formField flex">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div class="formField flex">
            <label for="note">Note:</label>
            <textarea type="text" name="note" id="note" rows="10" required></textarea>
        </div>
        <input type="submit" class="button submitButton" value="Create" name="create_note">
    </form>
    <div class="notes flex">
    <?php if(mysqli_num_rows($get_notes) > 0){
        while($row = mysqli_fetch_assoc($get_notes)){ ?>
        <div class="note">
            <div class="title"><?php echo htmlspecialchars($row['title']) ?></div>
            <div class="content"><?php echo htmlspecialchars($row['note']) ?></div>
            <div class="buttons flex">
                <form action="/notes-app/pages/update.php" method="POST">
                    <input type="hidden" name="note_id" value="<?php echo $row['note_id'] ?>">
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
                    <input type="hidden" name="title" value="<?php echo $row['title'] ?>">
                    <input type="hidden" name="note" value="<?php echo $row['note'] ?>">
                    <input type="submit" class="button" name="update" value="Update"/>
                </form>
                <form action="/notes-app/database/delete_note.php" method="POST">
                    <input type="hidden" name="note_id" value="<?php echo $row['note_id'] ?>">
                    <input type="submit" class="button" name="delete_note" value="Delete"/>
                </form>
            </div>
        </div>
        <?php };
} ?>
</div>
</div>
    
</body>
</html>