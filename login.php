

<form method="POST">

    <input type="text" name="login" >
    <input type="password" name="password" >
    <input type="submit" value="ZALOGUJ" name="loginSubmit">

</form>

<?php

require_once("db.inc.php");
    session_start();
    if($_SESSION['error'] == 1) {
        echo "Błąd logowania!";
    }

    
    if(isset($_POST['loginSubmit'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $findUser = "SELECT * FROM `users` WHERE `login` = '$login'";
        $results = mysqli_query($sql, $findUser);
       
        foreach($results as $result) {
            $db_pass = $result['password'];
        }

        if($db_pass == $password) {
            $_SESSION['logged'] = true;
            $_SESSION['error'] = 0;
            header("Location: dashboard.php");
        }
        else {
            $_SESSION['error'] = 1;
            header("Location: login.php");
        }
    }
    require_once("footer.php");

?>