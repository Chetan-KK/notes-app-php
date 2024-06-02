<?php
session_start();
if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!==true)
{
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/notes-app/css/main.css">
</head>
<body>
<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/notes-app' . '/includes/_header.php'; 
?>

    welcome

</body>
</html>