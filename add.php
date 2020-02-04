<?php
    require_once("db.inc.php");

    if(isset($_GET['edit'])) {
        $uid = $_GET['edit'];

        $querySelect = "SELECT * FROM `post` WHERE `uid` = $uid";
        $results = mysqli_query($sql, $querySelect);

        foreach($results as $result) {
            ?>
            <form method="POST">
                <input type="text" value="<?php echo $result['title'] ?>" name="title" require>
                <textarea placeholder="Content" name='content' require><?php echo $result['content'] ?></textarea>
                <input type="submit" value="Add post" name="editPost">
            </form>
            <?php
        }
    }
    else {
        ?>
        <form method="POST">
            <input type="text" placeholder="Title" name="title" require>
            <textarea placeholder="Content" name='content' require></textarea>
            <input type="submit" value="Add post" name="validatePost">
        </form>
        <?php
    }

    if(isset($_GET['error'])) {
        $error = $_GET['error'];
        switch($error) {
            case 0:
                break;
            case 1: 
                echo "Twój tytuł musi zawierać od 5 do 255 znaków!";
                break;
            case 2:
                echo "Twoj zawartość musi zawierać od 10 do 5000 znaków!";
                break;
            case 3: 
                break;
        }
    }

    if(isset($_POST['editPost'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];

        if(strlen($title) > 255 || strlen($title) < 5) {
            header("Location: add.php?error=1");
            die();
        }
        if(strlen($content) > 5000 || strlen($content) < 10) {
            header("Location: add.php?error=2");
            die();
        }

        $queryEdit = "UPDATE `post` SET `title`='$title',`content`='$content' WHERE `uid` = $uid";
        mysqli_query($sql, $queryEdit);
        header("Location: dashboard.php");
    }

    if(isset($_POST['validatePost'])) {

        $title = $_POST['title'];
        $content = $_POST['content'];

        if(strlen($title) > 255 || strlen($title) < 5) {
            header("Location: add.php?error=1");
            die();
        }
        if(strlen($content) > 5000 || strlen($content) < 10) {
            header("Location: add.php?error=2");
            die();
        }

        $timestamp = date('d.m.o G:i');
        $query = "INSERT INTO `post`(`title`, `content`, `timestamp`) VALUES ('$title','$content','$timestamp')";
        mysqli_query($sql, $query);
        header("Location: dashboard.php");

        
    }


?>