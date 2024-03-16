
<?php
include "Connect.php";
include "header.php";
$mount = [
    '01' => 'Январь',
    '02' => 'Февраль',
    '03' => 'Март',
    '04' => 'Апрель',
    '05' => 'Май',
    '06' => 'Июнь',
    '07' => 'Июль',
    '08' => 'Август',
    '09' => 'Сентябрь',
    '10' => 'Октябрь',
    '11' => 'Ноябрь',
    '12' => 'Декабрь'
];


$new_id = isset($_GET["new"]) ? $_GET["new"] : false;
if ($new_id) {
    $query_getNew = "SELECT * from news where news_id = $new_id";

    $new_info = mysqli_fetch_assoc(mysqli_query($con, $query_getNew));

    $date = Date("d:m:Y h:m:s", strtotime($new_info['publish_date']));

    $m_text = $mount[substr($date, 3, 2)];

    $publich_date = substr($date, 0, 2) . " " . $m_text . " " . substr($date, 6);

    $comments_result = mysqli_query($con, "SELECT * from Comments where news_id = $new_id");
    $comments = mysqli_fetch_all($comments_result);
} else {
    header("Location: /");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/CSS/reset.css">
    <link rel="stylesheet" href="/CSS/style.css">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<div class = 'card'>";
    echo "<div class ='c_img'> <img src='image/news/" . $new_info['image'] . "'></div>";
    echo $new_info['title'];
    echo "<br>";
    echo $new_info['content'];
    echo "<br>";
    echo $publich_date;
    echo "<br>";
    echo $new_info['category_id'];
    echo "<br>";
    echo "</div>";
    ?>

    <h3 class="mb-3">Коментарии</h3>
    <?php if (mysqli_num_rows($comments_result)) {
        foreach ($comments as $comment) { ?>
            <div class="card">
                <div class="card-body">
                    <?= $comment[3] ?>
                </div>
            </div>
        <?php }
        ?>
    <?php
    } else echo "<i>Комментариев пока нет</i>"
    ?>
</body>

</html>