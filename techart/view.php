<?php include_once "main.php" ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>techart.ru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/d7c63654e1.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12  news-block mt-5">
                <div class="row news-block__header pb-3 pt-3">
                    <div class="col-md-12">
                    <h1 class="news-block__header-text">Заголовок</h1> 
                    </div>
                </div>
                <div class="row news-block__content">
                    <div class="col-md-12">
                        
                        <?php 
                            if (isset($_GET['id'])) {
                                $id = (int) $_GET['id'];
                            }
                            echo $text = mysqli_query($db_connect, "SELECT `content` AS content FROM `news` WHERE `id` = $id")->fetch_assoc()['content'];
                        ?>
                        </div>
                </div>
                <div class="row pb-3 pt-3">
                    <div class="col-md-12">
                   <!-- <?php echo "<a href=\"javascript:history.go(-1)\"><i class='fas fa-angle-double-left'></i></a>"; ?>  вернуться назад, по ТЗ не нужно-->
                        <?php echo "<a href=./news.php?page=1><i class='fas fa-home'></i></a>"; ?>  
                    </div>
                </div>
            </div>
        </div>  
    </div>
</body>
</html>