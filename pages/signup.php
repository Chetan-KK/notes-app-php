<?php 

session_start();
if(isset($_SESSION['loggedIn'])&&  $_SESSION['loggedIn']===true){
    header('Location: dashboard.php');
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/notes-app' . '/database/dbConnect.php';

$error_msg = '';

if(isset($_POST['signup'])){

    try {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $CPassword = $_POST['CPassword'];

        if(!($password === $CPassword)){
            $error_msg = "Passwords are not same!";
        }
        else{
            $hashPassword = password_hash($password,PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$hashPassword')";
            $result = mysqli_query($conn,$sql);

            if(!$result){
                $error_msg = "This email already exist!";
            }
            else{
                header('Location: login.php');
            }

        }

        
    } catch (mysqli_sql_exception) {
        $error_msg = "something went wrong! pleaes try again letter or contact us!";
    }
    
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
<div class="container">

<form action="/notes-app/pages/signup.php" method="POST" class="form flex" style="max-width: 17rem;">
    <h1>
        Signup
    </h1>
    <div class="formField flex">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div class="formField flex">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div class="formField flex">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div class="formField flex">
        <label for="CPassword">Confirm Password:</label>
        <input type="password" name="CPassword" id="CPassword" required>
    </div>
    <input type="submit" class="button submitButton" value="Sign up" name="signup">
</form>
<div class="center">
        <?php echo $error_msg ?>
    </div>
</div>

</body>
</html>