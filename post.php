<?php require_once("header.php"); ?>
<section class="blog" id="blog">

<?php
require_once("db.inc.php");
    if(isset($_GET['uid'])) {
        $uid = $_GET['uid'];
        $querySelect = "SELECT * FROM `post` WHERE `uid` = $uid";
        $results = mysqli_query($sql, $querySelect);
        foreach($results as $result) {
        ?>
            <article data-aos="flip-up">
                <img src="app/assets/images/lorem.jpg" alt="Podpis">
                <h1><?php echo $result['title'] ?></h1>
                <p><?php echo $result['content'] ?></p>
                <h3><?php echo $result['timestamp'] ?></h3>
                <a href="index.php#blog">Back</a>
            </article>

            <?php
        }
    }
    else {
        header("Location: index.php");
        die();
    }
?>

</section>

<?php require_once("footer.php"); ?>