<?php
    require_once("db.inc.php");
    session_start();
    if(isset($_SESSION['logged']) == false) {
        header("Location: index.php");
        die();
    }
    
?>

<form method="POST">
    <input type="submit" value="Logout" name="logoutSubmit">
    <input type="submit" value="Add post" name='addPostSubmit'>
</form>

<?php

    if(isset($_POST['addPostSubmit'])) {
        header("Location: add.php");
    }

    if(isset($_POST['logoutSubmit'])) {
        $_SESSION['logged'] = false;
        header("Location: index.php");
        die();
    }

    if(isset($_GET['delete'])) {
        $deleteUid = $_GET['delete'];
        $deleteQuery = "DELETE FROM `post` WHERE `uid` = $deleteUid";
        mysqli_query($sql, $deleteQuery);
    }


    $query = "SELECT * FROM post";
    $results = mysqli_query($sql, $query);


    echo "<table border=1>";
    echo "<tr><td>UID</td><td>Title</td><td>Edit</td><td>Delete</td></tr>";
    foreach($results as $result) {
        echo "<tr><td>" . $result['uid'] . "</td><td>" . $result['title'] . "</td><td><a href='add.php?edit={$result['uid']}'>Edit</a></td><td><a href='?delete={$result['uid']}'>Delete</a></td></tr>";
    }
    echo "</table>";

?>