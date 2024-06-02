<?php 

$loggedIn = false;
if(isset($_SESSION['loggedIn'])&&  $_SESSION['loggedIn']===true){
    $loggedIn = true;
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/notes-app' . '/database/dbConnect.php';
?>
<div class="navbar flex">
    <a href="/notes-app/" class="logo">Notes app</a>
    <ul class="links flex">
    <?php if($loggedIn===true){ ?>
        <li><a href="/notes-app/pages/dashboard.php" class="link">Dashboard</a></li>
        <?php }
        else{ ?>
        <li><a href="/notes-app/index.php" class="link">Home</a></li>
        <?php } ?>
        <li><a href="/notes-app/pages/about.php" class="link">About</a></li>
        <li><a href="/notes-app/pages/contact.php" class="link">Contact</a></li>
<?php if($loggedIn===true){ ?>

        <li><a href="/notes-app/pages/logout.php" style="padding-bottom: .6rem;" class="button">
            Logout
        </a></li>

        <?php }
        else{ ?>
        <li><a href="/notes-app/pages/login.php" style="padding-bottom: .6rem;" class="button">
            Login
        </a></li>
        <li><a href="/notes-app/pages/signup.php" style="padding-bottom: .6rem;" class="button">
            Signup
        </a></li>
        <?php } ?>

        <div id="themeButton" class="button">Light</div>
    </ul>
    <script>
        const themeButton = document.getElementById('themeButton');

        const prevTheme = localStorage.getItem('theme')

        if(!prevTheme){
            setLight()
        }else{
            prevTheme === "dark"?setDark():setLight()
        }
        
        function setDark (){
            document.body.classList.add('dark')
                document.body.classList.remove('light')
                themeButton.innerHTML = "Light"
                localStorage.setItem('theme','dark')
        }
        function setLight(){
            document.body.classList.add('light')
                document.body.classList.remove('dark')
                themeButton.innerHTML = "Dark"
                localStorage.setItem('theme','light')
        }

        themeButton.addEventListener('click',()=>{
            if(document.body.classList.contains('dark')){
                setLight()
            }
            else{
                setDark()
            }
        })
    </script>
</div>