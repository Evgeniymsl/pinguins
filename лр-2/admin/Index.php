<?php
include "../Connect.php";
include "../header.php";
$News = mysqli_fetch_all(mysqli_query($con, "SELECT `news_id`, `title` from News"));
$id_new = isset($_GET['new']) ? $_GET['new'] : false;
if ($id_new) {
    $new_info = mysqli_fetch_assoc(mysqli_query($con, "SELECT * from `News` where news_id = $id_new"));
}
?>


<body>
    <div class="container">
        <h1 class="text_admin">Панель админа</h1>
        <div class="content">
            <section class="col_1">
                <ul class="col_1_ul">
                    <h2 class="ul_news">Список новостей</h2>
                    <?php
                    foreach ($News as $new) {
                        echo "<li><a href ='?new=" . $new[0] . "'>" . $new[1] . "</a>

                        </li>";
                    }
                    ?>

                </ul>


            </section>
            <section class="col_2">


                </select>

            </section>

        </div>
    </div>
</body>

</html>