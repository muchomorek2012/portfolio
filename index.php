<?php

    require_once("header.php");
    require_once("db.inc.php");
?>
    <main>

        <section class="about">
        
            <img data-aos="flip-left" src="app/assets/images/portret.jpg" alt="To ja!">
            <p data-aos="zoom-in">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam culpa quam sapiente aut et ex, exercitationem veniam voluptates! Eum quo quas provident modi labore, voluptatum quae odio eligendi suscipit laborum!</p>

            <!---
            <section class="gallery">
                <a href="#" target="_blank"><img src="./." alt="To ja!"></a>
                <a href="#" target="_blank"><img src="./." alt="To ja!"></a>
                <a href="#" target="_blank"><img src="./." alt="To ja!"></a>
                <a href="#" target="_blank"><img src="./." alt="To ja!"></a>
                <a href="#" target="_blank"><img src="./." alt="To ja!"></a>
                <a href="#" target="_blank"><img src="./." alt="To ja!"></a>
            </section> --->

        </section>

        <section class="blog" id="blog">


            <?php
                $query = "SELECT * FROM `post` LIMIT 3";
                $results = mysqli_query($sql, $query);

                foreach($results as $result) {
                    ?>

                        <article data-aos="flip-up">
                            <img src="app/assets/images/lorem.jpg" alt="Podpis">
                            <h1><?php echo $result['title'] ?></h1>
                            <p><?php echo $result['content'] ?></p>
                            <h3><?php echo $result['timestamp'] ?></h3>
                            <a href="post.php?uid=<?php echo $result['uid']?>#blog">Czytaj dalej ...</a>
                         </article>

                    <?php
                }
            ?>

            <!-- PAGINACJA ZRÓB PÓŹNIEJ BO TERA PADAM NA RYJ -->

        </section>

    </main>

<?php
    require_once("footer.php");
    ?>